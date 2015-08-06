(function () {
  'use strict';

  angular
    .module('list')
    .controller('Home', Home);

  Home.$inject = ['Pusher', 'Item'];

  function Home(Pusher, Item) {
    var vm = this;
    vm.item = {};
    vm.items = [];

    vm.addItem = addItem;
    vm.removeItem = removeItem;
    vm.saveItem = saveItem;

    activate();

    function activate() {
      Pusher.subscribe('list', 'item-new', function (data) {
        vm.items.unshift(data.item);
      });

      Pusher.subscribe('list', 'item-updated', function (data) {
        for (var i = 0; i < vm.items.length; i++) {
          if (vm.items[i].id === data.item.id) {
            vm.items[i] = data.item;
            break;
          }
        }
      });

      Pusher.subscribe('list', 'item-delete', function (data) {
        for (var i = 0; i < vm.items.length; i++) {
          if (vm.items[i].id === data.item.id) {
            vm.items.splice(i, 1);
            break;
          }
        }
      });

      Item.all()
        .then(function (data) {
          vm.items = data.items;
        });
    }

    function addItem() {
      return Item.create(vm.item)
        .then(function () {
          vm.item = {};
        });
    }

    function removeItem(item) {
      Item.remove(item.id)
        .then(function (data) {
          //
        });
    }

    function saveItem(item) {
      Item.update(item)
        .then(function () {
          //
        });
    }
  }
})();