const formatar = (event) => {
    // brigado https://stackoverflow.com/a/68203262 !!

    let value = event.target.value;

    value = value.replace(".", "").replace(",", "").replace(/\D/g, "");

    if (value.trim() == "") {
        value = 0;
    }

    const options = { minimumFractionDigits: 2 };
    const result = new Intl.NumberFormat("pt-BR", options).format(
        parseFloat(value) / 100,
    );

    event.target.value = "R$ " + result;
};

const previewImage = (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

document.addEventListener('edit-form-loaded', function () {
    document.getElementById("preco").addEventListener("keyup", formatar);
    document.getElementById('imageUpload').addEventListener('change', previewImage);
})

