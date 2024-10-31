
input = document.getElementById('search')

input.onkeyup = () => {
    let filtro = input.value.toLowerCase()
    // table_rows = document.getElementsByTagName('table')[0].getElementsByTagName('tr')
    // console.log(table_rows)
    let table_rows = document.querySelectorAll('table tr')

    for (let i = 1; i < table_rows.length; i++) {
        if (!table_rows[i].cells[0].innerHTML.toLowerCase().includes(filtro)) {
            table_rows[i].style.display = 'none'
        } else {
            table_rows[i].style.display = 'revert'
        }
    }
}
