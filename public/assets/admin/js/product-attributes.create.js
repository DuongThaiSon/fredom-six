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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/admin.core.js":
/*!******************************************!*\
  !*** ./resources/js/admin/admin.core.js ***!
  \******************************************/
/*! exports provided: productAttributeCore */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "productAttributeCore", function() { return productAttributeCore; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var productAttributeCore =
/*#__PURE__*/
function () {
  function productAttributeCore() {
    _classCallCheck(this, productAttributeCore);
  }

  _createClass(productAttributeCore, [{
    key: "submitData",
    value: function submitData() {
      $(".btn-submit-data").on("click.submitData", function (e) {
        e.preventDefault();

        if (!this.canPassValidateData()) {
          return;
        }

        var attributeData = this.collectAttributeData();
        $.ajax({
          url: "/admin/product-attributes",
          method: "POST",
          data: {
            name: $("input[name=name]").val(),
            attribute_values: attributeData,
            can_select: $("input[name=can_select]").attr("checked"),
            allow_multiple: $("input[name=allow_multiple]").attr("checked")
          }
        });
      });
    }
  }, {
    key: "canPassValidateData",
    value: function canPassValidateData() {
      var validated = true;

      if (_.trim($("input[name=name]").val()).length < 1) {
        validated = false;
      }

      $(".selection-item-value").each(function () {
        if (_.trim($(this).val()) < 1) {
          validated = false;
        }
      });
      return validated;
    }
  }, {
    key: "conditionToggleSelectZone",
    value: function conditionToggleSelectZone() {
      var checkAttr = $("input[name=can_select]");

      if (checkAttr.attr("checked")) {
        $(".select-zone").removeClass("d-none");
      } else {
        $(".select-zone").addClass("d-none");
      }
    }
  }, {
    key: "addSelectionItem",
    value: function addSelectionItem() {
      var element = this.generateSelectionItem();
      $(".selection-list").append(element);
      this.removeSelectionItem();
    }
  }, {
    key: "generateSelectionItem",
    value: function generateSelectionItem() {
      var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "";
      var value = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
      return "\n        <div class=\"row form-group selection-item\">\n            <div class=\"col-10 input-group\">\n                <input type=\"hidden\" name=\"id[]\" value=\"".concat(id, "\" class=\"form-control selection-item-id\"/>\n                <input type=\"text\" name=\"value[]\" value=\"").concat(value, "\" class=\"form-control selection-item-value\"/>\n                <div class=\"input-group-prepend\">\n                    <a href=\"#\" class=\"text-decoration-none btn-remove-selection-item\">\n                        <div class=\"input-group-text bg-white\">\n                            <i class=\"material-icons\">delete</i>\n                        </div>\n                    </a>\n                </div>\n            </div>\n        </div>\n        ");
    }
  }, {
    key: "removeSelectionItem",
    value: function removeSelectionItem() {
      $(".btn-remove-selection-item").off(".removeSelectionItem");
      $(".btn-remove-selection-item").on("click.removeSelectionItem", function (e) {
        e.preventDefault();
        var items = $(".selection-item").length;

        if (items < 2) {
          return;
        }

        $(this).parents(".selection-item").remove();
      });
    }
  }, {
    key: "collectAttributeData",
    value: function collectAttributeData() {
      var data = [];
      $(".selection-item").each(function () {
        var rowData = {};
        rowData.value = $(this).find(".selection-item-value").val();
        rowData.id = $(this).find(".selection-item-id").val();
        data.push(rowData);
      });
      return data;
    }
  }]);

  return productAttributeCore;
}();

/***/ }),

/***/ "./resources/js/admin/product-attributes.create.js":
/*!*********************************************************!*\
  !*** ./resources/js/admin/product-attributes.create.js ***!
  \*********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _admin_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./admin.core */ "./resources/js/admin/admin.core.js");

$(document).ready(function () {
  var guide = new _admin_core__WEBPACK_IMPORTED_MODULE_0__["productAttributeCore"]();
  guide.conditionToggleSelectZone();
  guide.addSelectionItem();
  $("input[name=can_select]").on("change.conditionToggleSelectZone", function () {
    guide.conditionToggleSelectZone();
  });
  $(".btn-add-selection-item").on("click.addSelectionItem", function (e) {
    e.preventDefault();
    guide.addSelectionItem();
  });
  guide.submitData();
});

/***/ }),

/***/ 2:
/*!***************************************************************!*\
  !*** multi ./resources/js/admin/product-attributes.create.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/d/Projects/CMS/Leotive-CMS-v3/resources/js/admin/product-attributes.create.js */"./resources/js/admin/product-attributes.create.js");


/***/ })

/******/ });