<div ng-controller="Home as home">
    <div class="text-center">
        <h1>List</h1>
    </div>
    <div class="">
        <!-- general form elements -->
        <div class="box ">
            <!-- /.box-header -->
            <!-- form start -->
            <item-form submit="home.addItem()" model="home.item"></item-form>
        </div>
        <!-- /.box -->
    </div>
    <div class="page-header">
        <h2>Items</h2>
    </div>
    <div class="">
        <ul class="list-group">
            <item-editable-row ng-repeat="item in home.items"
                               model="item"
                               update="home.saveItem(item)"
                               remove="home.removeItem(item)">
            </item-editable-row>
        </ul>
    </div>
</div>