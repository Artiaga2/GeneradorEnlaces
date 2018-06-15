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
/******/ 	return __webpack_require__(__webpack_require__.s = 47);
/******/ })
/************************************************************************/
/******/ ({

/***/ 47:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(48);


/***/ }),

/***/ 48:
/***/ (function(module, exports) {

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

    var button = $('button');
    button.prop("disabled", true);

    var data = {};
    data["titulo"] = $("#titulo").val();
    data["uri"] = $("#uri").val();
    data["tipo"] = $("#tipo").val();
    data["descripcion"] = $("#descripcion").val();
    data["privacidad"] = $("#privacidad").val();
    data["tags"] = $("#tags").val();

    axios.post('/enlaces/validate', data).then(function (response) {
        var tituloIncorrecto = gestionarErrores($("#titulo"), response.data["titulo"]);
        var uriIncorrecto = gestionarErrores($("#uri"), response.data["uri"]);
        var tipoIncorrecto = gestionarErrores($("#tipo"), response.data["tipo"]);
        var descripcionIncorrecto = gestionarErrores($("#descripcion"), response.data["descripcion"]);
        var privacidadIncorrecto = gestionarErrores($("#privacidad"), response.data["privacidad"]);
        var tagsIncorrecto = gestionarErrores($("#tags"), response.data["tags"]);

        if (!tituloIncorrecto && !uriIncorrecto && !tipoIncorrecto && !descripcionIncorrecto && !privacidadIncorrecto && !tagsIncorrecto) {
            $('#form').submit();
        }
    }).catch(function (error) {
        console.log(error);
    }).then(function () {
        $('button').prop("disabled", false);
    });
}

function validate(field) {

    var data = {};
    data[field] = $("#" + field).val();

    $("#" + field).next().css("display", "block");

    axios.post('/enlaces/validate', data).then(function (response) {
        gestionarErrores($("#" + field), response.data[field]);
    }).catch(function (error) {
        console.log(error);
    }).then(function () {
        $("#" + field).next().css("display", "none");
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
    var hayErrores = false;
    var divErrores = input.next("div");
    divErrores.html("");
    input.removeClass("is-valid is-invalid");

    if (errores === undefined || errores.length === 0) {
        input.addClass("is-valid");
    } else {
        hayErrores = true;
        input.addClass("is-invalid");
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                divErrores.append('<div class="alert alert-danger" role="alert">' + error + '</div>');
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }
    }
    return hayErrores;
}

/***/ })

/******/ });