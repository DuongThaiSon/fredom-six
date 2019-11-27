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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/admin.core.js":
/*!******************************************!*\
  !*** ./resources/js/admin/admin.core.js ***!
  \******************************************/
/*! exports provided: productAttributeCore, productCore, productCategoriesCore */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "productAttributeCore", function() { return productAttributeCore; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "productCore", function() { return productCore; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "productCategoriesCore", function() { return productCategoriesCore; });
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
    key: "applyAttributeType",
    value: function applyAttributeType() {
      $("input[name=type]").on("change.applyAttributeType", function () {
        var type = $("input[name=type]:checked").val();
        $(".selection-item-value").attr('type', type);
      });
    }
  }, {
    key: "submitData",
    value: function submitData() {
      var _this = this;

      $(".btn-submit-data").on("click.submitData", function (e) {
        e.preventDefault();

        if (!_this.canPassValidateData()) {
          return;
        }

        $('.form-main').submit();
      });
    }
  }, {
    key: "canPassValidateData",
    value: function canPassValidateData() {
      var validated = true;

      if (_.trim($("input[name=name]").val()).length < 1) {
        validated = false;
      }

      if ($("input[name=can_select]").attr("checked")) {
        $(".selection-item-value").each(function () {
          if (_.trim($(this).val()) < 1) {
            validated = false;
          }
        });
      }

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
      var type = $("input[name=type]:checked").val();
      var element = this.generateSelectionItem(type);
      $(".selection-list").append(element);
      this.removeSelectionItem();
    }
  }, {
    key: "generateSelectionItem",
    value: function generateSelectionItem() {
      var type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : "text";
      var id = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "";
      var value = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "";
      var index = Date.now();
      return "\n        <div class=\"row form-group selection-item\">\n            <div class=\"col-5\">\n                <input type=\"hidden\" name=\"attribute_values[".concat(index, "][id]\" value=\"").concat(id, "\" class=\"selection-item-id\"/>\n                <input type=\"").concat(type, "\" name=\"attribute_values[").concat(index, "][value]\" value=\"").concat(value, "\" class=\"selection-item-value\"/>\n            </div>\n            <div class=\"col-5\">\n                <input type=\"text\" name=\"attribute_values[").concat(index, "][note]\" value=\"\" class=\"form-control\" placeholder=\"Ch\xFA th\xEDch th\xEAm\"/>\n            </div>\n            <div class=\"col-1\">\n                <a href=\"#\" class=\"text-decoration-none btn-remove-selection-item\">\n                    <i class=\"material-icons\">delete</i>\n                </a>\n            </div>\n        </div>\n        ");
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
var productCore =
/*#__PURE__*/
function () {
  function productCore() {
    var productId = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

    _classCallCheck(this, productCore);

    this.productId = productId;
    this.productVariantPagination();
  }

  _createClass(productCore, [{
    key: "collectSelectedAttributeId",
    value: function collectSelectedAttributeId() {
      var _this = this;

      $('.attribute-selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
        var result = '';
        var selected = $(this).find('option:selected');
        selected.each(function (index, element) {
          result += $(element).text();

          if (index < selected.length - 1) {
            result += ', ';
          }
        });
        $(".selected-value").text(result);

        _this.setVariantButtonStatus();
      });
    }
  }, {
    key: "makeVariation",
    value: function makeVariation() {
      $('.btn-make-variation').on("click.btnMakeVariation", function (e) {
        e.preventDefault();
        var makeVariationUrl = $(this).attr("data-href");
        var makeVariationData = $(".attribute-selectpicker").val();
        $.ajax({
          url: makeVariationUrl,
          method: "POST",
          data: {
            attributes: makeVariationData
          },
          success: function success(resolve) {
            $(".product-variants-list").html(resolve);
          }
        });
      });
    }
  }, {
    key: "renderSelectedAttribute",
    value: function renderSelectedAttribute(checkedIds) {
      $.ajax({
        url: '/admin/products/fetch-option',
        method: "POST",
        data: {
          checked_ids: checkedIds
        },
        success: function success(scs) {
          $(".product-attribute-option").html(scs);
          $(".attribute-selectpicker").selectpicker();
          $("#selectProductAttributeModal").modal("hide");
        }
      });
    }
  }, {
    key: "submitData",
    value: function submitData() {
      var _this = this;

      $(".btn-submit-data").on("click.submitData", function (e) {
        e.preventDefault();
        $("input[name=price]").val(accounting.unformat($(".price-input").val()));
        $('.form-main').submit();
      });
    }
  }, {
    key: "selectCategory",
    value: function selectCategory() {
      var _this = this;

      $('.category-selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
        _this.renderAttributeOptions($(this).val());
      });
    }
  }, {
    key: "renderAttributeOptions",
    value: function renderAttributeOptions(categoryId) {
      var url = '/admin/products/fetch-attribute-option';
      $.ajax({
        url: url,
        method: 'POST',
        data: {
          category_id: categoryId
        },
        success: function success(scs) {
          $("#selectProductAttributeModal").find(".modal-body").html(scs);
        }
      });
    }
  }, {
    key: "setVariantButtonStatus",
    value: function setVariantButtonStatus() {
      var attributeSelectedCount = $('.attribute-selectpicker').val().length;

      if (attributeSelectedCount) {
        $(".btn-make-variation").attr("disabled", false);
      } else {
        $(".btn-make-variation").attr("disabled", true);
      }
    }
  }, {
    key: "productVariantPagination",
    value: function productVariantPagination() {
      var _this = this;

      $(".variant-pagination").find("a.page-link").off("click.productVariantPagination");
      $(".variant-pagination").find("a.page-link").on("click.productVariantPagination", function (e) {
        e.preventDefault();
        var pagingUrl = $(this).attr("href");
        $.ajax({
          url: pagingUrl,
          success: function success(resolve) {
            $(".product-variants-list").html(resolve);

            _this.productVariantPagination();
          }
        });
      });
    }
  }]);

  return productCore;
}();
var productCategoriesCore =
/*#__PURE__*/
function () {
  function productCategoriesCore() {
    _classCallCheck(this, productCategoriesCore);
  }

  _createClass(productCategoriesCore, [{
    key: "collectSelectedAttribute",
    value: function collectSelectedAttribute() {
      var _this = this;

      $(".btn-submit-select-product-attribute").on("click.collectSelectedAttributeId", function (e) {
        e.preventDefault();
        var checked = [];
        $(".select-attribute-input:checked").each(function () {
          checked.push({
            id: $(this).val(),
            value: $(this).attr('data-name')
          });
        });

        _this.renderSelectedAttribute(checked);

        return;
      });
    }
  }, {
    key: "renderSelectedAttribute",
    value: function renderSelectedAttribute(checkedIds) {
      var template = "";

      _.forEach(checkedIds, function (item) {
        template += "\n            <div class=\"form-group\">\n                <input type=\"hidden\" name=\"product_attributes[]\" class=\"form-control\" value=\"".concat(item.id, "\" readonly />\n                <input type=\"text\" name=\"\" class=\"form-control\" value=\"").concat(item.value, "\" readonly />\n            </div>\n            ");
      });

      $(".product-attribute-option").html(template);
      $("#selectProductAttributeModal").modal("hide");
    }
  }]);

  return productCategoriesCore;
}();

/***/ }),

/***/ "./resources/js/admin/productCats.edit.js":
/*!************************************************!*\
  !*** ./resources/js/admin/productCats.edit.js ***!
  \************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _admin_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./admin.core */ "./resources/js/admin/admin.core.js");

$(document).ready(function () {
  var guide = new _admin_core__WEBPACK_IMPORTED_MODULE_0__["productCategoriesCore"]();
  guide.collectSelectedAttribute();
});

/***/ }),

/***/ 3:
/*!******************************************************!*\
  !*** multi ./resources/js/admin/productCats.edit.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/d/projects/CMS/Leotive-CMS-v3/resources/js/admin/productCats.edit.js */"./resources/js/admin/productCats.edit.js");


/***/ })

/******/ });