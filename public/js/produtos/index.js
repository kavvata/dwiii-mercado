
input = document.getElementById('search')

input.onkeyup = () => {
    let filtro = input.value.toLowerCase()
    // table_rows = document.getElementsByTagName('table')[0].getElementsByTagName('tr')
    // console.log(table_rows)
    let table_rows = document.querySelectorAll('table tr')

    // NOTE: pulando o primeiro elemento pois seria o cabecalho da tabela
    for (let i = 1; i < table_rows.length; i++) {
        // NOTE: Celula 0 seria o td com o nome do produto
        if (!table_rows[i].cells[0].innerHTML.toLowerCase().includes(filtro)) {
            table_rows[i].style.display = 'none'
        } else {
            table_rows[i].style.display = 'revert'
        }
    }
}
