function copiar(id) {
    /* var id=id; */
    /* Get the text field */
    /* var i = 1 */
    ruta = "http://localhost/www/app-actividades/view/actividad.php?id=" + id;
    /* var copyText = document.getElementById("copy"); */

    /* Select the text field */
    /* ruta.select(); */
    /* ruta.setSelectionRange(0, 99999); */
    /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(ruta);

    /* Alert the copied text */
    alert("Copied the text: " + ruta);


}

function muestra(i) {
    var mostrar = document.getElementById("cambio" + i);
    console.log(mostrar);
    if (mostrar.className == "btn btn-light m-1") {
        mostrar.className = "btn btn-danger m-1";
    } else if (mostrar.className == "btn btn-danger m-1") {
        mostrar.className = "btn btn-light m-1";
    }
    window.location.href = "./like.php?id=" + i;
}