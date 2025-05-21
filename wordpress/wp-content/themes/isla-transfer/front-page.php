<?php
/**
 * The front page template file
 *
 * @package Isla Transfer
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="hero">
        <div class="hero-content">
            <h1>Bienvenido a Isla Transfer</h1>
            <p>Tu solución de transporte en la isla</p>
            <?php 
            $servicios_page = get_page_by_path('nuestros-servicios') ?: get_page_by_path('servicios');
            $servicios_url = $servicios_page ? get_permalink($servicios_page) : '#';
            ?>
            <a href="<?php echo esc_url($servicios_url); ?>" class="button primary">Ver servicios</a>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <div class="features-grid">
                <div class="feature">
                    <h3>Transfer al Aeropuerto</h3>
                    <p>Servicio puerta a puerta desde/hacia el aeropuerto</p>
                </div>
                <div class="feature">
                    <h3>Excursiones</h3>
                    <p>Descubre los mejores lugares de la isla</p>
                </div>
                <div class="feature">
                    <h3>Servicio 24/7</h3>
                    <p>Disponibles cuando nos necesites</p>
                </div>
            </div>
        </div>
    </section>


    <?php
    // Mostrar las últimas noticias
    $recent_posts = wp_get_recent_posts([
        'numberposts' => 3,
        'post_status' => 'publish'
    ]);

    if (!empty($recent_posts)) :
    ?>
    <section class="recent-posts">
        <div class="container">
            <h2>Últimas Noticias</h2>
            <div class="posts-grid">
                <?php foreach ($recent_posts as $post) : ?>
                    <article class="post-card">
                        <h3><a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a></h3>
                        <div class="post-excerpt">
                            <?php echo wp_trim_words($post['post_content'], 20); ?>
                        </div>
                        <a href="<?php echo get_permalink($post['ID']); ?>" class="read-more">Leer más</a>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="view-all-container">
                <?php $blog_page_id = get_option('page_for_posts'); ?>
                <a href="<?php echo $blog_page_id ? get_permalink($blog_page_id) : '#'; ?>" class="button">Ver todas las noticias</a>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php
get_footer();
?>
