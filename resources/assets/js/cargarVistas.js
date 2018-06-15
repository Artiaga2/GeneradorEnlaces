$(function () {
$('#mostrar').on("click", mostrarDatos);
$('#mostrarUno').on("click", mostrarAjaxUno);
$('#mostrarVista').on("click", mostrarVista);
});

let data = {};
data["titulo"] = $("#titulo").val();
data["uri"] = $("#uri").val();
data["tipo"] = $("#tipo").val();
data["descripcion"] = $("#descripcion").val();


let cont = 0;

function mostrarDatos() {

    let resp = $("#enlacesList");

    axios.get('/data/mostrarDatosAjax', {}).then(function (response) {
        showResponse(response, resp);
    }).catch(function (error) {
        console.log(error);
    });
}

function mostrarAjaxUno() {

    let resp = $("#enlacesList");
    axios.post('/data/mostrarAjaxUno', {
        posicionInicial: cont,
        numeroElementos: 1
    }).then(function (response) {
        showResponse(response, resp);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function mostrarVista() {
    axios.post('/admin/enlaces/index.blade.php', {
        posicionInicial: cont,
        numeroElementos: 1
    }).then(function (response) {
        $('#enlacesList').append(response.data);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function buildElement(elemento) {

    let div = $("<div></div>");
    div.addClass("card");

    let divHeader = $('<div></div>');
    divHeader.addClass("card-header");
    let h2 = $("<h2></h2>");
    let a = $("<a></a>");
    let p = $("<p></p>");
    let em = $("<em></em>");
    let pContent = $("<p></p>");

    h2.addClass("card-title");
    p.addClass("card-subtitle");
    pContent.addClass("card-body");

    a.text(elemento.titulo);
    p.text(elemento.uri);
    p.text(elemento.tipo);
    pContent.text(elemento.descripcion);

    h2.append(a);
    divHeader.append(h2);
    p.append(em);
    divHeader.append(p);
    div.append(divHeader);
    div.append(pContent);

    return div;
}

function showResponse(response, resp) {
    let data = response.data;
    for (let item in response.data) {
        let elemento = data[item];
        let div = buildElement(elemento);
        resp.append(div);
    }
}