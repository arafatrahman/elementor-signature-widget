<?php
namespace ElementorSignatureWidget\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class SignatureWidget extends Widget_Base {
    public function get_name() {
        return 'signature_widget';
    }

    public function get_title() {
        return 'Signature Widget';
    }

    public function get_icon() {
        return 'eicon-signature';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {
        $this->start_controls_section('content_section', [
            'label' => 'Signature Settings',
            'tab' => Controls_Manager::TAB_CONTENT,
        ]);
    
        $this->add_control('signature_label', [
            'label' => 'Label',
            'type' => Controls_Manager::TEXT,
            'default' => 'Sign below',
        ]);
    
        $this->add_control('signature_type', [
            'label' => 'Signature Type',
            'type' => Controls_Manager::SELECT,
            'default' => 'draw',
            'options' => [
                'draw' => 'Draw Signature',
                'type' => 'Type Signature',
            ],
        ]);
    
        $this->add_control('font_style', [
            'label' => 'Font Style',
            'type' => Controls_Manager::SELECT,
            'default' => 'Arial',
            'options' => [
                'Arial' => 'Arial',
                'Cursive' => 'Cursive',
                'Georgia' => 'Georgia',
                'Courier New' => 'Courier New',
            ],
            'condition' => [
                'signature_type' => 'type',
            ],
        ]);
    
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $label = $settings['signature_label'];
        $signature_type = $settings['signature_type'];
        $font_style = $settings['font_style'];
    
        echo '<div class="signature-widget">';
        echo '<label>' . esc_html($label) . '</label>';
    
        if ($signature_type === 'draw') {
            echo '<canvas id="signature-pad" width="400" height="200"></canvas>';
            echo '<button id="clear-signature" class="button">Clear</button>';
            echo '<button id="save-signature" class="button">Save</button>';
            echo '<input type="hidden" id="signature-data" name="signature_data" />';
        } else {
            echo '<input type="text" id="type-signature" style="font-family:' . esc_attr($font_style) . ';" placeholder="Type your signature here" />';
            echo '<button id="change-font" class="button">Change Font</button>';
            echo '<input type="hidden" id="typed-signature-data" name="typed_signature_data" />';
        }
    
        echo '</div>';
    }

    protected function content_template() {}
}