<div class="container" ng-controller="LoginController">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
            <form ng-submit="login_form.$valid && loginForm()" name="login_form" novalidate="novalidate">
              <h4>Welcome login </h4>
              <input type="text" name="email" class="form-control input-sm chat-input" placeholder="email" ng-model="email" ng-pattern="/\S+@\S+\.\S+/" required autocomplete="off" />
              <span class="text-danger" ng-show="submitted && login_form.email.$invalid">
                <span ng-show="submitted && login_form.email.$error.required">Email is required.</span>
                <span ng-show="submitted && login_form.email.$error.pattern">Please enter valid email address.</span>
              </span>
              </br>
              <input type="password" name="pwd" class="form-control input-sm chat-input" placeholder="password" ng-model="pwd" ng-pattern="/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/" required ng-minlength="8" ng-maxlength="30" required autocomplete="off" />
              <span class="text-danger" ng-show="submitted && login_form.pwd.$invalid">
                <span ng-show="submitted && login_form.pwd.$error.required">Password is required.</span>
                <span ng-show="submitted && login_form.pwd.$error.pattern" class="error-msg"> Min 8 characters. Must contain alphabets, numbers, spl characters</span>
                <span ng-show="submitted && login_form.pwd.$error.maxlength"> Maximum 30 Characters Allowed</span>
                </span>
              </br>
              <div class="wrapper">
              <span class="group-btn">     
                  <button type="submit" class="btn btn-primary btn-md" ng-click="submitted=true">login </button>
              </span>
              <div class="group-btn">     
                  For new user click <a href="#/register" >Sign Up </a>
              </div>
              </form>
              </div>
            </div>
        </div>
    </div>
</div>