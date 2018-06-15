$(function () {
    $('#enviar').on("click", deleteEnlace);
    $('button[name="btnModal"]').on("click",mostrarModal);
});

function deleteEnlace() {
    let id =  $('#enviar').attr("data-idEnlaceEnviar");
    axios.delete('/enlaces/delete/' + id)
        .then(function (response) {
            console.log(response);
            $("#enlace" + id).remove();
            $("#myModal").modal("hide");
        })
        .catch(function (error) {
            console.log(error);
            $("#myModal").modal("hide");
        }).then(function(){
        $('#enviar').attr("data-idEnlaceEnviar","");

    });
}



function mostrarModal(e) {
    let botonPulsado = e.target;
    let idEnlace = $(botonPulsado).attr("data-idEnlace");
    $('#enviar').attr("data-idEnlaceEnviar",idEnlace);
    $("#myModal").modal();
}