function uploadImage() {
    const fileInput = document.getElementById('imageUpload');
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const logoImage = document.getElementById('logoImage');
        logoImage.src = e.target.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    }
}