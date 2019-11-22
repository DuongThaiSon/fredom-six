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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/backups.index.js":
/*!*********************************************!*\
  !*** ./resources/js/admin/backups.index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  btnCreateBackup();
  btnDeleteBackup();
});

var btnCreateBackup = function btnCreateBackup() {
  $(".btn-create-backup").on("click.btnCreateBackup", function (e) {
    e.preventDefault();
    var createBackupUrl = $(this).attr("href");
    var backupOptions = {
      only_db: "Chỉ cơ sở dữ liệu",
      only_files: "Chỉ tệp tin hệ thống",
      both: "Cả hai"
    };
    Swal.mixin({
      confirmButtonText: "Next &rarr;",
      showCancelButton: true,
      progressSteps: ["1", "2"]
    }).queue([{
      title: "Select color",
      input: "radio",
      inputOptions: backupOptions,
      inputValidator: function inputValidator(value) {
        if (!value) {
          return "Cần phải chọn 1 loại!";
        }
      }
    }, {
      title: "Thông báo",
      input: "checkbox",
      inputPlaceholder: "Nhận thông báo về việc sao lưu lần này vào hòm thư hệ thống",
      inputValue: 1
    }]).then(function (result) {
      if (result.value) {
        var answers = JSON.stringify(result.value);
        Swal.fire({
          title: "Đang tạo sao lưu cho thời điểm hiện tại!",
          text: "Xin chờ...",
          onBeforeOpen: function onBeforeOpen() {
            return Swal.showLoading();
          },
          allowOutsideClick: false
        });
        $.ajax({
          url: createBackupUrl,
          data: {
            options: answers
          },
          method: "POST",
          success: function success(scs) {
            Swal.fire("Thành công!", "Đã tạo sao lưu cho thời điểm hiện tại", "success").then(function () {
              $("#table-list-backup").html(scs);
              btnDeleteBackup();
            });
          }
        });
      }
    });
  });
};

var btnDeleteBackup = function btnDeleteBackup() {
  $(".btn-delete-backup").off("click.btnDeleteBackup");
  $(".btn-delete-backup").on("click.btnDeleteBackup", function (e) {
    e.preventDefault();
    var deleteBackupUrl = $(this).attr("href");
    Swal.fire({
      title: "Xóa tệp sao lưu này?",
      text: "Bạn sẽ không thể lấy lại tệp đã xóa!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "",
      confirmButtonText: "Đúng, xóa nó đi!",
      cancelButtonText: "Hủy",
      showLoaderOnConfirm: true,
      preConfirm: function preConfirm() {
        return $.ajax({
          url: deleteBackupUrl,
          method: "POST",
          data: {
            _method: "DELETE"
          },
          success: function success(response) {
            return response;
          },
          error: function error(_error) {
            Swal.showValidationMessage("Request failed: ".concat(_error));
          }
        });
      },
      allowOutsideClick: function allowOutsideClick() {
        return !Swal.isLoading();
      }
    }).then(function (result) {
      if (result.value) {
        $("#table-list-backup").html(result.value);
      }
    });
  });
};

/***/ }),

/***/ 4:
/*!***************************************************!*\
  !*** multi ./resources/js/admin/backups.index.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\leotive-cms-v3\resources\js\admin\backups.index.js */"./resources/js/admin/backups.index.js");


/***/ })

/******/ });