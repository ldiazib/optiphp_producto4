<?php
/**
 * Template part for displaying single posts
 *
 * @package Isla_Transfer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        
        <div class="entry-meta">
            <?php
            isla_transfer_posted_on();
            echo ' | ';
            isla_transfer_posted_by();
            echo ' | ';
            the_category(', ');
            ?>
        </div>
        
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
            </div>
        <?php endif; ?>
    </header>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'isla-transfer'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'isla-transfer'),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <footer class="entry-footer">
        <?php the_tags('<div class="post-tags">' . esc_html__('Etiquetas: ', 'isla-transfer'), ', ', '</div>'); ?>
    </footer>
</article>
