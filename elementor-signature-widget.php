<?php
/**
 * Plugin Name: Elementor Signature Widget 
 * Description: Custom Elementor widget for capturing signatures.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Register the widget
function register_signature_widget($widgets_manager) {
    require_once __DIR__ . '/widgets/SignatureWidget.php';
    $widgets_manager->register(new \ElementorSignatureWidget\Widgets\SignatureWidget());
}

add_action('elementor/widgets/register', 'register_signature_widget');

// Enqueue assets
function signature_widget_assets() {
   
    wp_enqueue_script('signature-pad', plugins_url('/assets/js/signature-pad.min.js', __FILE__), [], '1.5.3', true);
    wp_enqueue_script('signature-widget-js', plugins_url('/assets/js/widget.js', __FILE__), ['jquery', 'signature-pad'], '1.0', true);
    wp_enqueue_style('signature-widget-css', plugins_url('/assets/css/style.css', __FILE__), [], '1.0');
    wp_enqueue_style('signature-widget-fonts', 'https://fonts.googleapis.com/css2?family=Allura&family=Alex+Brush&family=Bad+Script&family=Cookie&family=Courgette&family=Dawning+of+a+New+Day&family=Dancing+Script&family=Great+Vibes&family=Indie+Flower&family=Kaushan+Script&family=Mr+De+Haviland&family=Mrs+Saint+Delafield&family=Parisienne&family=Pacifico&family=Sacramento&family=Satisfy&family=Shadows+Into+Light&family=Tangerine&family=Yellowtail&display=swap', [], null);
}

add_action('wp_enqueue_scripts', 'signature_widget_assets');
add_action('elementor/editor/after_enqueue_scripts', 'signature_widget_assets');