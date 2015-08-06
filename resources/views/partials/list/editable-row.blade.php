<li class="list-group-item">
    <div class="row" ng-if="!isEditing">
        <div class="col-md-8">
            <span >{{model.title}}</span>
        </div>
        <div class="col-md-4">
            <div class="btn-group pull-right" ng-if="!isEditing" role="group" aria-label="...">
                <button type="button" class="btn btn-default" ng-click="edit()">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger" ng-click="delete()">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="row" ng-if="isEditing">
        <form name="rowForm">
            <div class="col-md-8">
                <input type="text" class="form-control" name="title" ng-model="model.title" required>
            </div>
            <div class="col-md-4">
                <div class="btn-group pull-right" ng-if="isEditing" role="group" aria-label="...">
                    <button type="submit" class="btn btn-default" ng-click="save()">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-danger" ng-click="cancel()">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</li>