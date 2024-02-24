<?php
/*
* Plugin Name:       Droit Custom Dark Mode Button
* Description:       Creates a custom button for Droit dark mode and add to navigation menu (primary or main)
* Version:           1.0.0
* Author:            Imo-owo Nabuk
* Author URI:        https://github.com/richienabuk
*/

if (!defined('ABSPATH')) {
    exit;
}

define('DROIT_CUSTOM_DARK_MODE_BUTTON_FILE', __FILE__);
define( 'DROIT_CUSTOM_DARK_MODE_BUTTON_URL', plugins_url( '/', DROIT_CUSTOM_DARK_MODE_BUTTON_FILE ) );

// load plugin
add_action( 'plugins_loaded', function() {
    // cookie darkMode = true
    wp_enqueue_script('ga_js', plugins_url('assets/js/main.js', DROIT_CUSTOM_DARK_MODE_BUTTON_FILE), [], '1.0.0', false);
    wp_enqueue_style('ga_styles', DROIT_CUSTOM_DARK_MODE_BUTTON_URL . 'assets/css/styles.css', false, '1.0.0');

    function add_item_to_menu($items, $args) {
        if ($args->theme_location == 'primary' || $args->theme_location = 'main_menu') {
            $dmToggle = '<li class="menu-item menu-item-type-custom nav-item drdt-ignore-dark">
                            <div class="d-flex gap-2 text-center">
                                <input class="form-check-input" type="checkbox" id="darkModeToggle" onchange="toggleDarkMode()" hidden  />
                                <label class="theme-toggle" for="darkModeToggle"></label>
                                <p id="darkModeDisplayText" style="font-size: 12px; margin-top: 5px;"></p>
                            </div>
                        </li>';
            $items = $items . $dmToggle;
        }
        return $items;
    }
    add_filter('wp_nav_menu_items', 'add_item_to_menu', 10, 2);

    add_action( 'wp_enqueue_scripts', 'inline_css', 999);

    /**
     * Name: inline_css
     * Desc: add css in the head of theme
     * Return: @void
     */
    function inline_css() {
        $custom_css = "";

        $bg_color = '#1A1A1A'; // '#000';
        $body_color = '#7D7D7D';
        $head_color = '#FFFFFF';
        $link_color = '#7D7D7D';
        $link_hover = '#FFFFFF';
        $btn_color = '#1A1A1A';
        $border_color = '#626060';

        $custom_css .= ":root {
                --drdt-color-white: #fff;
                --drdt-color-bg: $bg_color;
                --drdt-color-body: $body_color;
                --drdt-color-head: $head_color;
                --drdt-color-link: $link_color;
                --drdt-color-link-hover: $link_hover;
                --drdt-color-btn: $btn_color;
                --drdt-color-border: $border_color;
            }
        ";

        $custom_css .= "html.drdt-dark-mode :not(.drdt-ignore-dark):not(.drdt_checkbox):not(.droit_dark):not(.droit_light):not(.dark_switch_box):not(img):not(option):not(input):not(select):not(textarea):not(mark):not(code):not(pre):not(ins):not(button):not(a):not(video):not(canvas):not(progress):not(iframe):not(svg):not(path):not(.mejs-iframe-overlay):not(.mejs-iframe-overlay):not(.elementor-element-overlay):not(.elementor-background-overlay):not(i):not(button *):not(a *) {
           background-color: var(--drdt-color-bg) !important;
           color: var(--drdt-color-body);
           border-color: var(--drdt-color-border) !important;
           box-shadow: none !important;
         }
         html.drdt-dark-mode > body h1:not(.drdt-ignore-dark),
         html.drdt-dark-mode > body h2:not(.drdt-ignore-dark),
         html.drdt-dark-mode > body h3:not(.drdt-ignore-dark),
         html.drdt-dark-mode > body h4:not(.drdt-ignore-dark),
         html.drdt-dark-mode > body h5:not(.drdt-ignore-dark),
         html.drdt-dark-mode > body h6:not(.drdt-ignore-dark){
            color: var(--drdt-color-head) !important;
         }
         html.drdt-dark-mode a:not(.drdt-ignore-dark),
         html.drdt-dark-mode a *:not(.drdt-ignore-dark),
         html.drdt-dark-mode a:active:not(.drdt-ignore-dark),
         html.drdt-dark-mode a:active *:not(.drdt-ignore-dark),
         html.drdt-dark-mode a:visited:not(.drdt-ignore-dark),
         html.drdt-dark-mode a:visited *:not(.drdt-ignore-dark) {
           background: transparent !important;
           background-color: transparent !important;
           color: var(--drdt-color-link) !important;
           border-color: var(--drdt-color-border) !important;
           box-shadow: none;
         }
         html.drdt-dark-mode > body a:hover:not(.drdt-ignore-dark),
         html.drdt-dark-mode > body a *:hover:not(.drdt-ignore-dark){
            color: var(--drdt-color-head) !important;
         }
         html.drdt-dark-mode input:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=button]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=checkebox]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=date]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=datetime-local]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=email]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=image]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=month]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=number]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=range]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=reset]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=search]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=submit]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=tel]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=text]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=time]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=url]:not(.drdt-ignore-dark),
         html.drdt-dark-mode input[type=week]:not(.drdt-ignore-dark),
         html.drdt-dark-mode button:not(.drdt-ignore-dark),
         html.drdt-dark-mode iframe:not(.drdt-ignore-dark),
         html.drdt-dark-mode iframe *:not(.drdt-ignore-dark),
         html.drdt-dark-mode select:not(.drdt-ignore-dark),
         html.drdt-dark-mode textarea:not(.drdt-ignore-dark),
         html.drdt-dark-mode i:not(.drdt-ignore-dark) {
           background: var(--drdt-color-btn) !important;
           background-color: var(--drdt-color-btn) !important;
           color: var(--drdt-color-head) !important;
           border-color: var(--drdt-color-border) !important;
           box-shadow: none !important;
        }
        /*@media (prefers-color-scheme: dark) {
			html :not(.drdt-ignore-dark):not(input):not(textarea):not(button):not(select):not(mark):not(code):not(pre):not(ins):not(option):not(img):not(progress):not(iframe):not(.mejs-iframe-overlay):not(svg):not(video):not(canvas):not(a):not(path):not(.elementor-element-overlay):not(.elementor-background-overlay):not(i):not(button *):not(a *) {
                background-color: var(--drdt-color-bg) !important;
                color: var(--drdt-color-body);
                border-color: var(--drdt-color-border) !important;
                box-shadow: none !important;
			}
		}*/

        html.drdt-dark-mode .drdt-ignore-dark-back{
            background: transparent !important;
            background-color: transparent !important;
        }
        ";

        $custom_css .= ($data['custom_css']) ?? '';
        //$custom_css = apply_filters('dtdr-dark-mode/custom/css', $custom_css);
        // public mode
        wp_add_inline_style( 'ga_styles', str_replace(["\n", "  "], '', $custom_css) );
    }

    /**
     * Desc: Update html class on load based on cookie settings
     * @param $output
     * @return string
     */
    function html_class( $output ){
        if( isset($_COOKIE['darkMode']) ){
            $default = sanitize_text_field($_COOKIE['darkMode']);
            if ($default == 'dark') {
                $output .= ' class="drdt-dark-mode dtdr-color-1"';
                return $output;
            }
        }

        return $output;
    }

    // html class modify
    add_filter( 'language_attributes', 'html_class' );
});
