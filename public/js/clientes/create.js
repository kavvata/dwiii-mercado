const formatarCpf = (event) => {
    let value = event.target.value

    if (value.length > 14) {
        value = value.substring(0, 14)
    }

    value = value.replace(/\D/g, "")
        .replace(/(\d{3})(\d)/, "$1.$2")
        .replace(/(\d{3})(\d)/, "$1.$2")
        .replace(/(\d{3})(\d{1,2})$/, "$1-$2")

    value.trim()

    event.target.value = value
}

const formatarCep = (event) => {
    let cep = event.target.value;

    if (cep.length > 9) {
        cep = cep.substring(0, 9)
    }

    cep = cep.replace(/\D/g, '')
        .replace(/(\d{5})(\d)/, '$1-$2')

    cep.trim()

    event.target.value = cep
}

const formatarTelefone = (event) => {
    let telefone = event.target.value;

    telefone = telefone.replace(/\D/g, '');

    if (telefone.length > 11) {
        telefone = telefone.substring(0, 11);
    }

    telefone = telefone.replace(/(\d{2})(\d{4,5})(\d{4})/, '($1) $2-$3');

    event.target.value = telefone;
};

function limpaCep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");

}

function cepCallback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);

    } //end if.
    else {
        //CEP não Encontrado.
        limpaCep();
        alert("CEP não encontrado.");
    }
}


const pesquisaCep = (event) => {

    event.preventDefault()

    //Nova variável "cep" somente com dígitos.
    let cep = document.getElementById('cep').value.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";


            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=cepCallback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        }
        else {
            console.log("Formato de CEP inválido.");
            //cep é inválido.
            limpaCep();
        }
    }
    else {
        //cep sem valor, limpa formulário.
        limpaCep();
    }
};

document.addEventListener('edit-form-loaded', function () {
    document.getElementById("cpf").addEventListener("keyup", formatarCpf);
    document.getElementById("cep").addEventListener("keyup", formatarCep);
    document.getElementById("telefone").addEventListener("keyup", formatarTelefone);
    document.getElementById("buscarCep").addEventListener("click", pesquisaCep);
})

