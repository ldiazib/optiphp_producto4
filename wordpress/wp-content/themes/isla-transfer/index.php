<?php
/**
 * The main template file
 *
 * @package Isla_Transfer
 */

get_header();
?>

<main id="primary" class="site-main container">
    <div class="blog-header">
        <h1 class="page-title"><?php single_post_title(''); ?></h1>
        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
    </div>

    <div class="blog-grid">
        <?php if (have_posts()) :
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;

            the_posts_pagination(array(
                'prev_text' => __('Anterior', 'isla-transfer'),
                'next_text' => __('Siguiente', 'isla-transfer'),
            ));

        else :
            get_template_part('template-parts/content', 'none');
        endif; ?>
    </div>
</main>

<style>
    .blog-header {
        text-align: center;
        margin: 2rem 0 3rem;
    }

    .blog-header .page-title {
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .post-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
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
    }

    .entry-title {
        margin: 0 0 1rem;
        font-size: 1.25rem;
    }

    .entry-title a {
        color: #2c3e50;
        text-decoration: none;
    }

    .entry-title a:hover {
        color: #0073aa;
    }


    .entry-meta {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .entry-excerpt {
        color: #444;
        margin-bottom: 1.5rem;
    }


    .read-more {
        display: inline-block;
        color: #0073aa;
        text-decoration: none;
        font-weight: 500;
    }

    .read-more:hover {
        text-decoration: underline;
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
    }
</style>

<?php
get_footer();
