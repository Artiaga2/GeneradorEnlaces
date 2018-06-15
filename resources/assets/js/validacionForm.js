$(function () {
    $('#enviar').on("click", validateAll);
    $('#titulo').on("change", validateTitulo);
    $('#uri').on("change", validateUri);
    $('#tipo').on("change", validateTipo);
    $('#descripcion').on("change", validateDescripcion);
    $('#privacidad').on("change", validatePrivacidad);
    $('#tags').on("change", validateTags);

});


function validateAll(e) {

    e.preventDefault();

    let button = $('button');
    button.prop("disabled", true);

    let data = {};
    data["titulo"] = $("#titulo").val();
    data["uri"] = $("#uri").val();
    data["tipo"] = $("#tipo").val();
    data["descripcion"] = $("#descripcion").val();
    data["privacidad"] = $("#privacidad").val();
    data["tags"] = $("#tags").val();

    axios.post('/enlaces/validate', data
    ).then(function (response) {
        let tituloIncorrecto = gestionarErrores($("#titulo"), response.data["titulo"]);
        let uriIncorrecto = gestionarErrores($("#uri"), response.data["uri"]);
        let tipoIncorrecto = gestionarErrores($("#tipo"), response.data["tipo"]);
        let descripcionIncorrecto = gestionarErrores($("#descripcion"), response.data["descripcion"]);
        let privacidadIncorrecto = gestionarErrores($("#privacidad"), response.data["privacidad"]);
        let tagsIncorrecto = gestionarErrores($("#tags"), response.data["tags"]);

        if (!tituloIncorrecto && !uriIncorrecto && !tipoIncorrecto && !descripcionIncorrecto && !privacidadIncorrecto && !tagsIncorrecto) {
            $('#form').submit();
        }
    }).catch(function (error) {
        console.log(error);
    }).then(function(){
        $('button').prop("disabled", false);
    });
}


function validate(field) {

    let data = {};
    data[field] = $("#" + field).val();

    $("#" + field).next().css("display","block");

    axios.post('/enlaces/validate', data
    ).then(function (response) {
        gestionarErrores($("#" + field), response.data[field]);
    }).catch(function (error) {
        console.log(error);
    }).then(function () {
        $("#" + field).next().css("display","none");
    });
}

function validateTitulo() {
    validate("titulo");
}

function validateUri() {
    validate("uri");
}

function validateTipo() {
    validate("tipo");
}

function validateDescripcion() {
    validate("descripcion");
}

function validatePrivacidad() {
    validate("privacidad");
}

function validateTags() {
    validate("tags");
}

function gestionarErrores(input, errores) {
    let hayErrores = false;
    let divErrores = input.next("div");
    divErrores.html("");
    input.removeClass("is-valid is-invalid");

    if (errores === undefined || errores.length === 0) {
        input.addClass("is-valid");
    } else {
        hayErrores = true;
        input.addClass("is-invalid");
        for (let error of errores) {
            divErrores.append('<div class="alert alert-danger" role="alert">' + error + '</div>');
        }
    }
    return hayErrores;
}