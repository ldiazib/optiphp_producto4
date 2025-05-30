<?php
/**
 * Template Name: Nuestros Servicios
 * Template Post Type: page
 *
 * @package Isla-Transfer
 */

if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <div class="page-description"><?php echo get_the_excerpt(); ?></div>
            <?php endif; ?>
        </header>

        <div class="servicios-grid">
            <!-- Servicio 1 -->
            <article class="servicio-card">
                <div class="servicio-icono">
                    <i class="fas fa-plane-arrival"></i>
                </div>
                <h3>Traslados Aeropuerto</h3>
                <p>Servicio puntual y confiable desde y hacia el aeropuerto. Incluye asistencia y seguimiento de vuelos.</p>
                <ul class="servicio-caracteristicas">
                    <li><i class="fas fa-check"></i> Monitoreo de vuelos</li>
                    <li><i class="fas fa-check"></i> Vehículos ejecutivos</li>
                    <li><i class="fas fa-check"></i> Asistencia personalizada</li>
                </ul>
            </article>

            <!-- Servicio 2 -->
            <article class="servicio-card destacado">
                <div class="servicio-icono">
                    <i class="fas fa-hotel"></i>
                </div>
                <h3>Traslados Hoteleros</h3>
                <p>Conexión entre hoteles, aeropuertos y puntos de interés con la máxima comodidad y puntualidad.</p>
                <ul class="servicio-caracteristicas">
                    <li><i class="fas fa-check"></i> Servicio puerta a puerta</li>
                    <li><i class="fas fa-check"></i> Disponibilidad 24/7</li>
                    <li><i class="fas fa-check"></i> Precios competitivos</li>
                </ul>
            </article>

            <!-- Servicio 3 -->
            <article class="servicio-card">
                <div class="servicio-icono">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3>Servicio Empresarial</h3>
                <p>Soluciones de transporte corporativo para ejecutivos y equipos de trabajo con altos estándares de calidad.</p>
                <ul class="servicio-caracteristicas">
                    <li><i class="fas fa-check"></i> Flota ejecutiva</li>
                    <li><i class="fas fa-check"></i> Facturación electrónica</li>
                    <li><i class="fas fa-check"></i> Servicio personalizado</li>
                </ul>
            </article>

            <!-- Servicio 4 -->
            <article class="servicio-card">
                <div class="servicio-icono">
                    <i class="fas fa-glass-cheers"></i>
                </div>
                <h3>Eventos Especiales</h3>
                <p>Transporte exclusivo para bodas, congresos y eventos corporativos con chófer profesional.</p>
                <ul class="servicio-caracteristicas">
                    <li><i class="fas fa-check"></i> Vehículos de lujo</li>
                    <li><i class="fas fa-check"></i> Servicio puerta a puerta</li>
                    <li><i class="fas fa-check"></i> Presupuesto personalizado</li>
                </ul>
            </article>

            <!-- Servicio 5 -->
            <article class="servicio-card">
                <div class="servicio-icono">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3>Excursiones Turísticas</h3>
                <p>Descubre los rincones más emblemáticos de la isla con nuestros guías profesionales.</p>
                <ul class="servicio-caracteristicas">
                    <li><i class="fas fa-check"></i> Rutas personalizadas</li>
                    <li><i class="fas fa-check"></i> Guías locales expertos</li>
                    <li><i class="fas fa-check"></i> Flexibilidad horaria</li>
                </ul>
            </article>

            <!-- Servicio 6 -->
            <article class="servicio-card">
                <div class="servicio-icono">
                    <i class="fas fa-shuttle-van"></i>
                </div>
                <h3>Transporte Grupal</h3>
                <p>Soluciones de transporte para grupos grandes con comodidad y seguridad garantizadas.</p>
                <ul class="servicio-caracteristicas">
                    <li><i class="fas fa-check"></i> Hasta 50 pasajeros</li>
                    <li><i class="fas fa-check"></i> Espacio para equipaje</li>
                    <li><i class="fas fa-check"></i> Precios especiales para grupos</li>
                </ul>
            </article>
        </div>

        <div class="servicios-extra">
            <div class="servicio-extra">
                <i class="fas fa-headset"></i>
                <h4>Atención Personalizada</h4>
                <p>Nuestro equipo está disponible 24/7 para atender todas tus consultas y necesidades de transporte.</p>
            </div>
            <div class="servicio-extra">
                <i class="fas fa-shield-alt"></i>
                <h4>Seguridad Garantizada</h4>
                <p>Todos nuestros vehículos cumplen con los más altos estándares de seguridad y mantenimiento.</p>
            </div>
            <div class="servicio-extra">
                <i class="fas fa-euro-sign"></i>
                <h4>Precios Competitivos</h4>
                <p>Ofrecemos la mejor relación calidad-precio del mercado, con opciones para todos los presupuestos.</p>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>