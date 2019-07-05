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
if ( have_rows( 'acf_slideshow' ) ) :
?>

	<section class="acf-slideshow">

		<?php
		while ( have_rows( 'acf_slideshow' ) ) :
			the_row();

      // Get image sizes.
			$image = get_sub_field( 'image' );
			if ( $image ) {
				$image_md   = $image['sizes']['medium'];
				$image_ml   = $image['sizes']['medium_large'];
				$image_lg   = $image['sizes']['large'];
				$image_sli  = $image['sizes']['slideshow'];
				$image_full = $image['url'];
				$image_alt  = $image['alt'];
				$image_alt  = ( $image_alt ) ? $image_alt : 'Fallback ALT text goes here';
			}

      // If 
			$link_add = get_sub_field( 'link_add' );
			if ( true === $link_add ) {
				$link_tipo = get_sub_field( link_tipo' );
				$link      = ( 'interno' == $link_tipo ) ? get_sub_field( link_int' ) : get_sub_field( link_ext' );
				$target 		 = get_sub_field( 'target' );
			}

			$overlay = get_sub_field( 'overlay_add' );
			if ( true === $overlay ) {
				$overlay_color = ( get_sub_field( 'overlay_color' ) ) ? get_sub_field( 'overlay_color' ) : '#3a4790';
				$overlay_opac  = ( get_sub_field( 'overlay_opac' ) ) ? get_sub_field( 'overlay_opac' ) : 0.05;
			}

			$boton = get_sub_field( 'agregar_boton' );
		?>

			<div class="acf-slideshow__item">
				<div class="acf-slideshow__container">

					<?php
					if ( get_sub_field( 'image' ) ) : // Si existe image:
					?>

						<picture class="acf-slideshow__image">
							<source media="(max-width: 480px)" srcset="<?php echo esc_url( $image_md ); ?>">
							<source media="(max-width: 768px)" srcset="<?php echo esc_url( $image_ml ); ?>">
							<source media="(max-width: 1024px)" srcset="<?php echo esc_url( $image_lg ); ?>">
							<source media="(max-width: 1280px)" srcset="<?php echo esc_url( $image_sli ); ?>">
							<img src="<?php echo esc_url( $image_full ); ?>" alt="<?php echo esc_html( $image_alt ); ?>" >
						</picture>

					<?php endif; // Finaliza si hay image. ?>

					<?php
					if ( get_sub_field( 'headline' ) || get_sub_field( 'tagline' ) ) : // Si existe contenido:
					?>

						<div class="acf-slideshow__contenido">

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

							<?php if ( true === $boton ) { ?>
								<p class="acf-slideshow__area-boton">
									<a href="<?php the_sub_field( 'boton_url' ); ?>" class="boton-blanco">
										<?php the_sub_field( 'boton_copy' ); ?>
									</a>
								</p>
							<?php } ?>

						</div>

					<?php endif; // Finaliza si hay contenido. ?>

					<?php
					if ( true === $overlay ) { // Si existe overlay:
					?>
						<div class="acf-slideshow__overlay" style="background-color:<?php echo esc_attr( $overlay_color ); ?>; opacity: <?php echo esc_attr( $overlay_opac ); ?>">
							<span></span>
						</div>
					<?php } ?>

					<?php
					if ( true === $link_add ) {	// Si existe link:
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
endif; // Finaliza si existen campos en el slideshow.
