<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        /* Estilos del encabezado */
        .site-header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .site-branding {
            display: flex;
            align-items: center;
        }
        
        .site-logo {
            max-height: 50px;
            width: auto;
            margin-right: 1rem;
        }
        
        .site-title {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .site-title a {
            color: inherit;
            text-decoration: none;
        }
        
        .main-navigation {
            display: flex;
            align-items: center;
        }
        
        .primary-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .primary-menu > li {
            position: relative;
            margin-left: 1.5rem;
        }
        
        .primary-menu > li > a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            position: relative;
            transition: color 0.3s ease;
        }
        
        .primary-menu > li > a:hover,
        .primary-menu > li.current-menu-item > a {
            color: #0073aa;
        }
        
        .primary-menu > li > a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #0073aa;
            transition: width 0.3s ease;
        }
        
        .primary-menu > li > a:hover::after,
        .primary-menu > li.current-menu-item > a::after {
            width: 100%;
        }
        
        /* Menú móvil */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #2c3e50;
        }
        
        @media (max-width: 768px) {
            .header-container {
                padding: 1rem;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .primary-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: #fff;
                flex-direction: column;
                padding: 1rem 0;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            }
            
            .primary-menu.active {
                display: flex;
            }
            
            .primary-menu > li {
                margin: 0;
                text-align: center;
                padding: 0.5rem 1rem;
            }
            
            .primary-menu > li > a {
                display: block;
                padding: 0.5rem 0;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">
        <div class="site-branding">
            <?php 
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            
            if (has_custom_logo()) : ?>
                <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="site-logo">
            <?php endif; ?>
            
            <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
        </div>
        
        <nav class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                ☰
            </button>
            
            <?php
            wp_nav_menu([
                'theme_location'  => 'primary',
                'container'       => false,
                'menu_class'      => 'primary-menu',
                'menu_id'         => 'primary-menu',
                'fallback_cb'     => false,
            ]);
            ?>
        </nav>
    </div>
</header>

<main id="main-content" style="margin-top: 80px;">
    <div class="container">
        <!-- Espacio para el contenido principal -->
        <script>
            // Menú móvil
            document.addEventListener('DOMContentLoaded', function() {
                const menuToggle = document.querySelector('.menu-toggle');
                const primaryMenu = document.querySelector('.primary-menu');
                
                if (menuToggle) {
                    menuToggle.addEventListener('click', function() {
                        primaryMenu.classList.toggle('active');
                        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                        menuToggle.setAttribute('aria-expanded', !isExpanded);
                    });
                }
                
                // Cerrar menú al hacer clic en un enlace
                const menuLinks = document.querySelectorAll('.primary-menu a');
                menuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth <= 768) {
                            primaryMenu.classList.remove('active');
                            menuToggle.setAttribute('aria-expanded', 'false');
                        }
                    });
                });
                
                // Cerrar menú al hacer clic fuera de él
                document.addEventListener('click', function(event) {
                    if (!event.target.closest('.main-navigation') && window.innerWidth <= 768) {
                        primaryMenu.classList.remove('active');
                        menuToggle.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        </script>
