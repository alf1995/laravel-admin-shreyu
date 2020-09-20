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

/***/ "./resources/js/pages/form-advanced.init.js":
/*!**************************************************!*\
  !*** ./resources/js/pages/form-advanced.init.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Shreyu - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 1.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Form Advanced init js
*/
!function ($) {
  "use strict";

  var Components = function Components() {}; //initializing Custom Select


  Components.prototype.initCustomSelect = function () {
    $('[data-plugin="customselect"]').select2();
  }, //initializing form validation
  Components.prototype.initMultiSelect = function () {
    if ($('[data-plugin="multiselect"]').length > 0) $('[data-plugin="multiselect"]').multiSelect($(this).data());
  }, //initializing flatpickr
  Components.prototype.initFlatpickr = function () {
    //Flat picker
    $('#basic-datepicker').flatpickr();
    $('#datetime-datepicker').flatpickr({
      enableTime: true,
      dateFormat: "Y-m-d H:i"
    });
    $('#humanfd-datepicker').flatpickr({
      altInput: true,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d"
    });
    $('#minmax-datepicker').flatpickr({
      minDate: "2020-01",
      maxDate: "2020-03"
    });
    $('#disable-datepicker').flatpickr({
      onReady: function onReady() {
        this.jumpToDate("2025-01");
      },
      disable: ["2025-01-10", "2025-01-21", "2025-01-30", new Date(2025, 4, 9)],
      dateFormat: "Y-m-d"
    });
    $('#multiple-datepicker').flatpickr({
      mode: "multiple",
      dateFormat: "Y-m-d"
    });
    $('#conjunction-datepicker').flatpickr({
      mode: "multiple",
      dateFormat: "Y-m-d",
      conjunction: " :: "
    });
    $('#range-datepicker').flatpickr({
      mode: "range"
    });
    $('#inline-datepicker').flatpickr({
      inline: true
    });
    $('#basic-timepicker').flatpickr({
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i"
    });
    $('#24hours-timepicker').flatpickr({
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: true
    });
    $('#minmax-timepicker').flatpickr({
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      minDate: "16:00",
      maxDate: "22:30"
    });
    $('#preloading-timepicker').flatpickr({
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      defaultDate: "01:45"
    });
  }, //initializing Color Picker
  Components.prototype.initColorpicker = function () {
    // Color Picker
    $('#basic-colorpicker').colorpicker();
    $('#hexa-colorpicker').colorpicker({
      format: 'auto'
    });
    $('#component-colorpicker').colorpicker({
      format: null
    });
    $('#horizontal-colorpicker').colorpicker({
      horizontal: true
    });
    $('#inline-colorpicker').colorpicker({
      color: '#DD0F20',
      inline: true,
      container: true
    });
  }, // touchspin
  Components.prototype.initTouchspin = function () {
    var defaultOptions = {}; // touchspin

    $('[data-toggle="touchspin"]').each(function (idx, obj) {
      var objOptions = $.extend({}, defaultOptions, $(obj).data());
      $(obj).TouchSpin(objOptions);
    });
  }, //initilizing
  Components.prototype.init = function () {
    var $this = this;
    this.initCustomSelect(), this.initMultiSelect(), this.initFlatpickr(), this.initColorpicker(), this.initTouchspin();
  }, $.Components = new Components(), $.Components.Constructor = Components;
}(window.jQuery), //initializing main application module
function ($) {
  "use strict";

  $.Components.init();
}(window.jQuery);

/***/ }),

/***/ 3:
/*!********************************************************!*\
  !*** multi ./resources/js/pages/form-advanced.init.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/nikhil/projects/themes/shreyu/laravel/resources/js/pages/form-advanced.init.js */"./resources/js/pages/form-advanced.init.js");


/***/ })

/******/ });