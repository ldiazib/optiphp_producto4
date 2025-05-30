<?php
/**
 * The main template file for the blog page
 *
 * @package Isla_Transfer
 */

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

get_header();
?>

<main id="primary" class="site-main container">
    <div class="blog-header">
        <h1 class="page-title"><?php 
            if (is_home() && !is_front_page()) {
                echo 'Blog';
            } else {
                single_post_title();
            }
        ?></h1>
        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
    </div>

    <div class="blog-grid">
        <?php 
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;

            the_posts_pagination(array(
                'prev_text' => __('Anterior', 'isla-transfer'),
                'next_text' => __('Siguiente', 'isla-transfer'),
                'before_page_number' => '<span class="screen-reader-text">' . __('Página', 'isla-transfer') . ' </span>',
            ));

        else :
            get_template_part('template-parts/content', 'none');
        endif; 
        ?>
    </div>
</main>

<style>
    .blog-header {
        text-align: center;
        margin: 2rem 0 3rem;
        padding: 2rem 0;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .blog-header .page-title {
        color: #2c3e50;
        margin-bottom: 1rem;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .post-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .post-thumbnail {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .post-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .post-card:hover .post-thumbnail img {
        transform: scale(1.05);
    }

    .post-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .entry-header {
        margin-bottom: 1rem;
    }

    .entry-title {
        margin: 0 0 0.5rem;
        font-size: 1.5rem;
        line-height: 1.3;
    }

    .entry-title a {
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .entry-title a:hover {
        color: #0073aa;
    }

    .entry-meta {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 1rem;
    }

    .entry-meta a {
        color: #0073aa;
        text-decoration: none;
    }

    .entry-meta a:hover {
        text-decoration: underline;
    }

    .entry-excerpt {
        color: #495057;
        margin-bottom: 1.5rem;
        line-height: 1.6;
        flex-grow: 1;
    }

    .read-more {
        display: inline-block;
        color: #fff;
        background-color: #0073aa;
        text-decoration: none;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        transition: background-color 0.2s ease;
        text-align: center;
    }

    .read-more:hover {
        background-color: #005177;
        color: #fff;
    }

    /* Estilos para la paginación */
    .pagination {
        display: flex;
        justify-content: center;
        margin: 3rem 0;
        gap: 0.5rem;
    }

    .page-numbers {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: #f5f5f5;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .page-numbers.current,
    .page-numbers:hover:not(.dots) {
        background: #0073aa;
        color: white;
    }

    .page-numbers.dots {
        background: transparent;
    }

    @media (max-width: 767px) {
        .blog-grid {
            grid-template-columns: 1fr;
        }
        
        .blog-header {
            padding: 1.5rem;
        }
        
        .blog-header .page-title {
            font-size: 2rem;
        }
    }
</style>

<?php
get_footer();
