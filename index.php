<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package onesie
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $options = get_option( gpp_get_current_theme_id() . '_options' ); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php if ( ! empty ( $options[ 'favicon' ] ) ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url( $options[ 'favicon' ] ); ?>" />
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header block" role="banner">
		<div class="site-branding">
			<?php if ( ! empty( $options['logo'] ) ) : ?>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img class="site-title" src="<?php echo esc_url( $options['logo'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				</a>
			<?php else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; ?>

			<h2 class="site-description">
			<?php if ( ! empty( $options['message'] ) ) : ?>
				<?php
					$message = apply_filters('the_content', stripslashes_deep( $options['message'] ) );
					echo $message;
			?>
			<?php else : ?>
				<?php bloginfo( 'description' ); ?>
			<?php endif; ?>
            </h2>
            <?php if ( ! empty( $options['button_link'] ) ) : ?>
				<a class="btn btn-big btn-translucent" href="<?php echo esc_url( $options['button_link'] ); ?>">
				<?php if ( ! empty( $options['button_text'] ) ) : ?>
					<?php echo esc_attr( $options['button_text'] ); ?>
				<?php else : ?>
					<?php _e( 'Learn More', 'onesie' ); ?>
				<?php endif; ?>
				</a>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $options['portfolio'] ) || ! empty( $options['about'] ) || ! empty( $options['contact'] ) ) : ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<ul>
				<?php if ( ! empty( $options['portfolio'] ) ) { ?><li><a href="#portfolio"><?php _e( 'Generos', 'onesie' ); ?></a></li><?php } ?>
				<?php if ( ! empty( $options['about'] ) ) { ?><li><a href="#about"><?php _e( 'Nosotros', 'onesie' ); ?></a></li><?php } ?>
				<?php if ( ! empty( $options['contact'] ) ) { ?><li><a href="#contact"><?php _e( 'Contacto', 'onesie' ); ?></a></li><?php } ?>
			</ul>
		</nav><!-- #site-navigation -->
	<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			$portfolios = $options['portfolio'];
			if ( ! empty( $portfolios ) ) :
			$images = explode( ',', $portfolios );
			?>
				<section id="portfolio" class="block">
					<h2 class="section-title"><?php _e( '', 'onesie' ); ?></h2>

					<ul class="gallery">

					<?php
						foreach( $images as $id ) {

							$attachment_caption = get_post_field( 'post_excerpt', $id );
							$attachment_title = get_post_field( 'post_title', $id );
							$attachment_link = get_post_meta( $id, '_gpp_custom_url', true );
							$attachment_attributes = wp_get_attachment_image_src( $id, 'large' );
					?>
						<li>
							<figure>
								<a href="<?php echo $attachment_attributes[0] ?>"<?php if ( ! empty( $attachment_title ) ) { ?> title="<?php echo $attachment_title; ?><?php if ( ! empty( $attachment_caption ) ) { ?> <small><?php echo $attachment_caption; ?></small><?php } ?><?php if ( ! empty( $attachment_link ) ) { ?> <small><?php echo esc_url( $attachment_link ); ?></small><?php } ?>"<?php } ?> class="gallery-item">
									<?php echo wp_get_attachment_image( $id, "large" ); ?>
								</a>
								<figcaption>
									<?php if ( ! empty( $attachment_title ) ) { ?><h3><?php echo $attachment_title; ?></h3><?php } ?>
									<?php if ( ! empty( $attachment_caption ) ) { ?><span><?php echo $attachment_caption; ?></span><?php } ?>
									<?php if ( ! empty( $attachment_link ) ) { ?><a href="<?php echo esc_url( $attachment_link ); ?>" title="<?php echo $attachment_title; ?>"><span class="genericon genericon-external"></span></a><?php } ?>
								</figcaption>
							</figure>
						</li>
					<?php } ?>

				</section>
			<?php endif; ?>

			<?php if ( ! empty( $options['about'] ) ) : ?>
				<section id="about" class="block">
					<h2 class="section-title"><?php _e( 'Nosotros', 'onesie' ); ?></h2>
						<div class="lead">
							<?php
								$about_info = apply_filters('the_content', stripslashes_deep( $options['about'] ) );
								echo $about_info;
							?>
						</div>
				</section>
			<?php endif; ?>

			<?php if ( ! empty( $options['contact'] ) ) : ?>
				<section id="contact" class="block">
					<h2 class="section-title"><?php _e( '', 'onesie' ); ?></h2>
					<div class="lead">
						<?php
							$contact_info = apply_filters('the_content', stripslashes_deep( $options['contact'] ) );
							echo $contact_info;
						?>
					</div>
				</section>
			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'onesie_credits' ); ?>
			<a href="http://blog.hoti.tv" rel="generator"><?php printf( __( 'Blog', 'onesie' ), 'Blog' ); ?></a>
			<span class="sep"> | </span>
			<a href="prensa/hoti.pdf" rel="generator"><?php printf( __( 'Prensa', 'onesie' ), 'Blog' ); ?></a>
			<span class="sep"> | </span>
			<a href="https://www.facebook.com/hotitv" rel="generator"><?php printf( __( 'Facebook', 'onesie' ), 'Blog' ); ?></a>
			<span class="sep"> | </span>
			<a href="https://twitter.com/hotitv" rel="generator"><?php printf( __( 'Twitter', 'onesie' ), 'Blog' ); ?></a>
			<span class="sep"> | </span>
			<a href="https://instagram.com/hotitv" rel="generator"><?php printf( __( 'Instagram', 'onesie' ), 'Blog' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( '© 2014 hoti', 'onesie' ), 'hoti', '<a href="http://graphpaperpress.com" rel="designer">Graph Paper Press</a>' ); ?>
			<a id="up" class="genericon genericon-collapse" href="#page" title="<?php _e( 'Back to top', 'onesie' ); ?>"></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>