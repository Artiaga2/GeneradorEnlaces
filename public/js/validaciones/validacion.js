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
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

$(function () {
    $("#name").on('change', validarNombre);
    $("#email").on('change', validarCorreo);
    $("#titulo").on('change', validarTitulo);
});

function validarNombre() {
    var resultado = false;
    var inputNombre = $("#name");
    inputNombre.removeClass("is-invalid");
    inputNombre.removeClass("id-valid");
    var valorNombre = inputNombre.val().trim();
    if (valorNombre !== "" && valorNombre.match(/^[aA-zZ\s]{5,}$/)) {
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
    var resultado = false;
    var inputCorreo = $("#email");
    inputCorreo.removeClass("is-invalid");
    inputCorreo.removeClass("is-valid");
    var valorCorreo = inputCorreo.val().trim();
    if (valorCorreo !== "" && valorCorreo.match(/^[aA-zZ\s]{5,}$/)) {
        resultado = true;
        inputCorreo.addClass("is-valid");
        if (inputCorreo.next().length > 0) {
            inputCorreo.next().remove();
        }
    } else {
        inputCorreo.addClass("is-invalid");
        if (inputCorreo.next().length === 0) {
            inputCorreo.after("<div class='text-danger'>ERROR EN EL CORREO</div>");
        }
    }

    return resultado;
}

function validarTitulo() {
    var resultado = false;
    var inputTitulo = $("#titulo");
    inputTitulo.removeClass("is-invalid");
    inputTitulo.removeClass("is-valid");
    var valorTitulo = inputTitulo.val().trim();
    if (valorTitulo !== "" && valorTitulo.match(/^[aA-zZ\s]{5,}$/)) {
        resultado = true;
        inputTitulo.addClass("is-valid");
        if (inputTitulo.next().length > 0) {
            inputTitulo.next().remove();
        }
    } else {
        inputTitulo.addClass("is-invalid");
        if (inputTitulo.next().length === 0) {
            inputTitulo.after("<div class='text-danger'>ERROR EN EL TITULO</div>");
        }
    }

    return resultado;
}


        function validarTituloAxios() {

            axios.post('/register/validar', {
                name: $("#name").val()
            }).then(function (response) {
                gestionarErrores($("#name"), response.data.name);
            }).catch(function (error) {
                console.log(error);
            });
        }

/***/ })

/******/ });