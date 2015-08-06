(function () {
  'use strict';

  angular
    .module('list')
    .directive('itemForm', itemForm);

  function itemForm() {
    return {
      restrict: 'E',
      templateUrl: '/partials/list/form',
      scope: {
        model: '=',
        submit: '&'
      },
      link: function (scope, element, attributes) {
        scope.hasErrors = function (input) {
          return scope.form.$submitted && input.$invalid;
        };

        scope.submitForm = function () {
          if (scope.form.$invalid) {
            return false;
          }

          scope.submit();
        };
      }
    }
  }

})();