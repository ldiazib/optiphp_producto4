<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Isla_Transfer
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('No se encontraron entradas', 'isla-transfer'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('¿Listo para publicar tu primera entrada? <a href="%1$s">Empieza aquí</a>.', 'isla-transfer'),
                    array(
                        'a' => array(
                            'href' => array(),
                        ),
                    )
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        elseif (is_search()) :
            ?>
            <p><?php esc_html_e('Lo sentimos, pero no hay resultados para tu búsqueda. Por favor, inténtalo de nuevo con términos diferentes.', 'isla-transfer'); ?></p>
            <?php
            get_search_form();
        else :
            ?>
            <p><?php esc_html_e('Parece que no podemos encontrar lo que buscas. Quizás una búsqueda te ayude.', 'isla-transfer'); ?></p>
            <?php
            get_search_form();
        endif;
        ?>
    </div>
</section>
