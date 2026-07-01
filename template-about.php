<?php
/**
 * Template Name: Kudu — About
 *
 * About / Our Story page — full-bleed hero, intro, and a static
 * three-chapter story timeline. Re-skin of the reference HistoryPage.
 *
 * @package Kudu_Living
 */

get_header();

$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';

// Story chapters: [key, label, title, body]. First is active by default.
$kudu_chapters = array(
	array(
		'key'   => 'beginning',
		'label' => 'The Beginning',
		'title' => 'Rooted in craft',
		'body'  => 'Kudu Living began in a small workshop, with a simple conviction: that furniture should be made honestly, by hand, from materials that carry the warmth of the natural world. Every early piece was shaped in solid wood, joined with patience and finished to last a lifetime.',
	),
	array(
		'key'   => 'growing',
		'label' => 'Growing',
		'title' => 'Rooted in craft',
		'body'  => 'As the workshop grew, so did our belief that beauty and longevity belong together. We deepened our relationships with sustainable timber sources and gathered a team of makers who share a reverence for grain, texture and quiet, considered detail — never letting scale dilute the craft.',
	),
	array(
		'key'   => 'today',
		'label' => 'The Studio Today',
		'title' => 'Rooted in craft',
		'body'  => 'Today the Kudu Living studio brings together design and hand-craft under one roof. From a single side table to a full wood-based interior, each commission still begins the same way it always has — with natural materials, honest construction and an obsession with the details that make a house feel like home.',
	),
);

$kudu_active = $kudu_chapters[0];
?>

<main>

	<!-- HERO -->
	<section class="relative h-[520px] w-full overflow-hidden bg-kudu-navy">
		<img
			src="<?php echo kudu_img( 'pages/history-hero.png' ); ?>"
			alt="Kudu Living — our story"
			class="absolute inset-0 h-full w-full object-cover"
		>
		<div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent"></div>
		<div class="<?php echo esc_attr( $kudu_container ); ?> relative flex h-full flex-col justify-between pt-[118px] pb-10">
			<nav class="text-[12px] font-medium tracking-[0.04em] text-white">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:opacity-80">Home</a>
				<span class="px-1 opacity-70">|</span> Our Story
			</nav>
			<div>
				<p class="text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-teal">About</p>
				<h1 class="mt-3 font-serif text-[40px] font-bold leading-tight text-white md:text-[56px]">Our Story</h1>
			</div>
		</div>
	</section>

	<!-- INTRO -->
	<section class="bg-kudu-sand-soft">
		<div class="<?php echo esc_attr( $kudu_container ); ?> py-[50px]">
			<p class="max-w-[1100px] text-[16px] leading-relaxed text-kudu-navy md:text-[18px]">
				Kudu Living was founded on a love of craft and the honest beauty of natural materials.
				We build wood-based interiors and furniture the slow way — shaped by hand, finished with
				care, and made to grow old gracefully in the homes they belong to. From a single piece to
				a complete space, everything we make begins with the grain of the wood and the promise
				that it will still feel right decades from now.
			</p>
		</div>
	</section>

	<!-- STORY TIMELINE -->
	<section class="bg-kudu-sand-soft">
		<div class="<?php echo esc_attr( $kudu_container ); ?> pb-[70px]">
			<div class="flex flex-wrap gap-x-8 gap-y-3 border-b border-kudu-navy/15 pb-4">
				<?php foreach ( $kudu_chapters as $i => $chapter ) : ?>
					<?php $is_active = ( 0 === $i ); ?>
					<button
						type="button"
						class="text-[18px] tracking-[0.04em] transition-colors hover:text-kudu-navy <?php echo $is_active ? 'font-bold text-kudu-navy underline underline-offset-[6px]' : 'font-normal text-kudu-muted'; ?>"
					>
						<?php echo esc_html( $chapter['label'] ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<div class="mt-9 max-w-[820px]">
				<h2 class="font-serif text-[28px] font-bold text-kudu-navy md:text-[34px]"><?php echo esc_html( $kudu_active['title'] ); ?></h2>
				<p class="mt-5 text-[15px] leading-relaxed text-kudu-navy md:text-[16px]"><?php echo esc_html( $kudu_active['body'] ); ?></p>
			</div>
		</div>
	</section>

	<!-- CONTENT BLOCK: natural materials -->
	<section class="bg-kudu-bg py-[60px]">
		<div class="<?php echo esc_attr( $kudu_container ); ?> grid grid-cols-1 items-center gap-10 lg:grid-cols-2">
			<div>
				<p class="text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-teal">Materials</p>
				<h2 class="mt-5 font-serif text-[34px] leading-[1.1] text-kudu-navy">Wood, first and always</h2>
				<p class="mt-6 max-w-[52ch] text-[15px] leading-relaxed text-kudu-muted">
					We choose responsibly sourced timber for its warmth, its strength and the way it earns
					character with time. Left to speak for itself, wood grounds every interior we make —
					honest, tactile and quietly enduring.
				</p>
				<a href="<?php echo kudu_url( 'collections' ); ?>" class="mt-8 inline-flex h-[50px] items-center rounded-none bg-kudu-navy px-9 text-[12px] font-bold uppercase tracking-[1px] text-white transition-colors hover:bg-kudu-navy-deep">Explore the collections</a>
			</div>
			<div>
				<img src="<?php echo kudu_img( 'pages/history-hero.png' ); ?>" alt="Kudu Living craftsmanship in natural wood" class="h-auto w-full object-cover">
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
