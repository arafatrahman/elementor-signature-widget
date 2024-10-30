<?php
namespace ElementorSignatureWidget\Controllers;

use ElementorSignatureWidget\Models\SignatureModel;

class SignatureController {
    private $model;

    public function __construct() {
        $this->model = new SignatureModel();
    }

    public function handle_save_signature($signature_data) {
        $this->model->save_signature($signature_data);
    }
}
