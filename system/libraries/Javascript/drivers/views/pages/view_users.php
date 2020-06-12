<div ng-controller="IndexCtrl" class="container">
    <span style="float: right;">
        {{user.first_name+' '+user.last_name}} <a href="" ng-click="logout()" >logout</a>
    </span>
    <div ng-controller="UserViewController" >
        <h2 style="color: blue">Welcome to Admin panel</h2>
        <h3>User Management</h3>
        <table id="example" class="table table-striped table-hover" cellspacing="0" border="1" >
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Email</th>
                    <th>Created date</th>
                    <!-- <th>Status</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="user in users">
                    <td>{{user.user_id}}</td>
                    <td>{{user.first_name}}</td>
                    <td>{{user.last_name}}</td>
                    <td>{{user.user_email}}</td>
                    <td>{{user.created_at}}</td>              
                    <!-- <td ng-if="user.status=='0'"><a href="" class="btn btn-success" ng-click="active(user.user_id)">Active</a></td>              
                    <td ng-if="user.status=='1'"><a href="" class="btn btn-danger" ng-click="active(user.user_id)">Inactive</a></td>   -->            
                    <td>
                        <a href="#/edit-user/{{user.user_id}}" class="btn btn-info">Edit</a> | 
                        <a href="" class="btn btn-danger" ng-click="deleteuser(user.user_id)">Delete</a>
                    </td>              
                </tr>
                
            </tbody>
        </table>
    </div>
</div>