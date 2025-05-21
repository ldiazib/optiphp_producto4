<?php
/**
 * Isla Transfer functions and definitions
 *
 * @package Isla_Transfer
 */

if (!function_exists('isla_transfer_posted_on')) :
    /**
     * Imprime HTML con información de la fecha de publicación.
     */
    function isla_transfer_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: %s: post date. */
            esc_html_x('Publicado el %s', 'post date', 'isla-transfer'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if (!function_exists('isla_transfer_posted_by')) :
    /**
     * Imprime HTML con información del autor.
     */
    function isla_transfer_posted_by() {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('por %s', 'post author', 'isla-transfer'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo ' <span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Registrar plantillas personalizadas
 */
function get_custom_page_templates($templates) {
    $templates['page-flota.php'] = 'Flota de Vehículos';
    $templates['page-servicios.php'] = 'Nuestros Servicios';
    return $templates;
}
add_filter('theme_page_templates', 'get_custom_page_templates');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function isla_transfer_setup() {
    // Añadir soporte para títulos dinámicos
    add_theme_support('title-tag');
    
    // Añadir soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
    
    // Registrar menús de navegación
    register_nav_menus(
        array(
            'primary' => esc_html__('Menú Principal', 'isla-transfer'),
            'footer'  => esc_html__('Menú de Pie de Página', 'isla-transfer'),
        )
    );
    
    // Añadir soporte para widgets
    add_theme_support('widgets');
    
    // Añadir soporte para estilos de bloques de Gutenberg
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    
    // Añadir soporte para estilos de editor
    add_theme_support('editor-styles');
    add_editor_style('style-editor.css');
}
add_action('after_setup_theme', 'isla_transfer_setup');

/**
 * Enqueue scripts and styles.
 */
function isla_transfer_scripts() {
    // Estilos principales
    wp_enqueue_style('isla-transfer-style', get_stylesheet_uri(), array(), _S_VERSION);
    
    // Cargar Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0');
    
    // Scripts
    wp_enqueue_script('isla-transfer-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    
    // Cargar comentarios
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    // Estilos personalizados para la página de servicios
    if (is_page_template('page-servicios.php')) {
        wp_enqueue_style('isla-transfer-servicios', get_template_directory_uri() . '/css/servicios.css', array(), _S_VERSION);
    }
}
add_action('wp_enqueue_scripts', 'isla_transfer_scripts');

/**
 * Añadir clases a los enlaces de paginación
 */
function isla_transfer_posts_pagination($args = array()) {
    $navigation = '';
    $args = wp_parse_args($args, array(
        'prev_text'          => __('Página anterior', 'isla-transfer'),
        'next_text'          => __('Página siguiente', 'isla-transfer'),
        'before_page_number' => '<span class="screen-reader-text">' . __('Página', 'isla-transfer') . ' </span>',
    ));
    $links = paginate_links($args);
    if ($links) {
        $navigation = _navigation_markup($links, 'pagination', $args['screen_reader_text']);
    }
    return $navigation;
}

/**
 * Personalizar la clase del cuerpo según la página actual
 */
function isla_transfer_body_classes($classes) {
    // Añadir clase si hay una imagen destacada
    if (is_singular() && has_post_thumbnail()) {
        $classes[] = 'has-post-thumbnail';
    }
    
    // Añadir clase si no hay barra lateral
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }
    
    return $classes;
}
add_filter('body_class', 'isla_transfer_body_classes');
