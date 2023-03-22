const eliminar = (id, title) => {

    let person = confirm("¿ desea eliminar el libro "+title+" ?");
    if (person) {
        console.log(id);
        let form = document.getElementById('eliminar'+id);
        console.log(form);
        form.submit();
    }
}