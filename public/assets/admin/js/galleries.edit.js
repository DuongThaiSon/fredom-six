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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/galleries.edit.js":
/*!**********************************************!*\
  !*** ./resources/js/admin/galleries.edit.js ***!
  \**********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../core */ "./resources/js/core.js");
// filePond = require("../filepond");

$(document).ready(function () {
  // console.log('lleh');
  var galleryId = $('input[name=id]').val(); // filePond.initFilePond('gallery-images', `/admin/gallery/${galleryId}`);

  initBtnDestroyImage();
  $(".upload-variant-image").on("change.uploadVariantImage", function (e) {
    e.preventDefault();
    var formData = new FormData();
    formData.append("uploadImage", $(this)[0].files[0]);
    $.ajax({
      url: "/admin/galleries/".concat(galleryId, "/process"),
      data: formData,
      method: "POST",
      contentType: false,
      processData: false,
      success: function success(scs) {
        $(".image-showcase").html(scs);
        initBtnDestroyImage();
      }
    });
  });
  Object(_core__WEBPACK_IMPORTED_MODULE_0__["makeTableOrderable"])('/admin/galleries/sort-image');
});

function initBtnDestroyImage() {
  $(".btn-destroy-image").off("click.initBtnDestroyImage");
  $(".btn-destroy-image").on("click.initBtnDestroyImage", function (e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('data-href'),
      method: "POST",
      data: {
        _method: 'DELETE'
      },
      success: function success(scs) {
        $(".image-showcase").html(scs);
        initBtnDestroyImage();
      }
    });
  });
}

/***/ }),

/***/ "./resources/js/core.js":
/*!******************************!*\
  !*** ./resources/js/core.js ***!
  \******************************/
