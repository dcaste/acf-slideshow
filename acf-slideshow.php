<?php
/**
 * ACF Slideshow Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Get id and class attributes.
$id = 'acf-slideshow' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$class_name = 'acf-slideshow';
if( !empty($block['className']) ) {
    $class_name .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<?php
// If there are slides.
if ( have_rows( 'acf_slideshow' ) ) :
?>

	<section class="acf-slideshow">

		<?php
		while ( have_rows( 'acf_slideshow' ) ) :
			the_row();
		?>

			<div class="acf-slideshow__item">
				<div class="acf-slideshow__container">

					<?php
					// If image exists.
					if ( get_sub_field( 'image' ) ) :

						$image      = get_sub_field( 'image' );
						$image_md   = $image['sizes']['medium'];
						$image_ml   = $image['sizes']['medium_large'];
						$image_lg   = $image['sizes']['large'];
						$image_sli  = $image['sizes']['slideshow'];
						$image_full = $image['url']; // Fallback image.
						$image_alt  = $image['alt'];
						$image_alt  = ( $image_alt ) ? $image_alt : 'Fallback ALT text goes here';
					?>

						<picture class="acf-slideshow__image">
							<source media="(max-width: 480px)"  srcset="<?php echo esc_url( $image_md ); ?>">
							<source media="(max-width: 768px)"  srcset="<?php echo esc_url( $image_ml ); ?>">
							<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_lg ); ?>">
							<source media="(max-width: 1280px)" srcset="<?php echo esc_url( $image_sli ); ?>">
							<img src="<?php echo esc_url( $image_full ); ?>" alt="<?php echo esc_html( $image_alt ); ?>" >
						</picture>

					<?php endif; // Ends if image exists. ?>

					<?php
					// If content exists:
					if ( get_sub_field( 'headline' ) || get_sub_field( 'tagline' ) ) :
					?>

						<div class="acf-slideshow__content">

							<?php if ( get_sub_field( 'headline' ) ) { ?>
								<h2 class="acf-slideshow__headline">
									<?php the_sub_field( 'headline' ); ?>
								</h2>
							<?php } ?>

							<?php if ( get_sub_field( 'tagline' ) ) { ?>
								<div class="acf-slideshow__tagline">
									<?php the_sub_field( 'tagline' ); ?>
								</div>
							<?php } ?>

							<?php if ( true === get_sub_field( 'add_button' ) ) { ?>
								<div class="acf-slideshow__button-area">
									<a href="<?php the_sub_field( 'boton_url' ); ?>" class="button">
										<?php the_sub_field( 'boton_copy' ); ?>
									</a>
								</div>
							<?php } ?>

						</div>

					<?php endif; // Ends if content exists. ?>

					<?php
					// If we want to use an overlay get overlay color, opacity and their fallback values.
					if ( true === get_sub_field( 'overlay_add' ) ) {
						$overlay_color   = ( get_sub_field( 'overlay_color' ) ) ? get_sub_field( 'overlay_color' ) : '#3a4790'; 
						$overlay_opacity = ( get_sub_field( 'overlay_opacity' ) ) ? get_sub_field( 'overlay_opacity' ) : 0.05;
					?>
						<div class="acf-slideshow__overlay" style="background-color:<?php echo esc_attr( $overlay_color ); ?>; opacity: <?php echo esc_attr( $overlay_opac ); ?>"><span></span></div>
					<?php } ?>

					<?php
					// If we want to add a link gets the internal or external link and the link target.
					if ( true === get_sub_field( 'link_add' ) ) {
						$link   = ( 'local' == get_sub_field( 'link_type' ) ) ? get_sub_field( 'link_local' ) : get_sub_field( 'link_external' );
						$target = get_sub_field( 'target' );
					?>
						<a class="acf-slideshow__link" href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ) ?>"><span></span></a>
					<?php } ?>

				</div>
			</div>

		<?php
		endwhile;
		?>

	</section>

<?php
endif; // Ends if there are slides.