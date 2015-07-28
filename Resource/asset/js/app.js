'use strict';
/**
 * @ngdoc overview
 * @name sbAdminApp
 * @description
 * # sbAdminApp
 *
 * Main module of the application.
 */
angular
  .module('sbAdminApp', [
    'oc.lazyLoad',
    'ui.router',
    'ui.bootstrap',
    'angular-loading-bar',
  ])
  .config(['$stateProvider','$urlRouterProvider','$ocLazyLoadProvider',function ($stateProvider,$urlRouterProvider,$ocLazyLoadProvider) {
    
    $ocLazyLoadProvider.config({
      debug:false,
      events:true,
    });

    $urlRouterProvider.otherwise('/dashboard/home');

    $stateProvider
      .state('dashboard', {
        url:'/dashboard',
        templateUrl: '/Admin/views/dashboard/main',
        resolve: {
            loadMyDirectives:function($ocLazyLoad){
                return $ocLazyLoad.load(
                {
                    name:'sbAdminApp',
                    files:[
                    '/Admin/js/directives/header/header-notification/header-notification.js'
                    ]
                }),
                $ocLazyLoad.load(
                {
                   name:'toggle-switch',
                   files:["/Admin/vendor/angular-toggle-switch/angular-toggle-switch.min.js",
                          "/Admin/vendor/angular-toggle-switch/angular-toggle-switch.css"
                      ]
                }),
                $ocLazyLoad.load(
                {
                  name:'ngAnimate',
                  files:['/Admin/vendor/angular-animate/angular-animate.js']
                }),
                $ocLazyLoad.load(
                {
                  name:'ngCookies',
                  files:['/Admin/vendor/angular-cookies/angular-cookies.js']
                }),
                $ocLazyLoad.load(
                {
                  name:'ngResource',
                  files:['/Admin/vendor/angular-resource/angular-resource.js']
                }),
                $ocLazyLoad.load(
                {
                  name:'ngSanitize',
                  files:['/Admin/vendor/angular-sanitize/angular-sanitize.js']
                }),
                $ocLazyLoad.load(
                {
                  name:'ngTouch',
                  files:['/Admin/vendor/angular-touch/angular-touch.js']
                });
            }
        }
    })
      .state('dashboard.home',{
        url:'/home',
        controller: 'MainCtrl',
        templateUrl:'/Admin/views/dashboard/home',
        resolve: {
          loadMyFiles:function($ocLazyLoad) {
            return $ocLazyLoad.load({
              name:'sbAdminApp',
              files:[
              '/Admin/js/controllers/main.js',
              '/Admin/js/directives/timeline/timeline.js',
              '/Admin/js/directives/notifications/notifications.js',
              '/Admin/js/directives/chat/chat.js',
              '/Admin/js/directives/dashboard/stats/stats.js'
              ]
            })
          }
        }
      })
      .state('dashboard.form',{
        templateUrl:'/Admin/views/form',
        url:'/form'
    })
      .state('dashboard.blank',{
        templateUrl:'/Admin/views/pages/blank',
        url:'/blank'
    })
      .state('login',{
        templateUrl:'/Admin/views/pages/login',
        url:'/login'
    })
      .state('dashboard.chart',{
        templateUrl:'/Admin/views/chart',
        url:'/chart',
        controller:'ChartCtrl',
        resolve: {
          loadMyFile:function($ocLazyLoad) {
            return $ocLazyLoad.load({
              name:'chart.js',
              files:[
                '/Admin/vendor/angular-chart.js/dist/angular-chart.min.js',
                '/Admin/vendor/angular-chart.js/dist/angular-chart.css'
              ]
            }),
            $ocLazyLoad.load({
                name:'sbAdminApp',
                files:['/Admin/js/controllers/chartContoller.js']
            })
          }
        }
    })
      .state('dashboard.table',{
        templateUrl:'/Admin/views/table',
        url:'/table'
    })
      .state('dashboard.panels-wells',{
          templateUrl:'/Admin/views/ui-elements/panels-wells',
          url:'/panels-wells'
      })
      .state('dashboard.buttons',{
        templateUrl:'/Admin/views/ui-elements/buttons',
        url:'/buttons'
    })
      .state('dashboard.notifications',{
        templateUrl:'/Admin/views/ui-elements/notifications',
        url:'/notifications'
    })
      .state('dashboard.typography',{
       templateUrl:'/Admin/views/ui-elements/typography',
       url:'/typography'
   })
      .state('dashboard.icons',{
       templateUrl:'/Admin/views/ui-elements/icons',
       url:'/icons'
   })
      .state('dashboard.grid',{
       templateUrl:'/Admin/views/ui-elements/grid',
       url:'/grid'
   })
  }]);

    
