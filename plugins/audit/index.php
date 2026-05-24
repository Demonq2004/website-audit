<?php
/**
 * Plugin Name: Web Plugin
 * Plugin URI:  https://github.com/Demonq2004/website-audit
 * Description: Baza (boilerplate) do tworzenia własnych wtyczek w WordPressie.
 * Version:     1.0.0
 * Author:      Dawid Grzegorzek, Aleksander Nitczyński, Krzysztof Szywacz, Krzysztof Gil
 * Author URI:  https://github.com/Demonq2004/website-audit
 * Text Domain: web-plugin
 */

// Zabezpieczenie przed bezpośrednim dostępem do pliku
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Sprawdzenie, czy klasa już nie istnieje (zapobiega błędom)
if ( ! class_exists( 'Web_Plugin' ) ) {

    class Web_Plugin {

        /**
         * Konstruktor - tutaj rejestrujemy wszystkie akcje i filtry
         */
        public function __construct() {
            
       }

        /**
         * Funkcja uruchamiana podczas AKTYWACJI wtyczki
         */
        public function activate() {
            flush_rewrite_rules();
        }

        /**
         * Funkcja uruchamiana podczas DEZAKTYWACJI wtyczki
         */
        public function deactivate() {
            flush_rewrite_rules();
        }

        /**
         * Ładowanie plików CSS i JS na froncie strony
         */
        public function enqueue_frontend_scripts() {
            // wp_enqueue_style( 
            //     'moj-plugin-style', 
            //     plugin_dir_url( __FILE__ ) . 'assets/css/style.css', 
            //     array(), 
            //     '1.0.0' 
            // );

            // JS
            // wp_enqueue_script( 
            //     'moj-plugin-script', 
            //     plugin_dir_url( __FILE__ ) . 'assets/js/script.js', 
            //     array('jquery'),
            //     '1.0.0', 
            //     true 
            // );
        }

        /**
         * Ładowanie plików CSS i JS w kokpicie (Panel Admina)
         */
        public function enqueue_admin_scripts( $hook ) {

        }

        public function render_shortcode( $atts, $content = null ) {
            $attributes = shortcode_atts( array(
                'kolor' => 'blue', 
            ), $atts );

            ob_start(); 
            ?>
            
            <div class="moj-plugin-pojemnik" style="color: <?php echo esc_attr($attributes['kolor']); ?>;">
                <h2>To jest test mojego pluginu!</h2>
                <?php if ( $content ) : ?>
                    <p><?php echo esc_html( $content ); ?></p>
                <?php endif; ?>
            </div>

            <?php
            return ob_get_clean();
        }
    }

    $web_Plugin = new Web_Plugin();
}