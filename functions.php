<?php
/**
 * Функции и определения WPBStarter
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpbstarter
 */





if ( ! function_exists( 'wpbstarter_setup' ) ) :
/**
 * Настраивает тему по умолчанию и регистрирует поддержку различных функций WordPress.
 * Обратите внимание, что эта функция подключена к крючке After_Setup_Theme, которая
 * работает до того, как крюк init.Ининированный крючок слишком поздно для некоторых функций, таких
 * Как указывает на поддержку пост-миниатюр.
 */
function wpbstarter_setup() {
	
    /**
    *Сделайте тему доступной для перевода.
    * Переводы могут быть поданы на / языки / каталог.
    * Если вы строите тему на основе WPBStarter, используйте находку и заменить
    * Чтобы изменить «WPBStarter» на имя вашей темы во всех файлах шаблона.
	*/
	load_theme_textdomain( 'wpbstarter', get_template_directory() . '/languages' );

	//Добавьте по умолчанию и комментарии RSS Feed ссылки на голову.
	add_theme_support( 'automatic-feed-links' );
    
	/** 
    * Пусть WordPress управляет заголовком документа.
    * Добавление поддержки темы, мы заявляем, что эта тема не использует
    * Жесткий код <title> Tag в голове документа и ожидает WordPress к
    * Предоставьте это для нас.
	*/
	add_theme_support( 'title-tag' );

	/*
	 * Включить поддержку пост-миниатюр на постах и страницах.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'wpbstarter-blog', 750, 450, true );

	// Эта тема использует WP_NAV_MENU () в одном месте.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'wpbstarter' ),
        'right_side_menu' => esc_html__( 'Right Side Menu', 'wpbstarter' ),
	) );

	/*
	 * Переключите разметку Core по умолчанию для формы поиска, формы комментариев и комментариев
    * Для вывода действительного HTML5.
	*/
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Настройка функции фона WordPress Core пользовательских.
	add_theme_support( 'custom-background', apply_filters( 'wpbstarter_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Добавить тему поддержки для выборочного обновления для виджетов.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wpbstarter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wpbstarter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'wpbstarter_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpbstarter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpbstarter_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wpbstarter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpbstarter_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wpbstarter' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'wpbstarter' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'wpbstarter' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'wpbstarter' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here.', 'wpbstarter' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wpbstarter_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function wpbstarter_scripts() {

        wp_enqueue_style( 'wpbstarter-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'wpbstarter-fontawesome-css', get_template_directory_uri() . '/inc/assets/css/fontawesome-all.min.css' );
    
    	wp_enqueue_style( 'wpbstarter-style', get_stylesheet_uri() );
        wp_enqueue_style( 'wpbstarter-sinanav-css', get_template_directory_uri() . '/inc/assets/css/sina-nav.min.css' );

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
        wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
        wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

        wp_enqueue_script( 'sinanav-js',get_template_directory_uri().'/inc/assets/js/sina-nav.min.js', array(), '2.1.0', true );

        wp_enqueue_script('wpbstarter-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
        wp_enqueue_script('wpbstarter-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    
        wp_enqueue_script('wpbstarter-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true );
    	wp_enqueue_script( 'wpbstarter-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpbstarter_scripts' );



function wpbstarter_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wpbstarter" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wpbstarter" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wpbstarter" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'wpbstarter_password_form' );



/**
 * Implement the Custom Header feature.
 */
// require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer repeater class.
 */
require_once get_template_directory() . '/inc/lib/customizer-repeater/functions.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require_once get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}

function mytheme_init() {
    add_filter('comment_form_defaults','mytheme_comments_form_defaults');
 }
 add_action('after_setup_theme','mytheme_init');
 function mytheme_comments_form_defaults($default) {
    unset($default['comment_notes_after']);
    return $default;
 }
