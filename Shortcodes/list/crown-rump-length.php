<?php

new SERMA_BABY_CRL_CALC_SHORTCODE();

class SERMA_BABY_CRL_CALC_SHORTCODE
{

    public function __construct()
    {
        add_shortcode('serma-baby-crl-wp', array($this, 'crown_rump_length'));
    }

    public function crown_rump_length($attrs = [])
    {

        if (!is_admin()) {
           
            wp_register_style( 'serma-crl-core-cookie-font', "https://fonts.googleapis.com/css2?family=Cookie&display=swap", '' );
            wp_register_style( 'serma-crl-core-inter-font', "https://fonts.googleapis.com/css2?family=Inter:wght@500;700;800;900&display=swap", '' );

            wp_enqueue_style( 'serma-crl-core-inter-font' );
            wp_enqueue_style( 'serma-crl-core-cookie-font' );

            wp_register_script( 'tailwind-css', "https://cdn.tailwindcss.com", [], '3.0.12', false );
            wp_register_script( 'tailwind-flowbite', "https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js", 'tailwind-css', '1.3.0', false );

            wp_enqueue_script( 'tailwind-css' );
            wp_enqueue_script( 'tailwind-flowbite' );
            wp_add_inline_script( 'tailwind-css', serma_baby_crl_tailwind_config() );

            $vue_file = SERMA_BABY_CRL_ENV ? 'vue.min' : 'vue.prod.min';

            serma_baby_crl_register_script(
                "lib/$vue_file", 
                ['moment'], 
                false
            );

            return SERMA_BABY_CRL_TEMPLATE::render_view(
                [], 
                [
                    'lib/flowbite/datepicker',
                    'crown-rump-length'
                ], 
                'crown-rump-length'
            );
            
        }
    }

}