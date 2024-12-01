input = document.getElementById('search')

input.onkeyup = () => {
    let filtro = input.value.toLowerCase()
    let table_rows = document.querySelectorAll('#table-categoria tr')

    // NOTE: pulando o primeiro elemento pois seria o cabecalho da tabela
    for (let i = 1; i < table_rows.length; i++) {
        // NOTE: Celula 0 seria o td com o nome do produto
        if (!table_rows[i].cells[1].innerHTML.toLowerCase().includes(filtro)) {
            table_rows[i].style.display = 'none'
        } else {
            table_rows[i].style.display = 'revert'
        }
    }
}
