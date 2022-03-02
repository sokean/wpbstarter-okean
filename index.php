<?php
/**
 * Основной файл шаблона
 *
 * Это самый универсальный файл шаблона в теме WordPress
 * И один из двух необходимых файлов для темы (другой - style.css).
 * Используется для отображения страницы, когда ничего более конкретных совпадает с запросом.
 * E.G., он собирает домашнюю страницу, когда не существует никаких файлов Home.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpbstarter
 */

get_header();
?>


	<div class="wpbstarter-page-title-area blog-title">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-title"><?php echo esc_html_e( 'Blog', 'wpbstarter' ); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div id="primary" class="content-area wpbstarter-content-area-padding">
		<main id="main" class="site-main">

			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-8">
						<div class="wpbstarter-blog-list">
							<?php
								if ( have_posts() ) :

									if ( is_home() && ! is_front_page() ) :
										?>
										<header>
											<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
										</header>
										<?php
									endif;

									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										 * Включите шаблон, специфичный постопримечаю для содержимого.
										 * Если вы хотите переопределить это в детской теме, то включите файл
										 * Под названием Content -___. PHP (где ___ - это имя типа сообщения), и это будет использоваться вместо этого.
										 */
										get_template_part( 'template-parts/content', get_post_type() );

									endwhile;

									the_posts_navigation();

								else :

									get_template_part( 'template-parts/content', 'none' );

								endif;
							?>
						</div>
					</div>

						<?php 
							get_sidebar();
						?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
