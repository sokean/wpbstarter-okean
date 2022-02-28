<?php
/**
 * Шаблон для отображения комментариев
 *
 * Это шаблон, который отображает область страницы, которая содержит как текущие комментарии.
 * и форма комментариев.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpbstarter
 */

/*
* Если текущий пост защищен паролем и
 * Посетитель еще не ввел пароль, который мы будем
 * Вернитесь рано без загрузки комментариев.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

    <?php
    // Вы можете начать редактирование здесь - включая этот комментарий!
    if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
            $wpbstarter_comments_number = get_comments_number();
            if ( '1' === $wpbstarter_comments_number ) {
                printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'wpbstarter' ),
					'<span>' . esc_html(get_the_title()) . '</span>'
				);
            } else {
                printf( // WPCS: XSS OK.
					/* Переводчики: 1: Комментарий Количество номеров, 2: Название. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $wpbstarter_comments_number, 'comments title', 'wpbstarter' ) ),
					esc_html( number_format_i18n( $wpbstarter_comments_number ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
            }
            ?>
        </h2><!-- .Комментарии - заголовок -->


        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Есть ли комментарии к перемещению? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpbstarter' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpbstarter' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpbstarter' ) ); ?></div>

                </div><!-- .NAV-ссылки -->
            </nav><!-- #Комментарий-Nav - выше -->
        <?php endif; // Проверьте на навигацию комментариев. ?>

        <ul class="comment-list">
            <?php
            wp_list_comments( array( 'callback' => 'wpbstarter_comment', 'avatar_size' => 50 ));
            ?>
        </ul><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Есть ли комментарии к перемещению? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'wpbstarter' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'wpbstarter' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'wpbstarter' ) ); ?></div>

                </div><!-- .NAV-ссылки-->
            </nav><!-- #Comment-Nav - ниже-->
            <?php
        endif; // Проверьте на навигацию комментариев.

    endif; // Проверьте наличие ~Comments.().


    // Если комментарии закрыты, и есть комментарии, давайте оставим небольшую ноту, пожалуйста, мы?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wpbstarter' ); ?></p>
        <?php
    endif; ?>

    <?php comment_form( $args = array(
        'id_form'           => 'commentform',  // Какое значение deadpress по умолчанию!Удалить его или отредактировать ;)
        'id_submit'         => 'commentsubmit',
        'title_reply'       => __( 'Ваш коментарий', 'ццццццццццццwpbstarter' ),  // Это значение по умолчанию WordPress!Удалить его или отредактировать ;)
		/* translators: 1: Reply Specific User */
        'title_reply_to'    => __( 'Leave a Reply to %s', 'wpbstarter' ),  // Это значение по умолчанию WordPress!Удалить его или отредактировать ;)
        'cancel_reply_link' => __( 'Cancel Reply', 'wpbstarter' ),  // Это значение по умолчанию WordPress!Удалить его или отредактировать ;)
        'label_submit'      => __( 'Оставить комментарий', 'wpbstarter' ),  // Это значение по умолчанию WordPress!Удалить его или отредактировать;)

        'comment_field' =>  '<p><textarea placeholder="Заполняем вашими коментариями..." id="comment" class="form-control" name="comment" cols="45"
         rows="8" aria-required="true"></textarea></p>',

        //*'comment_notes_after' => '<p class="form-allowed-tags">' .*//
         //**    __( '', 'wpbstarter' ) . *//
         //*   '</p><div class="alert alert-info">' . allowed_tags() . '</div>'*//
//*тут убрал надоедливые коды*//
        // Итак, это было необходимые вещи, чтобы иметь основные стили Bootstrap для элементов и кнопок формы

        // в основном вы можете редактировать все здесь!
        // Оформить заказ Документы для получения дополнительной информации: http://codex.wordpress.org/function_Reference/Comment_form
        // Другое примечание: некоторые классы добавляются в bootstrap-wp.js - ckeck из строки 1

    ));

	?>

</div><!-- #comments -->
