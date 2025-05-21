<?php
/**
 * Template Name: Flota de Vehículos
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
        </header>

        <div class="flota-grid">
            <?php
            // Aquí irá el bucle para mostrar los vehículos
            $vehiculos = array(
                array(
                    'nombre' => 'Berlín de Lujo',
                    'capacidad' => '3 pasajeros',
                    'imagen' => get_template_directory_uri() . '/images/berlin.jpg',
                    'descripcion' => 'Vehículo ejecutivo para traslados con máximo confort.'
                ),
                array(
                    'nombre' => 'Minivan Ejecutiva',
                    'capacidad' => 'Más de 5 pasajeros',
                    'imagen' => get_template_directory_uri() . '/images/minivan.jpg',
                    'descripcion' => 'Ideal para grupos pequeños o familias.'
                ),
                array(
                    'nombre' => 'Minibús',
                    'capacidad' => 'Más de 12 pasajeros',
                    'imagen' => get_template_directory_uri() . '/images/minibus.jpg',
                    'descripcion' => 'Perfecto para grupos medianos con equipaje.'
                ),
                array(
                    'nombre' => 'Autobús',
                    'capacidad' => 'Más de 15 pasajeros',
                    'imagen' => get_template_directory_uri() . '/images/bus.jpg',
                    'descripcion' => 'Solución para grupos grandes y eventos.'
                )
            );

            foreach ($vehiculos as $vehiculo) : ?>
                <div class="vehiculo-card">
                    <div class="vehiculo-imagen">
                        <img src="<?php echo esc_url($vehiculo['imagen']); ?>" alt="<?php echo esc_attr($vehiculo['nombre']); ?>">
                    </div>
                    <div class="vehiculo-info">
                        <h3><?php echo esc_html($vehiculo['nombre']); ?></h3>
                        <p class="capacidad">
                            <strong>Capacidad:</strong> <?php echo esc_html($vehiculo['capacidad']); ?>
                        </p>
                        <p class="descripcion"><?php echo esc_html($vehiculo['descripcion']); ?></p>
                        <button class="boton-reserva">Solicitar Presupuesto</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<style>
    .flota-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }
    
    .vehiculo-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    
    .vehiculo-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .vehiculo-imagen img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .vehiculo-info {
        padding: 1.5rem;
    }
    
    .vehiculo-info h3 {
        margin-top: 0;
        color: #333;
    }
    
    .capacidad {
        color: #666;
        font-size: 0.9rem;
    }
    
    .descripcion {
        margin: 1rem 0;
        color: #444;
    }
    
    .boton-reserva {
        background-color: #0073aa;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .boton-reserva:hover {
        background-color: #005177;
    }
</style>

<?php
get_footer();
