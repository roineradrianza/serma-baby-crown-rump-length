<?php

if (!defined('ABSPATH')) exit; //Exit if accessed directly

function serma_baby_crl_register_style($style, $deps = array(), $inline_css = '')
{
    $default_path = SERMA_BABY_CRL_URL . 'assets/css/';

    wp_enqueue_style('serma-baby-crl' . $style, $default_path . $style . '.css', $deps);

    if (!empty($inline_css)) wp_add_inline_style('serma-baby-crl' . $style, $inline_css);
}

function serma_baby_crl_register_script($script, $deps = array(), $footer = false, $inline_scripts = '', $version = SERMA_BABY_CRL_VERSION)
{
    $handle = "serma-baby-crl-{$script}";
    wp_enqueue_script($handle, SERMA_BABY_CRL_URL . 'assets/js/' . $script . '.js', $deps, $version, $footer);
    if (!empty($inline_scripts)) wp_add_inline_script($handle, $inline_scripts);
}

function serma_baby_crl_tailwind_config () {
    return "
        tailwind.config = {
            variants: {
                extend: {
                    // ...
                    display: ['hover', 'focus', 'group-hover'],
                }
            },
            theme: {
                darkMode: false,
                extend: {
                    backgroundSize: {
                        'auto': 'auto',
                        'cover': 'cover',
                        'contain': 'contain',
                        'empty': '0px'
                    },
                    width: {
                        '30': '7.5rem',
                    },
                    maxWidth: {
                        'screen-lg': '1056px'
                    },
                    colors: {
                        black: '#212121',
                        primary: '#62CEF9',
                        secondary: '#4D4D4D',
                        icon: '#8D8D8D',
                        text: '#6A6B7A',
                        success: '#4AC989',
                        error: '#ff7070',
                        'lighten-grey': '#F1F2F3',
                        'purple-lighten': '#A28EEC',
                        'purple-darken': '#585CE5',
                        'purple-darken-1': '#585ce526',
                        'purple-lighten-1': '#a28eec1a',
                        'purple-lighten-2': '#a28eec26',
                        'purple-lighten-3': '#a28eec40',
                        'purple-lighten-4': '#a28eec59',
                        'green-lighten': '#4AC989',
                        'green-lighten-1': '#4ac98926',
                        'red-lighten-1': '#ff707026',
                        'cyan-lighten-1': '#62cef940',
                        'yellow-lighten': 'rgba(236, 172, 74, 0.25)',
                    },
                    margin: {
                        'n1': '-1px',
                    },
                    borderRadius: {
                        'lg-2x': '1em'
                    }
                },
                fontFamily: {
                    'body': ['\"Inter\"']
                },
                fontSize: {
                    'xs': '.0.63rem',
                    'sm': '.473rem',
                    'tiny': '.7225rem',
                    'md': '.75rem',
                    'base': '0.85rem',
                    'lg': '0.956rem',
                    'xl': '1.06rem',
                    '1.5-xl': '1.123rem',
                    '2xl': '1.275rem',
                    '2.8xl': '1.500rem',
                    '3xl': '1.593rem',
                    '4xl': '1.91rem',
                    '4-5xl': '2.125rem',
                    '5xl': '2.55rem',
                    '6xl': '3.4rem',
                    '7xl': '4.25rem',
                    '10px': '10px',
                    '12px': '12px',
                    '13px': '13px',
                    '14px': '14px',
                    '16px': '16px',
                    '18px': '18px',
                    '24px': '24px',
                    '36px': '36px',
                    '40px': '40px',
                    '48px': '48px',
                }
            },

        }
    ";
}