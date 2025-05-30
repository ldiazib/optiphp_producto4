    </main>

    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-contact">
                <h3>Contacto</h3>
                <p><i class="fas fa-envelope"></i> info@islatransfer.com</p>
                <p><i class="fas fa-phone"></i> +34 123 456 789</p>
                
                <div class="social-links">
                    <a href="https://www.facebook.com/?locale=es_ES" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/?hl=es" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/?lang=es" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/?originalSubdomain=es" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Isla Transfer. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    
    <?php wp_footer(); ?>
    
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /* Estilos del pie de página */
        .site-footer {
            background-color: #2c3e50;
            color: #fff;
            padding: 3rem 0 1rem;
            margin-top: 3rem;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .footer-contact {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .footer-contact h3 {
            color: #fff;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .footer-contact h3::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 2px;
            background-color: #0073aa;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .footer-contact p {
            margin: 0.75rem 0;
            color: #ecf0f1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .footer-contact i {
            color: #0073aa;
            width: 20px;
            text-align: center;
        }
        
        .social-links {
            margin-top: 1.5rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background-color: #0073aa;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 2rem;
        }
        
        .footer-bottom p {
            margin: 0;
            color: #bdc3c7;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .footer-container {
                padding: 0 1rem;
            }
            
            .footer-contact {
                padding: 0 1rem;
            }
        }
    </style>
</body>
</html>
