(function() {

  var app = angular
    .module('list', ['ngRoute', 'doowb.angular-pusher']);

  app.config(['$routeProvider',
      function ($routeProvider) {
        $routeProvider.
          when('/', {
            templateUrl: '/partials/list/index'
          }).

          otherwise({
            redirectTo: '/'
          });
      }
    ]);

  app.config(['$locationProvider',
    function ($location) {
      $location.hashPrefix('!');
    }
  ]);

  app.config(['$httpProvider',
    function ($httpProvider) {
      $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    }
  ]);

  app.config(['PusherServiceProvider',
    function(PusherServiceProvider) {
      PusherServiceProvider
        .setToken('9712fe4b9f90948f70a6')
        .setOptions({});
    }
  ]);

})();