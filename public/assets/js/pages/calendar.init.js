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

/***/ "./resources/js/pages/calendar.init.js":
/*!*********************************************!*\
  !*** ./resources/js/pages/calendar.init.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Shreyu - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 1.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Calendar init js
*/
!function ($) {
  "use strict";

  var CalendarApp = function CalendarApp() {
    this.$body = $("body");
    this.$modal = $('#event-modal'), this.$calendar = $('#calendar'), this.$formEvent = $("#form-event"), this.$btnNewEvent = $("#btn-new-event"), this.$btnDeleteEvent = $("#btn-delete-event"), this.$btnSaveEvent = $("#btn-save-event"), this.$modalTitle = $("#modal-title"), this.$calendarObj = null, this.$selectedEvent = null, this.$newEventData = null;
  };
  /* on click on event */


  CalendarApp.prototype.onEventClick = function (info) {
    this.$formEvent[0].reset();
    this.$formEvent.removeClass("was-validated");
    this.$newEventData = null;
    this.$btnDeleteEvent.show();
    this.$modalTitle.text('Edit Event');
    this.$modal.modal({
      backdrop: 'static'
    });
    this.$selectedEvent = info.event;
    $("#event-title").val(this.$selectedEvent.title);
    $("#event-category").val(this.$selectedEvent.classNames[0]);
  },
  /* on select */
  CalendarApp.prototype.onSelect = function (info) {
    this.$formEvent[0].reset();
    this.$formEvent.removeClass("was-validated");
    this.$selectedEvent = null;
    this.$newEventData = info;
    this.$btnDeleteEvent.hide();
    this.$modalTitle.text('Add New Event');
    this.$modal.modal({
      backdrop: 'static'
    });
    this.$calendarObj.unselect();
  },
  /* Initializing */
  CalendarApp.prototype.init = function () {
    /*  Initialize the calendar  */
    var today = new Date($.now());
    var defaultEvents = [{
      title: 'Meeting with Mr. Shreyu',
      start: new Date($.now() + 158000000),
      end: new Date($.now() + 338000000),
      className: 'bg-warning'
    }, {
      title: 'Interview - Backend Engineer',
      start: today,
      end: today,
      className: 'bg-success'
    }, {
      title: 'Phone Screen - Frontend Engineer',
      start: new Date($.now() + 168000000),
      className: 'bg-info'
    }, {
      title: 'Buy Design Assets',
      start: new Date($.now() + 338000000),
      end: new Date($.now() + 338000000 * 1.2),
      className: 'bg-primary'
    }];
    var $this = this; // cal - init

    $this.$calendarObj = new FullCalendar.Calendar($this.$calendar[0], {
      plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
      slotDuration: '00:15:00',

      /* If we want to split day time each 15minutes */
      minTime: '08:00:00',
      maxTime: '19:00:00',
      themeSystem: 'bootstrap',
      bootstrapFontAwesome: false,
      buttonText: {
        today: 'Today',
        month: 'Month',
        week: 'Week',
        day: 'Day',
        list: 'List',
        prev: 'Prev',
        next: 'Next'
      },
      defaultView: 'dayGridMonth',
      handleWindowResize: true,
      height: $(window).height() - 200,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      events: defaultEvents,
      editable: true,
      droppable: true,
      // this allows things to be dropped onto the calendar !!!
      eventLimit: true,
      // allow "more" link when too many events
      selectable: true,
      dateClick: function dateClick(info) {
        $this.onSelect(info);
      },
      eventClick: function eventClick(info) {
        $this.onEventClick(info);
      }
    });
    $this.$calendarObj.render(); // on new event button click

    $this.$btnNewEvent.on('click', function (e) {
      $this.onSelect({
        date: new Date(),
        allDay: true
      });
    }); // save event

    $this.$formEvent.on('submit', function (e) {
      e.preventDefault();
      var form = $this.$formEvent[0]; // validation

      if (form.checkValidity()) {
        if ($this.$selectedEvent) {
          $this.$selectedEvent.setProp('title', $("#event-title").val());
          $this.$selectedEvent.setProp('classNames', [$("#event-category").val()]);
        } else {
          var eventData = {
            title: $("#event-title").val(),
            start: $this.$newEventData.date,
            allDay: $this.$newEventData.allDay,
            className: $("#event-category").val()
          };
          $this.$calendarObj.addEvent(eventData);
        }

        $this.$modal.modal('hide');
      } else {
        e.stopPropagation();
        form.classList.add('was-validated');
      }
    }); // delete event

    $($this.$btnDeleteEvent.on('click', function (e) {
      if ($this.$selectedEvent) {
        $this.$selectedEvent.remove();
        $this.$selectedEvent = null;
        $this.$modal.modal('hide');
      }
    }));
  }, //init CalendarApp
  $.CalendarApp = new CalendarApp(), $.CalendarApp.Constructor = CalendarApp;
}(window.jQuery), //initializing CalendarApp
function ($) {
  "use strict";

  $.CalendarApp.init();
}(window.jQuery);

/***/ }),

/***/ 1:
/*!***************************************************!*\
  !*** multi ./resources/js/pages/calendar.init.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/nikhil/projects/themes/shreyu/laravel/resources/js/pages/calendar.init.js */"./resources/js/pages/calendar.init.js");


/***/ })

/******/ });