(function () {
  'use strict';

  angular
    .module('list')
    .factory('Item', Item);

  Item.$inject = ['$http'];

  function Item($http) {
    var url = '/api/v1/list/items';

    return {
      all: all,
      create: create,
      update: update,
      remove: remove
    };

    function all() {
      return $http.get(url)
        .then(success)
        .catch(error);

      function success(response) {
        return response.data;
      }

      function error(error) {
        //
      }
    }

    function create(model) {
      return $http.post(url, model);
    }

    function update(model) {
      return $http.put(url + '/' + model.id, model)
    }

    function remove(id) {
      return $http.delete(url + '/' + id);
    }
  }

})();