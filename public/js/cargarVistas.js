/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 54);
/******/ })
/************************************************************************/
/******/ ({

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(55);


/***/ }),

/***/ 55:
/***/ (function(module, exports) {

$(function () {
    $('#mostrar').on("click", mostrarDatos);
    $('#mostrarUno').on("click", mostrarAjaxUno);
    $('#mostrarVista').on("click", mostrarVista);
});

var data = {};
data["titulo"] = $("#titulo").val();
data["uri"] = $("#uri").val();
data["tipo"] = $("#tipo").val();
data["descripcion"] = $("#descripcion").val();

var cont = 0;

function mostrarDatos() {

    var resp = $("#enlacesList");

    axios.get('/data/mostrarDatosAjax', {}).then(function (response) {
        showResponse(response, resp);
    }).catch(function (error) {
        console.log(error);
    });
}

function mostrarAjaxUno() {

    var resp = $("#enlacesList");
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

    var div = $("<div></div>");
    div.addClass("card");

    var divHeader = $('<div></div>');
    divHeader.addClass("card-header");
    var h2 = $("<h2></h2>");
    var a = $("<a></a>");
    var p = $("<p></p>");
    var em = $("<em></em>");
    var pContent = $("<p></p>");

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
    var data = response.data;
    for (var item in response.data) {
        var elemento = data[item];
        var div = buildElement(elemento);
        resp.append(div);
    }
}

/***/ })

/******/ });