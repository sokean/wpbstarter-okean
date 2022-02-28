<?php
/**
 * Часть шаблона для отображения содержимого страницы
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbstarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpbstarter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
