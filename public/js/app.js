/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ (() => {

/**
 * Theme: Dastone - Responsive Bootstrap 5 Admin Dashboard
 * Author: Mannatthemes
 * Module/App: Main Js
 */

(function ($) {
  'use strict';

  function initDateRangrPicker() {
    if ($('#Dash_Date').length == 0) {
      return;
    }
    var picker = $('#Dash_Date');
    var start = moment();
    var end = moment();
    function cb(start, end, label) {
      var title = '';
      var range = '';
      if (end - start < 100 || label == 'Today') {
        title = 'Today:';
        range = start.format('MMM D');
      } else if (label == 'Yesterday') {
        title = 'Yesterday:';
        range = start.format('MMM D');
      } else {
        range = start.format('MMM D') + ' - ' + end.format('MMM D');
      }
      picker.find('#Select_date').html(range);
      picker.find('#Day_Name').html(title);
    }
    picker.daterangepicker({
      startDate: start,
      endDate: end,
      opens: 'left',
      applyClass: "btn btn-sm btn-primary",
      cancelClass: "btn btn-sm btn-secondary",
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);
    cb(start, end, '');
  }
  function initMetisMenu() {
    //metis menu
    $(".metismenu").metisMenu();
    $(window).resize(function () {
      initEnlarge();
    });
  }
  function initLeftMenuCollapse() {
    // Left menu collapse
    $('.button-menu-mobile').on('click', function (event) {
      event.preventDefault();
      $("body").toggleClass("enlarge-menu");
    });
  }
  function initEnlarge() {
    if ($(window).width() < 1300) {
      $('body').addClass('enlarge-menu enlarge-menu-all');
    } else {
      // if ($('body').data('keep-enlarged') != true)
      $('body').removeClass('enlarge-menu enlarge-menu-all');
    }
  }
  function initMainIconTabMenu() {
    $('.main-icon-menu .nav-link').on('click', function (e) {
      $("body").removeClass("enlarge-menu");
      e.preventDefault();
      $(this).addClass('active');
      $(this).siblings().removeClass('active');
      $('.main-menu-inner').addClass('active');
      var targ = $(this).attr('href');
      $(targ).addClass('active');
      $(targ).siblings().removeClass('active');
    });
  }
  function initActiveMenu() {
    // === following js will activate the menu in left side bar based on url ====
    $(".leftbar-tab-menu a, .left-sidenav a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      if (this.href == pageUrl) {
        $(this).addClass("active");
        $(this).parent().addClass("active"); // add active to li of the current link                 
        $(this).parent().parent().addClass("in");
        $(this).parent().parent().addClass("mm-show");
        $(this).parent().parent().parent().addClass("mm-active");
        $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
        $(this).parent().parent().parent().addClass("active");
        $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link                
        $(this).parent().parent().parent().parent().parent().addClass("mm-active");
        var menu = $(this).closest('.main-icon-menu-pane').attr('id');
        $("a[href='#" + menu + "']").addClass('active');
      }
    });
  }
  function initFeatherIcon() {
    feather.replace();
  }
  function initMainIconMenu() {
    $(".navigation-menu a").each(function () {
      var pageUrl = window.location.href.split(/[?#]/)[0];
      if (this.href == pageUrl) {
        $(this).parent().addClass("active"); // add active to li of the current link
        $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
        $(this).parent().parent().parent().parent().parent().addClass("active"); // add active class to an anchor
      }
    });
  }
  function initTopbarMenu() {
    $('.navbar-toggle').on('click', function (event) {
      $(this).toggleClass('open');
      $('#navigation').slideToggle(400);
    });
    $('.navigation-menu>li').slice(-2).addClass('last-elements');
    $('.navigation-menu li.has-submenu a[href="#"]').on('click', function (e) {
      if ($(window).width() < 992) {
        e.preventDefault();
        $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
      }
    });
  }
  function init() {
    initDateRangrPicker();
    initMetisMenu();
    initLeftMenuCollapse();
    initEnlarge();
    initMainIconTabMenu();
    initActiveMenu();
    initFeatherIcon();
    initMainIconMenu();
    initTopbarMenu();
    Waves.init();
  }
  init();
})(jQuery);

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ (() => {

throw new Error("Module build failed (from ./node_modules/mini-css-extract-plugin/dist/loader.js):\nModuleBuildError: Module build failed (from ./node_modules/css-loader/dist/cjs.js):\nError: Can't resolve '../images/1.png' in 'D:\\kodingan\\ilcs-intra\\resources\\css'\n    at finishWithoutResolve (D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:564:18)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:656:15\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:27:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\DescriptionFilePlugin.js:89:43\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:27:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\DescriptionFilePlugin.js:89:43\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:16:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\Resolver.js:714:5\n    at eval (eval at create (D:\\kodingan\\ilcs-intra\\node_modules\\tapable\\lib\\HookCodeFactory.js:33:10), <anonymous>:15:1)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\enhanced-resolve\\lib\\DirectoryExistsPlugin.js:41:15\n    at processTicksAndRejections (node:internal/process/task_queues:82:21)\n    at processResult (D:\\kodingan\\ilcs-intra\\node_modules\\webpack\\lib\\NormalModule.js:841:19)\n    at D:\\kodingan\\ilcs-intra\\node_modules\\webpack\\lib\\NormalModule.js:966:5\n    at D:\\kodingan\\ilcs-intra\\node_modules\\loader-runner\\lib\\LoaderRunner.js:400:11\n    at D:\\kodingan\\ilcs-intra\\node_modules\\loader-runner\\lib\\LoaderRunner.js:252:18\n    at context.callback (D:\\kodingan\\ilcs-intra\\node_modules\\loader-runner\\lib\\LoaderRunner.js:124:13)\n    at Object.loader (D:\\kodingan\\ilcs-intra\\node_modules\\css-loader\\dist\\index.js:155:5)\n    at processTicksAndRejections (node:internal/process/task_queues:96:5)");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	__webpack_modules__["./resources/js/app.js"]();
/******/ 	// This entry module doesn't tell about it's top-level declarations so it can't be inlined
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/css/app.css"]();
/******/ 	
/******/ })()
;