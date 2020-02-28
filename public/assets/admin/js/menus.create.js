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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/menus.core.js":
/*!******************************************!*\
  !*** ./resources/js/admin/menus.core.js ***!
  \******************************************/
/*! exports provided: chooseRecord, chooseOther, buttonPaginationOnClick, searchArticle, chooseCategory, chooseProduct, chooseOtherProduct, buttonProductPaginationOnClick, searchProduct, checkRequiredField */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "chooseRecord", function() { return chooseRecord; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "chooseOther", function() { return chooseOther; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "buttonPaginationOnClick", function() { return buttonPaginationOnClick; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "searchArticle", function() { return searchArticle; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "chooseCategory", function() { return chooseCategory; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "chooseProduct", function() { return chooseProduct; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "chooseOtherProduct", function() { return chooseOtherProduct; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "buttonProductPaginationOnClick", function() { return buttonProductPaginationOnClick; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "searchProduct", function() { return searchProduct; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "checkRequiredField", function() { return checkRequiredField; });
function chooseRecord(url) {
  $('.choose-record').on('click', function (e) {
    e.preventDefault();
    $('input[name=menuable_id').val($(this).data('id'));
    $('.item').not($(this).parents('.item')).remove();
    $('.btn-choose').empty();
    $('.btn-choose').append("<button class=\"btn btn-sm btn-info button-choose-other\">Ch\u1ECDn m\u1EE5c kh\xE1c</button>");
    $('.pagination').remove();
    $('.search-input').attr('readonly', true);
    chooseOther(url);
  });
}
;
function chooseOther(url) {
  $('.button-choose-other').click(function (e) {
    e.preventDefault();
    $('input[name=menuable_id').val(""); // $('input[name=link]').val("");

    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseRecord(url);
        buttonPaginationOnClick(url);
        searchArticle(url);
      }
    });
  });
}
;
function buttonPaginationOnClick(url) {
  $('.pagination a').on('click', function (e) {
    e.preventDefault();

    var _url = $(this).attr('href');

    $.ajax({
      url: _url,
      method: 'GET',
      success: function success(scs) {
        $('.filter-result').html(scs);
        chooseRecord(url);
        buttonPaginationOnClick(url);
      }
    });
  });
}
;
function searchArticle(url) {
  $('.search-input').on('keyup', _.debounce(function (e) {
    e.preventDefault();
    var keyword = $(this).val();
    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      data: {
        keyword: keyword
      },
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseRecord(url);
        buttonPaginationOnClick(url);
        searchArticle(url);
      }
    });
  }, 500));
}
;
function chooseCategory() {
  // $('.menu-category').off();
  $('#menu-category').on('changed.bs.select', function (e) {
    // e.preventDefault();
    // console.log($(this).val());
    $('input[name=menuable_id').val($(this).val());
  });
}
;
function chooseProduct(url) {
  $('.choose-record').on('click', function (e) {
    e.preventDefault();
    $('input[name=menuable_id').val($(this).data('id'));
    $('.product-item').not($(this).parents('.product-item')).remove();
    $('.btn-choose').empty();
    $('.btn-choose').append("<button class=\"btn btn-sm btn-info button-choose-other\">Ch\u1ECDn s\u1EA3n ph\u1EA9m kh\xE1c</button>");
    $('.pagination').remove();
    $('.search-input').attr('readonly', true);
    chooseOtherProduct(url);
  });
}
;
function chooseOtherProduct(url) {
  $('.button-choose-other').click(function (e) {
    e.preventDefault();
    $('input[name=menuable_id').val(""); // $('input[name=link]').val("");

    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseProduct(url);
        buttonProductPaginationOnClick(url);
        searchProduct(url);
      }
    });
  });
}
;
function buttonProductPaginationOnClick(url) {
  $('.pagination a').on('click', function (e) {
    e.preventDefault();

    var _url = $(this).attr('href');

    $.ajax({
      url: _url,
      method: 'GET',
      success: function success(scs) {
        $('.filter-result').html(scs);
        chooseProduct(url);
        buttonProductPaginationOnClick(url);
      }
    });
  });
}
;
function searchProduct(url) {
  $('.search-input').on('keyup', _.debounce(function (e) {
    e.preventDefault();
    var keyword = $(this).val();
    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      data: {
        keyword: keyword
      },
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseProduct(url);
        buttonProductPaginationOnClick(url);
        searchProduct(url);
      }
    });
  }, 500));
}
;
function checkRequiredField(context) {
  var isValidate = true;
  var fields = $(context).parents('#menu-form').find('input,textarea,select').filter('[required]');
  fields.each(function () {
    if (!$(this).val().length) {
      isValidate = false;
    }
  });

  if ($("select[name=type]").val() != 0 && $("select[name=type]").val() != 3 && $("select[name=type]").val() != 7 && $('input[name=menuable_id]').val().length == 0) {
    isValidate = false;
  }

  if (!isValidate) {
    Swal.fire({
      title: "Lỗi",
      text: "Errr... Bạn chưa điền hết thông tin bắt buộc!",
      icon: "error",
      confirmButtonColor: "red"
    });
  }

  return isValidate;
}
;

