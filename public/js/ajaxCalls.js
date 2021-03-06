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
/******/ 	__webpack_require__.p = "";
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
    $("#username").on("change", function () {
        validateRegister("username", "#username", "#errorUsername");
    });

    $("#emailRegister").on("change", function () {
        validateRegister('email', "#emailRegister", "#errorUserEmail");
    });

    $("#passwordRegister").on("change", function () {
        validateRegister('password', "#passwordRegister", "#errorUserPassword");
    });
});

function validateRegister(dato, selector, selectorDiv) {
    //Se guarda en esta variable las cabeceras
    var headers = new Headers();

    headers.append("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
    // Se guarda en esta variable los datos recogidos del formulario
    var form = new FormData();

    form.append(dato, $(selector).val());

    //Se guarda en la variable la configuracion de la llamada

    var configuration = {
        method: 'POST',
        headers: headers,
        body: form,
        credentials: "same-origin"
    };

    // Comienza la llamada

    fetch('/user/new/validate/' + dato, configuration).then(function (response) {
        return response.json();
    }).then(function (data) {
        console.log(dato);
        if (data[dato].length > 0) {
            $(selectorDiv).addClass("invalid-feedback").text(data[dato]);
            $(selector).removeClass("is-valid");
            $(selector).addClass("is-invalid");
            // $(function () {
            //     $(selector).tooltip({'trigger':'focus', 'title': data[dato]});
            // });
        } else {
            $(selector).removeClass("is-invalid");
            $(selector).addClass("is-valid");
            $(selectorDiv).removeClass("invalid-feedback");
            $(selectorDiv).addClass("valid-feedback").text("Correct");
        }
    }).catch(function (err) {
        console.log(err);
        alert("EERRROOR");
    });
}

/***/ })

/******/ });