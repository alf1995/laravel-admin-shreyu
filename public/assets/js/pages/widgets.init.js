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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/widgets.init.js":
/*!********************************************!*\
  !*** ./resources/js/pages/widgets.init.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Shreyu - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 1.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Widgets init js
*/
!function ($) {
  "use strict";

  var ChatApp = function ChatApp() {
    this.$body = $("body"), this.$chatInput = $('.chat-input'), this.$chatList = $('.conversation-list'), this.$chatSendBtn = $('.chat-send'), this.$chatForm = $("#chat-form");
  };

  ChatApp.prototype.save = function () {
    var chatText = this.$chatInput.val();
    var chatTime = moment().format("h:mm");

    if (chatText == "") {
      this.$chatInput.focus();
      return false;
    } else {
      $('<li class="clearfix odd"><div class="chat-avatar"><img src="assets/images/users/avatar-7.jpg" alt="male"><i>' + chatTime + '</i></div><div class="conversation-text"><div class="ctext-wrap"><i>Shreyu</i><p>' + chatText + '</p></div></div></li>').appendTo('.conversation-list');
      this.$chatInput.focus();
      this.$chatList.animate({
        scrollTop: this.$chatList.prop("scrollHeight")
      }, 1000);
      return true;
    }
  }; // init


  ChatApp.prototype.init = function () {
    var $this = this; //binding keypress event on chat input box - on enter we are adding the chat into chat list - 

    $this.$chatInput.keypress(function (ev) {
      var p = ev.which;

      if (p == 13) {
        $this.save();
        return false;
      }
    }); //binding send button click

    $this.$chatForm.on('submit', function (ev) {
      ev.preventDefault();
      $this.save();
      $this.$chatForm.removeClass('was-validated');
      $this.$chatInput.val('');
      return false;
    });
  }, //init ChatApp
  $.ChatApp = new ChatApp(), $.ChatApp.Constructor = ChatApp;
}(window.jQuery), function ($) {
  "use strict";

  var WidgetsPage = function WidgetsPage() {};

  WidgetsPage.prototype.initCharts = function () {
    window.Apex = {
      chart: {
        parentHeightOffset: 0,
        toolbar: {
          show: false
        }
      },
      grid: {
        padding: {
          left: 0,
          right: 0
        }
      },
      colors: ["#5369f8", "#43d39e", "#f77e53", "#ffbe0b"],
      tooltip: {
        theme: 'dark',
        x: {
          show: false
        }
      }
    }; // 
    // Stats
    //

    var options2 = {
      chart: {
        type: 'area',
        height: 45,
        width: 90,
        sparkline: {
          enabled: true
        }
      },
      series: [{
        data: [25, 66, 41, 85, 63, 25, 44, 12, 36, 9, 54]
      }],
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      markers: {
        size: 0
      },
      colors: ["#5369f8"],
      tooltip: {
        fixed: {
          enabled: false
        },
        x: {
          show: false
        },
        y: {
          title: {
            formatter: function formatter(seriesName) {
              return '';
            }
          }
        },
        marker: {
          show: false
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: false,
          opacityFrom: 0.45,
          opacityTo: 0.05,
          stops: [45, 100]
        }
      }
    };
    new ApexCharts(document.querySelector("#today-revenue-chart"), options2).render();
    new ApexCharts(document.querySelector("#today-product-sold-chart"), $.extend({}, options2, {
      colors: ['#f77e53']
    })).render();
    new ApexCharts(document.querySelector("#today-new-customer-chart"), $.extend({}, options2, {
      colors: ['#43d39e']
    })).render();
    new ApexCharts(document.querySelector("#today-new-visitors-chart"), $.extend({}, options2, {
      colors: ['#ffbe0b']
    })).render(); // ------------------- revenue chart
    // data for the sparklines that appear below header area

    var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39]; // the default colorPalette for this dashboard

    var labelsSales = [];

    for (var i = 1; i <= 10; i++) {
      labelsSales.push('2018-09-' + i);
    }

    var options2 = {
      chart: {
        type: 'area',
        height: 160,
        sparkline: {
          enabled: true
        }
      },
      stroke: {
        width: 3,
        curve: 'smooth'
      },
      fill: {
        opacity: 0.2
      },
      series: [{
        name: 'Data',
        data: sparklineData
      }],
      xaxis: {
        type: 'datetime'
      },
      yaxis: {
        min: 0
      },
      colors: ['#5369f8'],
      labels: labelsSales,
      title: {
        text: '21,000',
        offsetX: 5,
        offsetY: 10,
        margin: 0,
        style: {
          fontSize: '24px'
        }
      },
      subtitle: {
        text: 'Visits',
        offsetX: 5,
        offsetY: 45,
        margin: 0,
        style: {
          fontSize: '16px'
        }
      }
    };
    new ApexCharts(document.querySelector("#traffic-chart"), options2).render();
    var customersTitles = $.extend({}, options2.title, {
      text: '1100'
    });
    var customersSubTitles = $.extend({}, options2.subtitle, {
      text: 'Customers'
    });
    new ApexCharts(document.querySelector("#customers-chart"), $.extend({}, options2, {
      colors: ['#43d39e'],
      title: customersTitles,
      subtitle: customersSubTitles
    })).render();
    var revenueTitle = $.extend({}, options2.title, {
      text: '$201,200'
    });
    var revenueSubTitle = $.extend({}, options2.subtitle, {
      text: 'Revenue'
    });
    new ApexCharts(document.querySelector("#revenue-chart"), $.extend({}, options2, {
      colors: ['#f77e53'],
      title: revenueTitle,
      subtitle: revenueSubTitle
    })).render();
  }, //initializing
  WidgetsPage.prototype.init = function () {
    // charts
    this.initCharts(); // calendar

    $('#calendar-widget').flatpickr({
      inline: true,
      shorthandCurrentMonth: true
    }); // chat

    $.ChatApp.init();
  }, $.WidgetsPage = new WidgetsPage(), $.WidgetsPage.Constructor = WidgetsPage;
}(window.jQuery), //initializing main application module
function ($) {
  "use strict";

  $.WidgetsPage.init();
}(window.jQuery);

/***/ }),

/***/ 11:
/*!**************************************************!*\
  !*** multi ./resources/js/pages/widgets.init.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/nikhil/projects/themes/shreyu/laravel/resources/js/pages/widgets.init.js */"./resources/js/pages/widgets.init.js");


/***/ })

/******/ });