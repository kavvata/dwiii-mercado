const precoInput = document.getElementById("preco");

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

    precoInput.value = "R$ " + result;
};

precoInput.onkeyup = formatar;
