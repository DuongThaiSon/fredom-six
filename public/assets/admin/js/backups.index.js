!function(t){var n={};function e(o){if(n[o])return n[o].exports;var i=n[o]={i:o,l:!1,exports:{}};return t[o].call(i.exports,i,i.exports,e),i.l=!0,i.exports}e.m=t,e.c=n,e.d=function(t,n,o){e.o(t,n)||Object.defineProperty(t,n,{enumerable:!0,get:o})},e.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},e.t=function(t,n){if(1&n&&(t=e(t)),8&n)return t;if(4&n&&"object"==typeof t&&t&&t.__esModule)return t;var o=Object.create(null);if(e.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:t}),2&n&&"string"!=typeof t)for(var i in t)e.d(o,i,function(n){return t[n]}.bind(null,i));return o},e.n=function(t){var n=t&&t.__esModule?function(){return t.default}:function(){return t};return e.d(n,"a",n),n},e.o=function(t,n){return Object.prototype.hasOwnProperty.call(t,n)},e.p="/",e(e.s=65)}({65:function(t,n,e){t.exports=e(66)},66:function(t,n){$(document).ready((function(){e(),o()}));var e=function(){$(".btn-create-backup").on("click.btnCreateBackup",(function(t){t.preventDefault();var n=$(this).attr("href");Swal.mixin({confirmButtonText:"Next &rarr;",showCancelButton:!0,progressSteps:["1","2"]}).queue([{title:"Select color",input:"radio",inputOptions:{only_db:"Chỉ cơ sở dữ liệu",only_files:"Chỉ tệp tin hệ thống",both:"Cả hai"},inputValidator:function(t){if(!t)return"Cần phải chọn 1 loại!"}},{title:"Thông báo",input:"checkbox",inputPlaceholder:"Nhận thông báo về việc sao lưu lần này vào hòm thư hệ thống",inputValue:1}]).then((function(t){if(t.value){var e=JSON.stringify(t.value);Swal.fire({title:"Đang tạo sao lưu cho thời điểm hiện tại!",text:"Xin chờ...",onBeforeOpen:function(){return Swal.showLoading()},allowOutsideClick:!1}),$.ajax({url:n,data:{options:e},method:"POST",success:function(t){Swal.fire("Thành công!","Đã tạo sao lưu cho thời điểm hiện tại","success").then((function(){$("#table-list-backup").html(t),o()}))}})}}))}))},o=function t(){$(".btn-delete-backup").off("click.btnDeleteBackup"),$(".btn-delete-backup").on("click.btnDeleteBackup",(function(n){n.preventDefault();var e=$(this).attr("href");Swal.fire({title:"Xóa tệp sao lưu này?",text:"Bạn sẽ không thể lấy lại tệp đã xóa!",icon:"warning",showCancelButton:!0,confirmButtonColor:"#d33",cancelButtonColor:"",confirmButtonText:"Đúng, xóa nó đi!",cancelButtonText:"Hủy",showLoaderOnConfirm:!0,preConfirm:function(){return $.ajax({url:e,method:"POST",data:{_method:"DELETE"},success:function(t){return t},error:function(t){Swal.showValidationMessage("Request failed: ".concat(t))}})},allowOutsideClick:function(){return!Swal.isLoading()}}).then((function(n){n.value&&($("#table-list-backup").html(n.value),t())}))}))}}});