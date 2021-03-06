<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itereon
 */

get_header();
the_post();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<?php itereon_post_thumbnail(); ?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages( [
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 's_itereon' ),
						'after'  => '</div>',
					] );
					?>
				</div><!-- .entry-content -->

				<?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit <span class="screen-reader-text">%s</span>', 's_itereon' ), [
							'span' => [
								'class' => [],
							],
						] ), get_the_title() ), '<span class="edit-link">', '</span>' );
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
