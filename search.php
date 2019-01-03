<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WPCAP_B4
 */

get_header(); ?>

<?php
	$default_sidebar_position = get_theme_mod( 'default_sidebar_position', 'right' );
?>

	<div class="container">
		<div class="row">

			<?php if ( $default_sidebar_position === 'no' ) : ?>
				<div class="col-md-12 wpcapb4-content-width">
			<?php else : ?>
				<div class="col-md-8 wpcapb4-content-width">
			<?php endif; ?>

				<section id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					if ( have_posts() ) : ?>

						<header class="page-header mt-3r">
							<h1 class="page-title"><?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'wpcap-b4' ), '<span>' . get_search_query() . '</span>' );
							?></h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;

						the_posts_navigation( array(
							'next_text'         => esc_html__( 'Newer Posts', 'wpcap-b4' ),
							'prev_text'         => esc_html__( 'Older Posts', 'wpcap-b4' ),
						) );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

					</main><!-- #main -->
				</section><!-- #primary -->
			</div>
			<!-- /.col-md-8 -->

			<?php if ( $default_sidebar_position != 'no' ) : ?>
				<?php if ( $default_sidebar_position === 'right' ) : ?>
					<div class="col-md-4 wpcapb4-sidebar-width">
				<?php elseif ( $default_sidebar_position === 'left' ) : ?>
					<div class="col-md-4 order-md-first wpcapb4-sidebar-width">
				<?php endif; ?>
						<?php get_sidebar(); ?>
					</div>
					<!-- /.col-md-4 -->
			<?php endif; ?>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

<?php
get_footer();