/***/ }),

/***/ "./resources/js/admin/menus.create.js":
/*!********************************************!*\
  !*** ./resources/js/admin/menus.create.js ***!
  \********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _menus_core_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./menus.core.js */ "./resources/js/admin/menus.core.js");

$(document).ready(function () {
  $("select[name=type]").on('change', function (e) {
    e.preventDefault();
    var url = "";
    $('input[name=menuable_type]').val($(this).val());
    $('.url-group').addClass('d-none');

    if ($(this).val() == 0 && $('.url-group').hasClass('d-none')) {
      $('.url-group').removeClass('d-none');
      $('.filter-result').empty();
    }

    if ($(this).val() == 1 || $(this).val() == 2) {
      var data = {
        type: "article"
      };
      $.ajax({
        url: '/admin/menus/get-category',
        method: 'GET',
        data: data,
        success: function success(scs) {
          $('.filter-result').html(scs);
          $('.selectpicker').selectpicker();
          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["chooseCategory"]();
        }
      });
    }

    if ($(this).val() == 4) {
      url = "list-articles";
      $.ajax({
        url: '/admin/menus/' + url,
        method: 'GET',
        success: function success(scs) {
          $('#table-show-record').remove();
          $('.filter-result').html(scs);
          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["chooseRecord"](url);
          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["buttonPaginationOnClick"](url);
          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["searchArticle"](url); //   $('input[name=link]').remove();
        }
      });
    }

    if ($(this).val() == 5 || $(this).val() == 6) {
      var _data = {
        type: "product"
      };
      $.ajax({
        url: '/admin/menus/get-category',
        method: 'GET',
        data: _data,
        success: function success(scs) {
          $('.filter-result').html(scs);
          $('.selectpicker').selectpicker();
          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["chooseCategory"]();
        }
      });
    }

    if ($(this).val() == 8) {
      url = "list-products";
      $.ajax({
        url: '/admin/menus/' + url,
        method: 'GET',
        success: function success(scs) {
          $('#table-show-record').remove();
          $('.filter-result').html(scs); // menus.chooseProduct(url);
          // menus.buttonProductPaginationOnClick(url);
          // menus.searchProduct(url);

          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["chooseRecord"](url);
          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["buttonPaginationOnClick"](url);
          _menus_core_js__WEBPACK_IMPORTED_MODULE_0__["searchArticle"](url);
        }
      });
    }

    if ($(this).val() == 3 || $(this).val() == 7) {
      $('.filter-result').empty();
    }
  });
  $('.btn-submit').on('click', function (e) {
    e.preventDefault();

    if (_menus_core_js__WEBPACK_IMPORTED_MODULE_0__["checkRequiredField"]($(this))) {
      $('#menu-form').submit();
    }
  });
});

/***/ }),

/***/ 19:
/*!**************************************************!*\
  !*** multi ./resources/js/admin/menus.create.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/e/Project/leotive-cms-v3/resources/js/admin/menus.create.js */"./resources/js/admin/menus.create.js");


/***/ })

/******/ });