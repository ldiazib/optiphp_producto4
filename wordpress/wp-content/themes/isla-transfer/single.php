<?php
/**
 * The template for displaying single posts
 *
 * @package Isla_Transfer
 */

get_header();
?>

<main id="primary" class="site-main container">
    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'single');

        // Si los comentarios están abiertos o hay al menos un comentario, carga la plantilla de comentarios
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

        // Navegación de entradas
        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Anterior:', 'isla-transfer') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Siguiente:', 'isla-transfer') . '</span> <span class="nav-title">%title</span>',
            )
        );

    endwhile; // Fin del bucle
    ?>
</main>

<style>
    .single-post .site-main {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .entry-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .entry-title {
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .entry-meta {
        color: #6c757d;
        margin-bottom: 2rem;
    }

    .entry-meta a {
        color: #0073aa;
        text-decoration: none;
    }

    .entry-meta a:hover {
        text-decoration: underline;
    }

    .entry-content {
        line-height: 1.8;
        color: #444;
    }

    .entry-content p {
        margin-bottom: 1.5rem;
    }

    .entry-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 2rem 0;
    }

    .entry-footer {
        margin-top: 3rem;
        padding-top: 1.5rem;
        border-top: 1px solid #eee;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .post-navigation {
        margin: 3rem 0;
        padding: 1.5rem 0;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
    }

    .nav-links {
        display: flex;
        justify-content: space-between;
    }

    .nav-previous,
    .nav-next {
        max-width: 45%;
    }

    .nav-subtitle {
        display: block;
        font-size: 0.8rem;
        color: #6c757d;
    }


    @media (max-width: 767px) {
        .entry-header {
            text-align: left;
        }
        
        .nav-links {
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .nav-previous,
        .nav-next {
            max-width: 100%;
        }
    }
</style>

<?php
get_footer();
