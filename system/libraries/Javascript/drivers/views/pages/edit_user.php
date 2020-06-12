<div ng-controller="IndexCtrl" class="container">
	<span style="float: right;">
		{{user.first_name+' '+user.last_name}} <a href="" ng-click="logout()" >logout</a>
	</span>
	<div ng-controller="UpdateUserCtrl" >
		<h2 style="color: blue">User Management</h2>
		<h3>Edit User</h3>
		<form class="form-horizontal" id="edit-form" ng-submit="edit_user.$valid && updateuser()" name="edit_user" novalidate="novalidate">
			
			<div class="modal-body">
				<input type="hidden" id="edit-id" value="" class="hidden" ng-model="user.user_id">
				<div class="form-group">
					<label for="firstname" class="col-sm-2 control-label">First name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="firstname" name="first_name" placeholder="First Name" ng-model="user.first_name" ng-minlength="2" required ng-pattern="/^[a-zA-Z]*$/" autocomplete="off">
						<span class="text-danger" ng-show="submitted && edit_user.first_name.$invalid">
							<span ng-show="submitted && edit_user.first_name.$error.required" >First name is required.</span>
							<span ng-show="submitted && !edit_user.first_name.$error.minlength && edit_user.first_name.$error.pattern">Please enter a string.</span>
							<span ng-show="submitted &&  edit_user.first_name.$error.minlength" >First name must be min 2 char.</span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="lastname" class="col-sm-2 control-label">Last name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="lastname" name="last_name" placeholder="Last Name" ng-model="user.last_name" ng-pattern="/^[a-zA-Z]*$/" required autocomplete="off">
						<span class="text-danger" ng-show="submitted && edit_user.last_name.$invalid">
							<span ng-show="submitted && edit_user.last_name.$error.required" >last name is required.</span>
							<span ng-show="submitted && !edit_user.last_name.$error.minlength && edit_user.last_name.$error.pattern">Please enter a string.</span>
							<span ng-show="submitted &&  edit_user.last_name.$error.minlength" >last name must be min 2 char.</span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">E-mail</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="E-mail address" ng-model="user.user_email" ng-pattern="/\S+@\S+\.\S+/" required autocomplete="off">
						<span class="text-danger" ng-show="submitted && edit_user.email.$invalid">
							<span ng-show="submitted && edit_user.email.$error.required">Email is required.</span>
							<span ng-show="submitted && edit_user.email.$error.pattern">Please enter valid email address.</span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="Password" class="col-sm-2 control-label">New Password</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="user_pwd" name="user_pwd" placeholder="New Password" ng-model="user.password" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/"  ng-minlength="8" ng-maxlength="30"  autocomplete="off">
						<span class="text-danger" ng-show="submitted && edit_user.user_pwd.$invalid">
							<span ng-show="submitted && edit_user.user_pwd.$error.pattern" class="error-msg"> Min 8 characters. Must contain alphabets, numbers, spl characters</span>
							<span ng-show="submitted && edit_user.user_pwd.$error.maxlength"> Maximum 30 Characters Allowed</span>
						</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#/admin" class="btn btn-default" >Cancel</a>
				<button type="submit" class="btn btn-primary" ng-click="submitted=true">Save changes</button>
			</div>
		</form>
	</div>
</div>