<?php
/**
 * Template part for displaying posts
 *
 * @package Isla_Transfer
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="post-content">
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            
            <div class="entry-meta">
                <?php
                isla_transfer_posted_on();
                isla_transfer_posted_by();
                ?>
            </div>
        </header>

        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php esc_html_e('Leer más', 'isla-transfer'); ?> &rarr;
        </a>
    </div>
</article>
