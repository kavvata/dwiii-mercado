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

const diminuirQuantidade = (event) => {
    let quantidadeInput = document.getElementById("quantidade")


    quantidadeInput.value = Number(quantidadeInput.value) - 1
    validarQuantidade(event)
}
const aumentarQuantidade = (event) => {
    let quantidadeInput = document.getElementById("quantidade")

    quantidadeInput.value = Number(quantidadeInput.value) + 1
    validarQuantidade(event)
}

const validarQuantidade = (event) => {
    let quantidadeInput = event.target.id == "quantidade" ? event.target : document.getElementById("quantidade")

    if (quantidadeInput.value < 1) {
        quantidadeInput.value = 1
    }
}

document.addEventListener('edit-form-loaded', function () {
    document.getElementById("increment-button").addEventListener("click", aumentarQuantidade);
    document.getElementById("decrement-button").addEventListener("click", diminuirQuantidade);
    document.getElementById("quantidade").addEventListener("change", validarQuantidade);
    document.getElementById("preco").addEventListener("keyup", formatar);
    document.getElementById('imageUpload').addEventListener('change', previewImage);
})

