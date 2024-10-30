<?php
namespace ElementorSignatureWidget\Models;

class SignatureModel {
    public function save_signature($signature_data) {
        // Process signature data (e.g., save to database)
        // Example: Save base64 image data as post meta (customize as needed)
        update_option('signature_widget_data', $signature_data); // For demonstration
    }
}
