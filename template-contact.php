<?php
/**
 * Template Name: Kudu — Contact
 *
 * Contact page — navy editorial hero, a static enquiry form paired with a
 * showroom / contact info list, and a closing indigo brand band.
 * Built fresh to match the Kudu Living editorial style (no reference component).
 *
 * @package Kudu_Living
 */

get_header();

$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';

// Field styles, shared across inputs, select and textarea.
$kudu_field = 'w-full border border-kudu-line px-4 py-3 text-[15px] text-kudu-navy outline-none transition-colors focus:border-kudu-navy';
$kudu_label = 'mb-2 block text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-muted';

// Right-column contact details: [label, lines[]].
$kudu_info = array(
	array(
		'label' => 'Showroom',
		'lines' => array( 'Kudu Living Studio', '14 Riverside Walk', 'Cape Town, 8001' ),
	),
	array(
		'label' => 'Opening hours',
		'lines' => array( 'Mon – Fri, 9am – 6pm', 'Saturday, 10am – 4pm', 'Sunday by appointment' ),
	),
	array(
		'label' => 'Email',
		'lines' => array( 'hello@kuduliving.com' ),
	),
	array(
		'label' => 'Phone',
		'lines' => array( '+27 21 000 0000' ),
	),
	array(
		'label' => 'Trade enquiries',
		'lines' => array( 'trade@kuduliving.com', 'For interior designers, architects & contract projects.' ),
	),
);

// "I'm interested in" options.
$kudu_interests = array(
	'General enquiry',
	'Bespoke project',
	'Trade & contract',
	'Showroom visit',
);
?>

<main>

<!-- PAGE HERO -->
<section class="relative bg-kudu-navy pt-[150px] pb-[70px] text-white">
	<div class="<?php echo esc_attr( $kudu_container ); ?>">
		<nav class="mb-5 text-[12px] uppercase tracking-[0.14em] text-kudu-teal" aria-label="Breadcrumb">
			<a href="<?php echo kudu_url(); ?>" class="transition-opacity hover:opacity-80">Home</a>
			<span class="mx-2 text-white/40">|</span>
			<span class="text-white/80">Contact</span>
		</nav>
		<h1 class="max-w-[16ch] font-serif text-[44px] leading-[1.05]">Get in touch</h1>
		<p class="mt-6 max-w-[54ch] text-[16px] leading-relaxed text-white/80">Whether you are planning a single piece or a full interior, our team would love to hear from you. Send us a note and we will be in touch — or visit the showroom to experience the collection in person.</p>
	</div>
</section>

<!-- BODY: FORM + CONTACT INFO -->
<section class="bg-white py-[70px]">
	<div class="<?php echo esc_attr( $kudu_container ); ?>">
		<div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr]">

			<!-- LEFT: enquiry form (static, no submission) -->
			<div>
				<h2 class="font-serif text-[28px] leading-tight text-kudu-navy">Send us a message</h2>
				<p class="mt-3 max-w-[48ch] text-[15px] leading-relaxed text-kudu-muted">Tell us a little about your project and we will point you to the right person.</p>

				<form onsubmit="return false" class="mt-8 space-y-6">
					<div class="grid gap-6 sm:grid-cols-2">
						<div>
							<label for="kudu-first-name" class="<?php echo esc_attr( $kudu_label ); ?>">First name</label>
							<input type="text" id="kudu-first-name" name="first_name" autocomplete="given-name" class="<?php echo esc_attr( $kudu_field ); ?>">
						</div>
						<div>
							<label for="kudu-last-name" class="<?php echo esc_attr( $kudu_label ); ?>">Last name</label>
							<input type="text" id="kudu-last-name" name="last_name" autocomplete="family-name" class="<?php echo esc_attr( $kudu_field ); ?>">
						</div>
					</div>

					<div>
						<label for="kudu-email" class="<?php echo esc_attr( $kudu_label ); ?>">Email</label>
						<input type="email" id="kudu-email" name="email" autocomplete="email" class="<?php echo esc_attr( $kudu_field ); ?>">
					</div>

					<div>
						<label for="kudu-interest" class="<?php echo esc_attr( $kudu_label ); ?>">I'm interested in</label>
						<select id="kudu-interest" name="interest" class="<?php echo esc_attr( $kudu_field ); ?> bg-white">
							<?php foreach ( $kudu_interests as $option ) : ?>
								<option value="<?php echo esc_attr( $option ); ?>"><?php echo esc_html( $option ); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div>
						<label for="kudu-message" class="<?php echo esc_attr( $kudu_label ); ?>">Message</label>
						<textarea id="kudu-message" name="message" rows="6" class="<?php echo esc_attr( $kudu_field ); ?> resize-y"></textarea>
					</div>

					<button type="submit" class="inline-flex h-[50px] items-center rounded-none bg-kudu-navy px-9 text-[12px] font-bold uppercase tracking-[1px] text-white transition-colors hover:bg-kudu-navy-deep">Send enquiry</button>
				</form>
			</div>

			<!-- RIGHT: contact / showroom info -->
			<aside class="lg:pl-6">
				<div class="space-y-7">
					<?php foreach ( $kudu_info as $item ) : ?>
						<div>
							<div class="text-[12px] uppercase tracking-[0.14em] text-kudu-teal"><?php echo esc_html( $item['label'] ); ?></div>
							<div class="mt-2 space-y-1 text-[15px] leading-relaxed text-kudu-navy">
								<?php foreach ( $item['lines'] as $line ) : ?>
									<p><?php echo esc_html( $line ); ?></p>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</aside>

		</div>
	</div>
</section>

<!-- CLOSING BAND -->
<section class="bg-kudu-indigo py-[46px] text-white">
	<div class="<?php echo esc_attr( $kudu_container ); ?>">
		<p class="text-center font-serif text-[30px] leading-tight">Rooted in Nature.</p>
	</div>
</section>

</main>

<?php
get_footer();
