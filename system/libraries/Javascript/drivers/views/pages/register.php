<div class="container" ng-controller="LoginController">
  <div class="row">
    <div class="col-md-offset-5 col-md-3">
      <div class="form-login">
        <form ng-submit="signup_form.$valid && register()" name="signup_form" novalidate="novalidate">
          <h4>User Register </h4>
          <input type="text" name="first_name" class="form-control input-sm chat-input" placeholder="First name" ng-model="reg.first_name"  ng-minlength="2" required ng-pattern="/^[a-zA-Z]*$/" autocomplete="off"/>
          <span class="text-danger" ng-show="submitted && signup_form.first_name.$invalid">
            <span ng-show="submitted && signup_form.first_name.$error.required" >First name is required.</span>
            <span ng-show="submitted && !signup_form.first_name.$error.minlength && signup_form.first_name.$error.pattern">Please enter a string.</span>
            <span ng-show="submitted &&  signup_form.first_name.$error.minlength" >First name must be min 2 char.</span>
          </span>
        </br>

        <input type="text" name="last_name" class="form-control input-sm chat-input" placeholder="Last name" ng-model="reg.last_name" ng-pattern="/^[a-zA-Z]*$/" required autocomplete="off" />
        <span class="text-danger" ng-show="submitted && signup_form.last_name.$invalid">
          <span ng-show="submitted && signup_form.last_name.$error.required" >last name is required.</span>
          <span ng-show="submitted && !signup_form.last_name.$error.minlength && signup_form.last_name.$error.pattern">Please enter a string.</span>
          <span ng-show="submitted &&  signup_form.last_name.$error.minlength" >last name must be min 2 char.</span>
        </span>
      </br>

      <input type="text" name="email" class="form-control input-sm chat-input" placeholder="email" ng-model="reg.email"  ng-pattern="/\S+@\S+\.\S+/" required autocomplete="off" />
      <span class="text-danger" ng-show="submitted && signup_form.email.$invalid">
        <span ng-show="submitted && signup_form.email.$error.required">Email is required.</span>
        <span ng-show="submitted && signup_form.email.$error.pattern">Please enter valid email address.</span>
      </span>
    </br>

    <input type="password" name="user_pwd" id="pass" class="form-control input-sm chat-input" placeholder="password" ng-model="reg.user_pwd" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/" required ng-minlength="8" ng-maxlength="30" required autocomplete="off" />
    <span class="text-danger" ng-show="submitted && signup_form.user_pwd.$invalid">
      <span ng-show="submitted && signup_form.user_pwd.$error.required">Password is required.</span>
      <span ng-show="submitted && signup_form.user_pwd.$error.pattern" class="error-msg"> Min 8 characters. Must contain alphabets, numbers, spl characters</span>
      <span ng-show="submitted && signup_form.user_pwd.$error.maxlength"> Maximum 30 Characters Allowed</span>
    </span>
  </br>

  <input type="password" id="pass" name="confirm_pwd" class="form-control input-sm chat-input" placeholder="Confirm password" ng-model="conform_pwd" required ng-pattern="user_pwd"/>
  <span class="text-danger" ng-show="submitted && signup_form.confirm_pwd.$invalid">
    <span ng-show="submitted && signup_form.confirm_pwd.$error.required">Confirm Password is required.</span>
    <span ng-show="submitted && signup_form.confirm_pwd.$error.pattern">Passwords have to match!</span>
  </span>
</br>

<div class="wrapper">
  <span class="group-btn">  
    
    <input type="submit" value="Sign Up" class="btn btn-primary btn-md" ng-click="submitted=true">
  </span>
  <div class="group-btn">     
    If you are already register. <a href="#/" >Login </a>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>