const cpfInput = document.getElementById("cpf");

const formatar = (event) => {
    let value = event.target.value

    if (value.length > 14) {
        value = value.substring(0, value.length - 1)
    }

    value = value.replace(/\D/g, "")
        .replace(/(\d{3})(\d)/, "$1.$2")
        .replace(/(\d{3})(\d)/, "$1.$2")
        .replace(/(\d{3})(\d{1,2})$/, "$1-$2")

    value.trim()

    event.target.value = value
}


cpfInput.onkeyup = formatar
cpfInput.dispatchEvent(new Event('keyup'))
