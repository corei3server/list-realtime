<form class="form-inline" name="form">
    <div class="form-group">
        <label for="title">New item</label>
        <input type="text"
               class="form-control"
               id="title"
               placeholder="Title"
               name="title"
               ng-model="model.title"
               required>
    </div>
    <button type="submit" class="btn btn-default" ng-click="submitForm()">ADD</button>
</form>