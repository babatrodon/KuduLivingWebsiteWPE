<?php
/**
 * Self-contained GitHub theme updater for Kudu Living.
 *
 * Lets WordPress offer a theme update whenever a newer Version is pushed to the
 * theme's GitHub repository — no zip upload, no third-party plugin or library.
 *
 * Workflow to release an update:
 *   1. Bump the `Version:` header in style.css.
 *   2. git commit + git push to the tracked branch (main).
 *   3. In WordPress: Dashboard › Updates (or Appearance › Themes) shows the
 *      update within ~12h, or immediately after "Check again". One click installs.
 *
 * Public repo → no token needed. (GitHub allows 60 unauthenticated API calls/hr,
 * which is plenty; the remote version is cached for 6 hours.)
 *
 * @package Kudu_Living
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kudu_GitHub_Updater' ) ) {

	class Kudu_GitHub_Updater {

		/** @var string owner/repo */
		private $repo;
		/** @var string branch */
		private $branch;
		/** @var string theme directory slug */
		private $slug;

		public function __construct( $repo, $branch = 'main' ) {
			$this->repo   = $repo;
			$this->branch = $branch;
			$this->slug   = get_template();

			add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_for_update' ) );
			add_filter( 'upgrader_source_selection', array( $this, 'fix_source_dir' ), 10, 4 );
			add_action( 'switch_theme', array( $this, 'clear_cache' ) );
		}

		/** Fetch the Version header from the branch's style.css (cached 6h). */
		private function remote_version() {
			$cache_key = 'kudu_remote_version';
			$cached    = get_transient( $cache_key );
			if ( false !== $cached ) {
				return $cached;
			}

			$url      = sprintf( 'https://raw.githubusercontent.com/%s/%s/style.css', $this->repo, $this->branch );
			$response = wp_remote_get( $url, array( 'timeout' => 10, 'headers' => array( 'Accept' => 'text/plain' ) ) );

			$version = '';
			if ( ! is_wp_error( $response ) && 200 === (int) wp_remote_retrieve_response_code( $response ) ) {
				$body = wp_remote_retrieve_body( $response );
				if ( preg_match( '/^[\s\*]*Version:\s*(.+)$/mi', $body, $m ) ) {
					$version = trim( $m[1] );
				}
			}

			// Cache even an empty result briefly to avoid hammering GitHub on failures.
			set_transient( $cache_key, $version, 6 * HOUR_IN_SECONDS );
			return $version;
		}

		/** Inject an available update into WordPress' theme update transient. */
		public function check_for_update( $transient ) {
			if ( empty( $transient ) || ! is_object( $transient ) ) {
				return $transient;
			}

			$local  = wp_get_theme( $this->slug )->get( 'Version' );
			$remote = $this->remote_version();

			if ( $remote && $local && version_compare( $remote, $local, '>' ) ) {
				$transient->response[ $this->slug ] = array(
					'theme'       => $this->slug,
					'new_version' => $remote,
					'url'         => 'https://github.com/' . $this->repo,
					'package'     => sprintf( 'https://github.com/%s/archive/refs/heads/%s.zip', $this->repo, $this->branch ),
				);
			} else {
				// Make sure we don't leave a stale entry.
				if ( isset( $transient->response[ $this->slug ] ) && ( ! $remote || version_compare( $remote, $local, '<=' ) ) ) {
					unset( $transient->response[ $this->slug ] );
				}
			}

			return $transient;
		}

		/**
		 * GitHub zips extract to "{repo}-{branch}/"; rename that folder to the
		 * theme's slug so WordPress installs it in the correct place.
		 */
		public function fix_source_dir( $source, $remote_source, $upgrader, $hook_extra = array() ) {
			if ( empty( $hook_extra['theme'] ) || $hook_extra['theme'] !== $this->slug ) {
				return $source;
			}

			global $wp_filesystem;
			if ( ! $wp_filesystem ) {
				return $source;
			}

			$desired = trailingslashit( $remote_source ) . $this->slug;
			if ( untrailingslashit( $source ) === untrailingslashit( $desired ) ) {
				return $source;
			}

			if ( $wp_filesystem->move( untrailingslashit( $source ), $desired, true ) ) {
				return trailingslashit( $desired );
			}

			return $source;
		}

		public function clear_cache() {
			delete_transient( 'kudu_remote_version' );
		}
	}
}
