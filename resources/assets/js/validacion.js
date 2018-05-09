$(function(){
$("#name").on('change', validarNombre);
$("#email").on('change', validarCorreo);
$("#titulo").on('change', validarTitulo);
});

function validarNombre() {
    let resultado = false;
    let inputNombre = $("#name");
    inputNombre.removeClass("is-invalid");
    inputNombre.removeClass("id-valid");
    let valorNombre = inputNombre.val().trim();
    if (valorNombre !== ""
        && valorNombre.match(/^[aA-zZ\s]{5,}$/)
    ) {
        resultado = true;
        inputNombre.addClass("is-valid");
        if (inputNombre.next().length > 0) {
            inputNombre.next().remove();
        }
    } else {
        inputNombre.addClass("is-invalid");
        if (inputNombre.next().length === 0) {
            inputNombre.after("<div class='text-danger'>ERROR EN EL NOMBRE</div>");
        }
    }


    return resultado;
}


function validarCorreo() {
    let resultado = false;
    let inputCorreo = $("#email");
    inputCorreo.removeClass("is-invalid");
    inputCorreo.removeClass("is-valid");
    let valorCorreo = inputCorreo.val().trim();
    if (valorCorreo !== "" && valorCorreo.match(/^[aA-zZ\s]{5,}$/)){
        resultado = true;
        inputCorreo.addClass("is-valid");
        if (inputCorreo.next().length > 0){
            inputCorreo.next().remove();
        }
    } else {
        inputCorreo.addClass("is-invalid");
        if (inputCorreo.next().length === 0){
            inputCorreo.after("<div class='text-danger'>ERROR EN EL CORREO</div>")
        }
    }

    return resultado;
}

function validarTitulo() {
    let resultado = false;
    let inputTitulo = $("#titulo");
    inputTitulo.removeClass("is-invalid");
    inputTitulo.removeClass("is-valid");
    let valorTitulo = inputTitulo.val().trim();
    if (valorTitulo !== "" && valorTitulo.match(/^[aA-zZ\s]{5,}$/)){
        resultado = true;
        inputTitulo.addClass("is-valid");
        if (inputTitulo.next().length > 0){
            inputTitulo.next().remove();
        }
    } else {
        inputTitulo.addClass("is-invalid");
        if (inputTitulo.next().length === 0){
            inputTitulo.after("<div class='text-danger'>ERROR EN EL TITULO</div>")
        }
    }

    return resultado;
}