<?php
// signature-widget-view.php
?>

<div class="signature-widget">
    <label><?php echo esc_html($label); ?></label>
    <canvas id="signature-pad" width="400" height="200"></canvas>
    <button id="clear-signature" class="button">Clear</button>
    <button id="save-signature" class="button">Save</button>
    <input type="hidden" id="signature-data" name="signature_data" />
</div>

