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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/menus.edit.js":
/*!******************************************!*\
  !*** ./resources/js/admin/menus.edit.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $("select[name=type]").on('change', function (e) {
    e.preventDefault();
    var url = "";

    if ($(this).val() == 4) {
      url = "list-articles"; // ajaxCall(url, 'get-article', 'articles');

      $.ajax({
        url: '/admin/menus/' + url,
        method: 'GET',
        success: function success(scs) {
          $('#table-show-record').remove();
          $('.filter-result').html(scs);
          chooseRecord(url, 'get-article', 'articles');
          buttonPaginationOnClick(url, 'get-article', 'articles');
          searchArticle(url, 'get-article', 'articles'); //   $('input[name=link]').remove();
        }
      });
    }

    if ($(this).val() == 8) {
      url = "list-products"; // ajaxCall(url, 'get-product', 'products');

      $.ajax({
        url: '/admin/menus/' + url,
        method: 'GET',
        success: function success(scs) {
          $('#table-show-record').remove();
          $('.filter-result').html(scs);
          chooseRecordProduct(url, 'get-product', 'products');
          buttonPaginationOnClick(url, 'get-product', 'products');
          searchProduct(url, 'get-product', 'products'); //   $('input[name=link]').remove();
        }
      });
    }

    if ($(this).val() == 5) {
      url = "list-category-product"; // ajaxCall(url, 'get-product', 'products');

      $.ajax({
        url: '/admin/menus/' + url,
        method: 'GET',
        success: function success(scs) {
          // $('#table-show-record').remove();
          $('.filter-result').html(scs);
          chooseRecordCategoryProduct(url, 'get-category-product', 'category-product'); // buttonPaginationOnClick(url, 'get-product', 'products');
          // searchProduct(url, 'get-product', 'products'); //   $('input[name=link]').remove();
        }
      });
    }

    if ($(this).val() == 1) {
      url = "list-category-article"; // ajaxCall(url, 'get-product', 'products');

      $.ajax({
        url: '/admin/menus/' + url,
        method: 'GET',
        success: function success(scs) {
          // $('#table-show-record').remove();
          $('.filter-result').html(scs);
          chooseRecordCategoryProduct(url, 'get-category-article', 'category-article'); // buttonPaginationOnClick(url, 'get-product', 'products');
          // searchProduct(url, 'get-product', 'products'); //   $('input[name=link]').remove();
        }
      });
    }
  });
}); //   let ajaxCall = function(url, getUrl, type) {
//     $.ajax({
//         url: '/admin/menus/'+url,
//         method: 'GET',
//         success: function(scs){
//             $('#table-show-record').remove();
//             $('.filter-result').html(scs);
//             chooseRecord(url, getUrl, type);
//             buttonPaginationOnClick(url, getUrl, type);
//             searchArticle(url, getUrl, type);
//         //   $('input[name=link]').remove();
//         }
//       });
//    };

var chooseRecord = function chooseRecord(url, getUrl, type) {
  $('.choose-record').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var slug = $(this).attr('data-slug');
    $('input[name=link]').val(slug);
    $.ajax({
      url: '/admin/menus/' + getUrl + '/' + id,
      method: 'get',
      success: function success(scs) {
        resData = scs.results;
        $('#table').remove();
        var html = "<div class=\"table-responsive bg-white mt-4\" id=\"table\"><table id=\"table-show-record\" class=\"table-sm table-hover table mb-2\" width=\"100%\">";
        html += "<thead><tr class=\"text-muted\"><th>ID</th><th>T\xCAN B\xC0I VI\u1EBET</th><th>T\xCAN M\u1EE4C</th></tr></thead>";
        html += " <tbody><tr><td>" + resData.id + "</td>\n                            <td><a target=\"_blank\" href=\"/admin/" + type + "/" + resData.id + "/edit\">" + resData.name + "</a></td>\n                            <th>" + resData.category['name'] + "</th></tr></tbody></table>\n                            <button class=\"btn btn-sm btn-info button-choose-other\">Ch\u1ECDn b\xE0i vi\u1EBFt kh\xE1c</button></div>";
        $('.filter-result').append(html);
        chooseOther(url, getUrl, type);
        buttonPaginationOnClick(url, getUrl, type);
      },
      error: function error(e) {}
    });
  });
};

var chooseOther = function chooseOther(url, getUrl, type) {
  $('.button-choose-other').click(function (e) {
    e.preventDefault();
    $('input[name=link]').val("");
    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseRecord(url, getUrl, type);
        buttonPaginationOnClick(url, getUrl, type);
      }
    });
  });
};

var buttonPaginationOnClick = function buttonPaginationOnClick(url, getUrl, type) {
  $('.pagination a').on('click', function (e) {
    e.preventDefault();

    var _url = $(this).attr('href');

    $.ajax({
      url: _url,
      method: 'GET',
      success: function success(scs) {
        $('.filter-result').html(scs);
        chooseRecord(url, getUrl, type);
        buttonPaginationOnClick(url, getUrl, type);
      }
    });
  });
};

var searchArticle = function searchArticle(url, getUrl, type) {
  $('.search-input').on('keyup', _.debounce(function (e) {
    e.preventDefault();
    var keyword = $(this).val();
    $.ajax({
      url: '/admin/menus/search-articles',
      method: 'GET',
      data: {
        keyword: keyword
      },
      success: function success(scs) {
        $('.article-item').remove();

        _.forEach(scs.articles, function (value) {
          var element = rowHTML(value.id, value.name, value.category['name'], value.slug);
          $('.article-table-body').append(element);
        });

        chooseRecord(url, getUrl, type);
      }
    });
  }, 500));
};

var rowHTML = function rowHTML() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var name = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var category_name = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var slug = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
  return "\n        <tr class=\"article-item\">\n            <td>".concat(id, "</td>\n            <td class=\"choose-record\" data-id=\"").concat(id, "\">").concat(name, "</td>\n            <th>").concat(category_name, "</th>\n            <td>\n                <div class=\"btn-group\">\n                    <a class=\"btn-sm btn-success choose-record\" href=\"#\" data-id=\"").concat(id, "\"\n                        class=\"btn btn-sm p-1\" data-toggle=\"tooltip\" title=\"Ch\u1ECDn\" data-slug=\"").concat(slug, "\"\n                        data-type=\"article\">\n                        <i class=\"material-icons\">radio_button_checked</i><span style=\"padding-left:5px\">Ch\u1ECDn</span>\n                    </a>\n                </div>\n            </td>\n        </tr>\n        ");
};

var chooseRecordProduct = function chooseRecordProduct(url, getUrl, type) {
  $('.choose-record').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var slug = $(this).attr('data-slug');
    $('input[name=link]').val(slug);
    $.ajax({
      url: '/admin/menus/' + getUrl + '/' + id,
      method: 'get',
      success: function success(scs) {
        resData = scs.results;
        $('#table').remove();
        var html = "<div class=\"table-responsive bg-white mt-4\" id=\"table\"><table id=\"table-show-record\" class=\"table-sm table-hover table mb-2\" width=\"100%\">";
        html += "<thead><tr class=\"text-muted\"><th>ID</th><th>T\xCAN B\xC0I VI\u1EBET</th><th>T\xCAN M\u1EE4C</th></tr></thead>";
        html += " <tbody><tr><td>" + resData.id + "</td>\n                            <td><a target=\"_blank\" href=\"/admin/" + type + "/" + resData.id + "/edit\">" + resData.name + "</a></td>\n                            <th>" + resData.categories[0]['name'] + "</th></tr></tbody></table>\n                            <button class=\"btn btn-sm btn-info button-choose-other\">Ch\u1ECDn b\xE0i vi\u1EBFt kh\xE1c</button></div>";
        $('.filter-result').append(html);
        chooseOtherProduct(url, getUrl, type);
        buttonPaginationOnClickProduct(url, getUrl, type);
      },
      error: function error(e) {}
    });
  });
};

var chooseOtherProduct = function chooseOtherProduct(url, getUrl, type) {
  $('.button-choose-other').click(function (e) {
    e.preventDefault();
    $('input[name=link]').val("");
    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseRecordProduct(url, getUrl, type);
        buttonPaginationOnClickProduct(url, getUrl, type);
      }
    });
  });
};

var buttonPaginationOnClickProduct = function buttonPaginationOnClickProduct(url, getUrl, type) {
  $('.pagination a').on('click', function (e) {
    e.preventDefault();

    var _url = $(this).attr('href');

    $.ajax({
      url: _url,
      method: 'GET',
      success: function success(scs) {
        $('.filter-result').html(scs);
        chooseRecordProduct(url, getUrl, type);
        buttonPaginationOnClickProduct(url, getUrl, type);
      }
    });
  });
};

var searchProduct = function searchProduct(url, getUrl, type) {
  $('.search-input').on('keyup', _.debounce(function (e) {
    e.preventDefault();
    var keyword = $(this).val();
    $.ajax({
      url: '/admin/menus/search-products',
      method: 'GET',
      data: {
        keyword: keyword
      },
      success: function success(scs) {
        $('.product-item').remove();

        _.forEach(scs.products, function (value) {
          var element = rowHTML(value.id, value.name, value.categories[0]['name'], value.slug);
          $('.product-table-body').append(element);
        });

        chooseRecordProduct(url, getUrl, type);
      }
    });
  }, 500));
};

var rowHTMLProduct = function rowHTMLProduct() {
  var id = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
  var name = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  var category_name = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
  var slug = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
  return "\n        <tr class=\"article-item\">\n            <td>".concat(id, "</td>\n            <td class=\"choose-record\" data-id=\"").concat(id, "\">").concat(name, "</td>\n            <th>").concat(category_name, "</th>\n            <td>\n                <div class=\"btn-group\">\n                    <a class=\"btn-sm btn-success choose-record\" href=\"#\" data-id=\"").concat(id, "\"\n                        class=\"btn btn-sm p-1\" data-toggle=\"tooltip\" title=\"Ch\u1ECDn\" data-slug=\"").concat(slug, "\"\n                        data-type=\"article\">\n                        <i class=\"material-icons\">radio_button_checked</i><span style=\"padding-left:5px\">Ch\u1ECDn</span>\n                    </a>\n                </div>\n            </td>\n        </tr>\n        ");
};

var chooseRecordCategoryProduct = function chooseRecordCategoryProduct(url, getUrl, type) {
  $('.choose-record').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var slug = $(this).attr('data-slug');
    $('input[name=link]').val(slug);
    $.ajax({
      url: '/admin/menus/' + getUrl + '/' + id,
      method: 'get',
      success: function success(scs) {
        resData = scs.results;
        $('#table').remove();
        var html = "<div class=\"table-responsive bg-white mt-4\" id=\"table\"><table id=\"table-show-record\" class=\"table-sm table-hover table mb-2\" width=\"100%\">";
        html += "<thead><tr class=\"text-muted\"><th>ID</th><th>T\xCAN B\xC0I VI\u1EBET</th><th>T\xCAN M\u1EE4C</th></tr></thead>";
        html += " <tbody><tr><td>" + resData.id + "</td>\n                            <td><a target=\"_blank\" href=\"/admin/" + type + "/" + resData.id + "/edit\">" + resData.name + "</a></td>\n                            </tr></tbody></table>\n                            <button class=\"btn btn-sm btn-info button-choose-other\">Ch\u1ECDn b\xE0i vi\u1EBFt kh\xE1c</button></div>";
        $('.filter-result').append(html);
        chooseOtherProductCategory(url, getUrl, type); // buttonPaginationOnClickProduct(url, getUrl, type);
      }
    });
  });
};

var chooseOtherProductCategory = function chooseOtherProductCategory(url, getUrl, type) {
  $('.button-choose-other').click(function (e) {
    e.preventDefault();
    $('input[name=link]').val("");
    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseRecordCategoryProduct(url, getUrl, type); // buttonPaginationOnClickProduct(url, getUrl, type);
      }
    });
  });
};

var chooseRecordCategoryArticle = function chooseRecordCategoryArticle(url, getUrl, type) {
  $('.choose-record').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var slug = $(this).attr('data-slug');
    $('input[name=link]').val(slug);
    $.ajax({
      url: '/admin/menus/' + getUrl + '/' + id,
      method: 'get',
      success: function success(scs) {
        resData = scs.results;
        $('#table').remove();
        var html = "<div class=\"table-responsive bg-white mt-4\" id=\"table\"><table id=\"table-show-record\" class=\"table-sm table-hover table mb-2\" width=\"100%\">";
        html += "<thead><tr class=\"text-muted\"><th>ID</th><th>T\xCAN B\xC0I VI\u1EBET</th><th>T\xCAN M\u1EE4C</th></tr></thead>";
        html += " <tbody><tr><td>" + resData.id + "</td>\n                            <td><a target=\"_blank\" href=\"/admin/" + type + "/" + resData.id + "/edit\">" + resData.name + "</a></td>\n                            </tr></tbody></table>\n                            <button class=\"btn btn-sm btn-info button-choose-other\">Ch\u1ECDn b\xE0i vi\u1EBFt kh\xE1c</button></div>";
        $('.filter-result').append(html);
        chooseOtherArticleCategory(url, getUrl, type); // buttonPaginationOnClickArticle(url, getUrl, type);
      }
    });
  });
};

var chooseOtherArticleCategory = function chooseOtherArticleCategory(url, getUrl, type) {
  $('.button-choose-other').click(function (e) {
    e.preventDefault();
    $('input[name=link]').val("");
    $.ajax({
      url: '/admin/menus/' + url,
      method: 'GET',
      success: function success(scs) {
        $('#table').remove();
        $('.filter-result').html(scs);
        chooseRecordCategoryArticle(url, getUrl, type); // buttonPaginationOnClickArticle(url, getUrl, type);
      }
    });
  });
};

/***/ }),

/***/ 8:
/*!************************************************!*\
  !*** multi ./resources/js/admin/menus.edit.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /mnt/d/projects/CMS/Leotive-CMS-v3/resources/js/admin/menus.edit.js */"./resources/js/admin/menus.edit.js");


/***/ })

/******/ });