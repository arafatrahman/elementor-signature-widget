document.addEventListener("DOMContentLoaded", function() {
    const signaturePad = document.getElementById("signature-pad") ? new SignaturePad(document.getElementById("signature-pad")) : null;
    const typeSignature = document.getElementById("type-signature");
    const signatureType = document.querySelector(".elementor-control-signature_type select");
    const changeFontButton = document.getElementById("change-font");

    // Array of font styles
    const fonts = [
        'Arial', 'Cursive', 'Brush Script MT', 'Lucida Handwriting', 'Comic Sans MS', 
        'Dancing Script', 'Pacifico', 'Shadows Into Light', 'Satisfy', 'Great Vibes',
        'Indie Flower', 'Kaushan Script', 'Allura', 'Alex Brush', 'Parisienne', 'Cookie',
        'Homemade Apple', 'Mr De Haviland', 'Sacramento', 'Mrs Saint Delafield', 'Tangerine',
        'Courgette', 'Bad Script', 'Dawning of a New Day', 'Yellowtail'
    ];
    let currentFontIndex = 0;

    if (signaturePad) {
        document.getElementById("clear-signature").addEventListener("click", () => signaturePad.clear());
    }

    signatureType && signatureType.addEventListener("change", function() {
        if (this.value === "type") {
            typeSignature && (typeSignature.style.display = "block");
            signaturePad && (signaturePad.canvas.style.display = "none");
        } else {
            typeSignature && (typeSignature.style.display = "none");
            signaturePad && (signaturePad.canvas.style.display = "block");
        }
    });

    // Change font functionality
    changeFontButton.addEventListener("click", function() {
        currentFontIndex = (currentFontIndex + 1) % fonts.length; // Increment and wrap around
        typeSignature.style.fontFamily = fonts[currentFontIndex]; // Change font
    });
});