/*! exports provided: initCheckboxButton, deleteAnItem, deleteMultipleItems, makeTableOrderable, updateViewViewStatus */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "initCheckboxButton", function() { return initCheckboxButton; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "deleteAnItem", function() { return deleteAnItem; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "deleteMultipleItems", function() { return deleteMultipleItems; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "makeTableOrderable", function() { return makeTableOrderable; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "updateViewViewStatus", function() { return updateViewViewStatus; });

/**
 * Init behavior button
 */

function initCheckboxButton() {
  // Button check/uncheck all
  $("#btn-ck-all").off(".checkAll");
  $("#btn-ck-all").on("click.checkAll", renderButtonCheckAll); // Behavior check input

  $(".form-check-input").change(function () {
    // Change appear button check all
    changeAppearButtonCheckAll(); // If check a button and its category has sub
    // Let's check all its subs

    if ($(this).prop("checked") == true) {
      // Check its sub
      var checkBoxes = $(this).parents("table").parent().parent().find("ul .form-check-input");
      checkBoxes.prop("checked", true);
    } // If uncheck a button and all buttons at same level are uncheck
    // Let's uncheck its parent


    if ($(this).prop("checked") == false) {
      var checkLevel = $(this).attr("level-input");
      var parent = $(this).parent().closest("ul").parent().find(".form-check-input").first();

      var _checkBoxes = $(this).parent().closest("ul").find(".form-check-input[level-input=" + checkLevel + "]:checkbox:checked");

      if (_checkBoxes.length == 0) {
        parent.prop("checked", false);
      }
    }
  });
} // Change appear button check all

function changeAppearButtonCheckAll() {
  if ($("input.form-check-input:checkbox:checked").length == $("input.form-check-input:checkbox").length) {
    $("#btn-ck-all i").text("check_box");
  } else if ($("input.form-check-input:checkbox:checked").length > 0) {
    $("#btn-ck-all i").text("indeterminate_check_box");
  } else {
    $("#btn-ck-all i").text("check_box_outline_blank");
  }
}

function renderButtonCheckAll() {
  var checkBoxes = $(".form-check-input");
  checkBoxes.prop("checked", !checkBoxes.prop("checked"));

  if ($("input.form-check-input:checkbox:checked").length == $("input.form-check-input:checkbox").length) {
    $("#btn-ck-all i").text("check_box");
  } else if ($("input.form-check-input:checkbox:checked").length > 0) {
    $("#btn-ck-all i").text("indeterminate_check_box");
  } else {
    $("#btn-ck-all i").text("check_box_outline_blank");
  }
}
/**
 * Click remove an item
 *
 * @param delete_url string
 */


function deleteAnItem(delete_url) {
  var item_name = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "mục";
  $(".delete-category").click(function (e) {
    e.preventDefault();

    var _this = $(this);

    var delete_id = $(this).attr("data-id");
    Swal.fire({
      title: "Bạn chắc chứ?",
      text: "H\xE0nh \u0111\u1ED9ng s\u1EBD x\xF3a v\u0129nh vi\u1EC5n ".concat(item_name, " n\xE0y!"),
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn btn-danger",
      cancelButtonClass: "btn",
      confirmButtonText: "Đúng, xóa nó đi",
      cancelButtonText: "Thôi không xóa",
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        Swal.fire({
          onOpen: function onOpen() {
            Swal.showLoading();
          }
        });
        $.ajax({
          url: delete_url + "/" + delete_id,
          method: "POST",
          data: {
            _method: "DELETE"
          },
          success: function success() {
            _this.closest("li").remove();

            Swal.fire({
              title: "Thành công",
              text: "Bài viết đã được xóa.",
              type: "success",
              confirmButtonClass: "btn btn-success",
              buttonsStyling: false
            }).then(function () {
              location.reload();
            });
            changeAppearButtonCheckAll();
          },
          error: function error(err) {
            if (err.status === 403) {
              Swal.fire({
                title: "Không được phép!",
                type: "error",
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false,
                html: "\
                                        <p>Bạn không đủ quyền hạn để thực hiện hành động này.</p>\
                                        <hr>\
                                        <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
              })["catch"](swal.noop);
            } else {
              Swal.fire({
                title: "Lỗi",
                text: "H\xE3y \u0111\u1EA3m b\u1EA3o r\u1EB1ng kh\xF4ng c\xF2n b\xE0i vi\u1EBFt v\xE0 ".concat(item_name, " con n\xE0o thu\u1ED9c ").concat(item_name, " c\u1EA7n x\xF3a!"),
                type: "error",
                confirmButtonClass: "btn btn-danger",
                buttonsStyling: false
              })["catch"](swal.noop);
            }
          }
        });
      }
    })["catch"](swal.noop);
  });
}
/**
 * Click remove selected items
 *
 * @param delete_url string
 */

function deleteMultipleItems(delete_url) {
  var item_name = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "mục";
  $("#btn-del-all").click(function () {
    var countchecked = $("input.form-check-input:checkbox:checked").length;

    if (countchecked > 0) {
      Swal.fire({
        title: "Bạn chắc chứ?",
        text: "H\xE0nh \u0111\u1ED9ng s\u1EBD x\xF3a v\u0129nh vi\u1EC5n nh\u1EEFng ".concat(item_name, " \u0111\xE3 ch\u1ECDn!"),
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn btn-danger",
        cancelButtonClass: "btn",
        confirmButtonText: "Đúng, xóa hết đi",
        cancelButtonText: "Thôi không xóa",
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          var delete_id = "";
          $("input.form-check-input:checkbox:checked").each(function (index) {
            delete_id += $(this).attr("data-id") + ",";
          });
          delete_id = delete_id.slice(0, delete_id.length - 1);
          Swal.fire({
            onOpen: function onOpen() {
              Swal.showLoading();
            }
          });
          $.ajax({
            url: delete_url,
            method: "POST",
            data: {
              ids: delete_id,
              _method: "DELETE"
            },
            success: function success() {
              // for (
              //     ;
              //     $("input.form-check-input:checkbox:checked")
              //         .length > 0;
              // ) {
              //     let _this = $(
              //         "input.form-check-input:checkbox:checked"
              //     ).first();
              //     _this.closest("li").remove();
              // }
              Swal.fire({
                title: "Thành công",
                text: "\u0110\xE3 x\xF3a c\xE1c ".concat(item_name, " \u0111\u01B0\u1EE3c ch\u1ECDn."),
                type: "success",
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
              }).then(function () {
                location.reload();
              });
              changeAppearButtonCheckAll();
            },
            error: function error(err) {
              if (err.status === 403) {
                Swal.fire({
                  title: "Không được phép!",
                  type: "error",
                  confirmButtonClass: "btn btn-danger",
                  buttonsStyling: false,
                  html: "\
                                    <p>Bạn không đủ quyền hạn để thực hiện hành động này.</p>\
                                    <hr>\
                                    <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
                })["catch"](swal.noop);
              } else {
                Swal.fire({
                  title: "Lỗi",
                  text: "H\xE3y \u0111\u1EA3m b\u1EA3o r\u1EB1ng kh\xF4ng c\xF2n b\xE0i vi\u1EBFt v\xE0 ".concat(item_name, " con n\xE0o thu\u1ED9c ").concat(item_name, " c\u1EA7n x\xF3a!"),
                  type: "error",
                  confirmButtonClass: "btn btn-danger",
                  buttonsStyling: false
                })["catch"](swal.noop);
              }
            }
          });
        }
      })["catch"](swal.noop);
    } else {
      Swal.fire({
        title: "Err...",
        text: "Ch\u01B0a ch\u1ECDn ".concat(item_name, " n\xE0o c\u1EA3."),
        buttonsStyling: false,
        confirmButtonClass: "btn btn-info"
      })["catch"](swal.noop);
    }
  });
}
function makeTableOrderable(order_url) {
  $(".sort").sortable({
    handle: ".connect",
    placeholder: "ui-state-highlight",
    forcePlaceholderSize: true,
    update: function update(event, ui) {
      var sort = $(this).sortable("toArray");
      $.ajax({
        url: order_url,
        method: "POST",
        data: {
          sort: sort
        },
        error: function error(err) {
          if (err.status === 403) {
            Swal.fire({
              title: "Lỗi!",
              type: "error",
              confirmButtonClass: "btn btn-danger",
              buttonsStyling: false,
              html: "\
                                <p>Bạn không đủ quyền hạn để thực hiện hành động này. Mọi thay đổi sẽ không được lưu lại.</p>\
                                <hr>\
                                <small><a href>Liên hệ với quản trị viên</a> nếu bạn cho rằng đây là một sự nhầm lẫn</small>"
            })["catch"](swal.noop);
          }
        }
      });
    }
  });
}
function updateViewViewStatus(updateUrl) {
  $(".btn-update-view-status").off(".updateViewStatus");
  $(".btn-update-view-status").on("click.updateViewStatus", _.throttle(function () {
    var context = $(this);
    var data = {
      value: context.attr('data-value'),
      id: context.attr('data-id'),
      field: context.attr('data-field')
    }; // console.log(data);

    $.ajax({
      url: updateUrl,
      method: "POST",
      data: data,
      success: function success(scs) {
        console.log(scs.value);

        if (scs.value) {
          console.log('in');
          context.attr('title', "Click để tắt");
          context.attr('data-value', scs.value);
          context.find(".material-icons").addClass("text-primary").text("check_circle_outline");
        } else {
          console.log('out');
          context.attr('title', "Click để bật");
          context.attr('data-value', 0);
          context.find(".material-icons").removeClass("text-primary").text("highlight_off");
        }

        return;
      },
      error: function error(err) {}
    });
  }, 500));
}

/***/ }),

/***/ 1:
/*!****************************************************!*\
  !*** multi ./resources/js/admin/galleries.edit.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\CMS\leotive-cms-v3\resources\js\admin\galleries.edit.js */"./resources/js/admin/galleries.edit.js");


/***/ })

/******/ });