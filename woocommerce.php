<?php
/**
* Шаблон для отображения продукта WOOCMMERCE
 *
 * Это шаблон, который отображает все страницы по умолчанию.
 * Обратите внимание, что это конструкция WordPress страниц
 * и что другие «страницы» на вашем сайте WordPress могут использовать
 * Различный шаблон.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbstarter
 */

get_header(); ?>

    <div id="primary" class="content-area wpbstarter-content-area-padding">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php woocommerce_content(); ?>
					</div>

					<?php get_sidebar(); ?>
					
				</div>
			</div>

		</main><!-- #основной -->
	</div><!-- #начальный -->

<?php
get_footer();

