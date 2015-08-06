(function () {
  'use strict';

  angular
    .module('list')
    .directive('itemEditableRow', itemEditableRow);

  function itemEditableRow() {
    return {
      restrict: 'E',
      required: 'ngModel',
      templateUrl: '/partials/list/editable-row',
      replace: true,
      scope: {
        model: '=',
        update: '&',
        remove: '&'
      },
      link: function (scope, element, attributes) {
        scope.isEditing = false;
        scope.original = angular.copy(scope.model);

        scope.edit = function () {
          scope.isEditing = true;
        };

        scope.cancel = function () {
          scope.isEditing = false;
          scope.model.title = scope.original.title;
        };

        scope.delete = function () {
          scope.remove(scope.model);
        };

        scope.save = function () {
          if (scope.rowForm.$invalid) {
            return false;
          }

          scope.update();
        };
      }
    }
  }

})();