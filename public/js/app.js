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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(5);


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {


/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(2);
__webpack_require__(3);
__webpack_require__(4);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/***/ }),
/* 2 */
/***/ (function(module, exports) {

$(document).ready(function () {
    if ($('.employeePage').length > 0) {
        var isUpdatingPeriod = false;
        $(".btnEditEmp").click(function () {
            if (isUpdatingPeriod) {
                return false;
            }
            var parent = $(this).closest('tr');
            var id = parent.find('.id_emp').html();
            var name = parent.find('.name_emp').val();
            var sex = parent.find('.sex').val();
            var email = parent.find('.email_emp').val();
            var phone = parent.find('.phone_emp').val();
            var postData = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id,
                'name': name,
                'sex': sex,
                'email': email,
                'phone': phone
            },
                isUpdatingPeriod = true;
            var url = $(this).attr('data-url');
            $.ajax({
                url: url,
                type: 'POST',
                data: postData,
                success: function success(data) {
                    if (data.success) {
                        // alert('Update Employee Success !!');
                        $.alert({
                            title: '<h2 style="color:green;font-weight: bold">Success!</h2>',
                            content: 'Update Employee Success!'
                        });
                    } else {
                        // alert('Update Employee Fail !' + data.errors);
                        $.alert({
                            title: '<h2 style="color:red;font-weight: bold">Fail!</h2>',
                            content: 'Update Employee Fail because' + data.errors
                        });
                    }
                },
                complete: function complete() {
                    isUpdatingPeriod = false;
                }
            });
        });
        $('.btnDeleteEmp').click(function () {
            var _this = this;

            $.confirm({
                title: 'Delete!',
                content: 'Are you sure delete it!',
                buttons: {
                    OK: function OK() {
                        location.href = $(_this).attr('href');
                    },
                    Cancel: function Cancel() {}
                }
            });
            return false;
        });
        $('#bulk_delete').click(function () {
            var id = [];
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure delete it!',
                buttons: {
                    OK: function OK() {
                        $('.checkboxes:checked').each(function () {
                            id.push($(this).val());
                        });
                        var postData = {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'id': id
                        };
                        if (id.length > 0) {
                            $.ajax({
                                url: $("#bulk_delete").attr('data-url'),
                                method: "POST",
                                data: postData,
                                success: function success(data) {
                                    if (data.success) {
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    },
                    Cancel: function Cancel() {}
                }
            });
            return false;
        });
    }
});

/***/ }),
/* 3 */
/***/ (function(module, exports) {

$(document).ready(function () {
    if ($('.providerPage').length > 0) {
        var isUpdatingPeriod = false;
        $(".btnEditPro").click(function () {
            if (isUpdatingPeriod) {
                return false;
            }
            var parent = $(this).closest('tr');
            var id = parent.find('.id_pro').html();
            var name = parent.find('.name_pro').val();
            var address = parent.find('.address_pro').val();
            var phone = parent.find('.phone_pro').val();
            var postData = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id,
                'name': name,
                'address': address,
                'phone': phone
            },
                isUpdatingPeriod = true;
            var url = $(this).attr('data-url');
            $.ajax({
                url: url,
                type: 'POST',
                data: postData,
                success: function success(data) {
                    if (data.success) {
                        $.alert({
                            title: '<h2 style="color:green;font-weight: bold">Success!</h2>',
                            content: 'Update Provider Success!'
                        });
                    } else {
                        $.alert({
                            title: '<h2 style="color:red;font-weight: bold">Fail!</h2>',
                            content: 'Update Provider Fail Because ' + data.errors
                        });
                    }
                },
                complete: function complete() {
                    isUpdatingPeriod = false;
                }
            });
        });
        $('.btnDeletePro').click(function () {
            var _this = this;

            $.confirm({
                title: 'Delete!',
                content: 'Are you sure delete it!',
                buttons: {
                    OK: function OK() {
                        location.href = $(_this).attr('href');
                    },
                    Cancel: function Cancel() {}
                }
            });
            return false;
        });
        $('#bulk_delete').click(function () {
            var id = [];
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure delete it!',
                buttons: {
                    OK: function OK() {
                        $('.checkboxes:checked').each(function () {
                            id.push($(this).val());
                        });
                        var postData = {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'id': id
                        };
                        if (id.length > 0) {
                            $.ajax({
                                url: $("#bulk_delete").attr('data-url'),
                                method: "POST",
                                data: postData,
                                success: function success(data) {
                                    if (data.success) {
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    },
                    Cancel: function Cancel() {}
                }
            });
            return false;
        });
    }
});

/***/ }),
/* 4 */
/***/ (function(module, exports) {

$(document).ready(function () {
    if ($('.customerPage').length > 0) {
        var isUpdatingPeriod = false;
        $(".btnEditCus").click(function () {
            if (isUpdatingPeriod) {
                return false;
            }
            var parent = $(this).closest('tr');
            var id = parent.find('.id_cus').html();
            var name = parent.find('.name_cus').val();
            var address = parent.find('.address_cus').val();
            var phone = parent.find('.phone_cus').val();
            var postData = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'id': id,
                'name': name,
                'address': address,
                'phone': phone
            },
                isUpdatingPeriod = true;
            var url = $(this).attr('data-url');
            $.ajax({
                url: url,
                type: 'POST',
                data: postData,
                success: function success(data) {
                    if (data.success) {
                        $.alert({
                            title: '<h2 style="color:green;font-weight: bold">Success!</h2>',
                            content: 'Update Customer Success!'
                        });
                    } else {
                        $.alert({
                            title: '<h2 style="color:red;font-weight: bold">Fail!</h2>',
                            content: 'Update Customer Fail Because' + data.errors
                        });
                    }
                },
                complete: function complete() {
                    isUpdatingPeriod = false;
                }
            });
        });
        $('.btnDeleteCus').click(function () {
            var _this = this;

            $.confirm({
                title: 'Delete!',
                content: 'Are you sure delete it!',
                buttons: {
                    OK: function OK() {
                        location.href = $(_this).attr('href');
                    },
                    Cancel: function Cancel() {}
                }
            });
            return false;
        });
        $('#bulk_delete').click(function () {
            var id = [];
            $.confirm({
                title: 'Delete!',
                content: 'Are you sure delete it!',
                buttons: {
                    OK: function OK() {
                        $('.checkboxes:checked').each(function () {
                            id.push($(this).val());
                        });
                        var postData = {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'id': id
                        };
                        if (id.length > 0) {
                            $.ajax({
                                url: $("#bulk_delete").attr('data-url'),
                                method: "POST",
                                data: postData,
                                success: function success(data) {
                                    if (data.success) {
                                        window.location.reload();
                                    }
                                }
                            });
                        }
                    },
                    Cancel: function Cancel() {}
                }
            });
            return false;
        });
    }
});

/***/ }),
/* 5 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);