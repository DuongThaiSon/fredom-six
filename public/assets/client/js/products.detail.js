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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/client/products.detail.js":
/*!************************************************!*\
  !*** ./resources/js/client/products.detail.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  rateStar();
  postComment();
  productStarRate();
  loadComment();
  fixReview();
  likeMePls();
  chooseColor();
  $('.write-review').click(function (e) {
    $('#review-tab').tab("show");
  });
  $('.thumbnail-products').on('click', function (e) {
    e.preventDefault();
    var a = $(this).data('src');
    $('.product-main-image').attr('src', '/' + a);
    $('.gallery_img').attr('href', '/' + a);
  });
});

var rateStar = function rateStar() {
  var stars = $('#rating .rate-product'),
      radios = $(':radio[name="rating"]');
  stars.hover(function () {
    var $this = $(this);
    $this.prevAll().addBack().addClass('hoverStars');
  }, function () {
    var $this = $(this);
    $this.prevAll().addBack().removeClass('hoverStars');
  });
  stars.on('click', function () {
    var $this = $(this);
    $this.siblings().removeClass('clickStars');
    $this.prevAll().addBack().addClass('clickStars');
  });
};

var postComment = function postComment() {
  $(".btn-comment").off();
  $('.btn-comment').on('click', function (e) {
    e.preventDefault();

    if ($('.comment-zone').val() == "") {
      alert('Bạn chưa nhập nội dung!');
      $('.comment-zone').focus();
    } else if ($('input[name=rating]').val() == "") {
      alert('Bạn chưa đánh giá sản phẩm!');
    } else if ($('input[name=current-user]').val() == "") {
      alert('Có lỗi xảy ra!');
    } else {
      var data = {
        comment: $('.comment-zone').val(),
        rating: $('input[name=rating]').val(),
        currentUser: $('input[name=current-user]').val()
      };
      var id = $('.btn-buy-now').data('id');
      $.ajax({
        url: "/products/".concat(id, "/reviews"),
        method: "POST",
        data: data,
        success: function success(scs) {
          // $('input[name=rating]').val("");
          // $('.comment-zone').val("");
          // $('.ratingStars').removeClass('clickStars');
          // $('.product-comment').remove();
          alert('Cảm ơn bạn đã đánh giá sản phẩm!');
          $('.btn-comment').addClass('d-none');
          $('.btn-fix-review').removeClass('d-none');
          loadComment();
        }
      });
    }
  });
};

var productStarRate = function productStarRate() {
  $('.rate-product').on('click', function (e) {
    e.preventDefault();
    $('input[name=rating]').val($(this).data('star'));
  });
};

var loadComment = function loadComment() {
  var id = $('.btn-buy-now').data('id');
  $.ajax({
    url: "/products/".concat(id, "/reviews"),
    method: "GET",
    success: function success(scs) {
      $('.list-comments').html(scs);
      buttonPaginationOnClick();
    }
  });
};

var buttonPaginationOnClick = function buttonPaginationOnClick() {
  $('.pagination a').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      method: 'GET',
      success: function success(scs) {
        $('.product-comment').remove();
        $('.list-comments').html(scs);
        buttonPaginationOnClick();
      }
    });
  });
};

var fixReview = function fixReview() {
  $('.btn-fix-review').on('click', function (e) {
    e.preventDefault();

    if ($('.comment-zone').val() == "") {
      alert('Bạn chưa nhập nội dung!');
      $('.comment-zone').focus();
    } else if ($('input[name=rating]').val() == "") {
      alert('Bạn chưa đánh giá sản phẩm!');
    } else if ($('input[name=current-user]').val() == "") {
      alert('Có lỗi xảy ra!');
    } else {
      var data = {
        content: $('.comment-zone').val(),
        rate: $('input[name=rating]').val(),
        _method: "PUT"
      };
      var id = $('.btn-buy-now').data('id');
      var user_id = $('input[name=current-user]').val();
      $.ajax({
        url: "/products/".concat(id, "/reviews/").concat(user_id),
        method: "POST",
        data: data,
        success: function success(scs) {
          // $('input[name=rating]').val("");
          // $('.comment-zone').val("");
          // $('.ratingStars').removeClass('clickStars');
          // $('.product-comment').remove();
          $('.btn-fix-review').attr('disabled', 'disabled');
          alert('Bạn đã sửa đánh giá thành công!');
          loadComment();
        }
      });
    }
  });
};

var likeMePls = function likeMePls() {
  $('.like-button').on('click', function (e) {
    e.preventDefault();
    var data = {
      product_id: $('input[name=product_id]').val(),
      user_id: $('input[name=user_id]').val()
    };
    console.log(data);
    $.ajax({
      url: $('.like-button').data('href'),
      method: 'POST',
      data: data,
      success: function success(scs) {
        alert('Cảm ơn bạn đã thích sản phẩm của chúng tôi!');
        $('.like-button').addClass('is-like');
        $(".like-button").attr('disabled', 'disabled');
      }
    });
  });
};

var chooseColor = function chooseColor() {
  $('.choose-color').on('click', function (e) {
    e.preventDefault();
    $('.choose-color').each(function (e) {
      if ($(this).hasClass('click-choose-color')) {
        $(this).removeClass('click-choose-color');
      }
    });
    $(this).addClass('click-choose-color');
    $('input[name=color]').val($(this).data('color'));
  });
};

/***/ }),

/***/ 5:
/*!******************************************************!*\
  !*** multi ./resources/js/client/products.detail.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projects\leotive-cms-v3\resources\js\client\products.detail.js */"./resources/js/client/products.detail.js");


/***/ })

/******/ });