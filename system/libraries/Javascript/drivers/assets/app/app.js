var app = angular.module('testApp',['ngRoute','datatables']).
config(['$routeProvider', function($routeProvider) {
	
	$routeProvider.
	when('/', {templateUrl:BASE_URL+'home/landing'}).
	when('/register', {templateUrl:BASE_URL+'home/register'}).
	when('/simple-user', {templateUrl:BASE_URL+'home/simple_user'}).
	when('/edit-user/:id', {templateUrl:BASE_URL+'home/edit_user'}).
	when('/admin', {templateUrl:BASE_URL+'home/view_user'}).
	when('/routers', {templateUrl:BASE_URL+'home/view_routers'});	
}]);

app.controller('LoginController', ['$rootScope','$scope', '$http', function($rootScope,$scope,$http) {
	$scope.register = function() {
		 	//console.log($scope.reg);
		 	$scope.path = BASE_URL + 'register/';
		 	$http.post($scope.path, $scope.reg).success(function(data) {
		 		delete $scope.reg;
	            //console.log(data.message);
	            swal("Successfully!", data.message, "success");
	            window.location.href = '#/';
	        });
		 }
		 $scope.loginForm = function() {
		 	var datastr = $.param({
		 		email: $scope.email,
		 		pwd: $scope.pwd
		 	});
		//console.log(datastr);
		var config = {
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
			}
		}
		$http.post(BASE_URL+'login/', datastr, config).success(function(data, headers) {
			if (data.status==true) {
				if(data.user.user_type=='admin'){
					window.location.href = '#/admin';
				}
				else{
					window.location.href = '#/simple-user';
				}

			} else {
				swal("Failed !", "Please enter correct username and password", "error");
				$scope.errorMsg = "Username or password is incorrect";
			}
		})
		
	}
	
}]);
app.controller('UserViewController', ['$rootScope','$scope', '$http', function($rootScope,$scope, $http) {	
	var load = function() {
		$http.get(BASE_URL+'login/viewUsers/').success(function(data, headers) {
			$scope.users=data.data;
				//$scope.user_det=$rootScope.user;
			});
	}
	load();
	$scope.active = function(id) {
	    	//console.log(id);
	    	swal({
	    		title: "Are you sure?",
	    		text: "You want to update status",
	    		type: "warning",
	    		showCancelButton: true,
	    		cancelButtonText: "No, cancel !",
	    		confirmButtonColor: "#DD6B55",
	    		confirmButtonText: "Yes, Change it!",
	    		closeOnConfirm: false,
	    		closeOnCancel: false
	    	},
	    	function(isConfirm) {
	    		if (isConfirm) {
	    			$scope.path = BASE_URL + 'dashboard/changestatus/' + id;
	    			$http.post($scope.path).success(function(data) {

	    				load();
	    			});
	    			swal("Updated!", "Your Status Updated.", "success");
	                   // window.location.href = '#/admin';
	                   
	               } else {
	               	swal("Cancelled", "Your Status is safe :)", "error");
	               	window.location.href = '#/admin';
	               }
	           });
	    }

	    $scope.deleteuser = function(id) {
	    	console.log(id);
	    	swal({
	    		title: "Are you sure?",
	    		text: "You want to Delete User",
	    		type: "warning",
	    		showCancelButton: true,
	    		cancelButtonText: "Cancel !",
	    		confirmButtonColor: "#DD6B55",
	    		confirmButtonText: "Delete It !",
	    		closeOnConfirm: false,
	    		closeOnCancel: false
	    	},
	    	function(isConfirm) {
	    		if (isConfirm) {
	    			$scope.path = BASE_URL + 'dashboard/deleteuser/' + id;
	    			$http.delete($scope.path).success(function(data) {

	    				load();
	    			});
	    			swal("Updated!", "User Deleted Successfully", "success");
	                   // window.location.href = '#/admin';
	                   
	               } else {
	               	swal("Cancelled", "Your Status is safe :)", "error");
	               	window.location.href = '#/admin';
	               }
	           });
	    }
	    
	}]);

app.controller('IndexCtrl', function($location, $scope, $http, $rootScope) {
	var load = function() {
		$scope.path = BASE_URL + 'login/userdetails';
		$http.get($scope.path).success(function(data, headers) {
	            //console.log(data);
	            if (data.data) {
	            	$rootScope.user = data.data;
	                //console.log($rootScope.user)
	            } else {
	            	window.location.href = BASE_URL;
	            }
	        }).error(function(data, headers) {});
	};
	load();
	$scope.logout = function() {
		$scope.path = BASE_URL + 'login/logout';
		$http.get($scope.path, $scope.login).success(function(data, headers) {
	                //delete $rootScope.user;
	                window.location.href = BASE_URL;
	            })
		.error(function(data, headers) {
		});
	}
});

app.controller('UpdateUserCtrl', function($location, $scope, $http, $routeParams) {
	$user_id = $routeParams.id;
	$scope.path = BASE_URL + 'dashboard/getuserdetails/'+$user_id;
	$http.get($scope.path).success(function(data, headers) {
            //console.log(data);
            $scope.user=data;
        });
	$scope.updateuser = function() {
	    	//console.log($scope.user);
	    	$scope.path = BASE_URL + 'dashboard/updateUserDetails';
	    	$http.post($scope.path, $scope.user).success(function(data, headers) {
	    		swal("Updated!", "This User Details Updated.", "success");
	    		window.location.href = '#/admin';

	    	});
	    }
	});

// app.controller('RouterDetailsController', ['$rootScope','$scope', '$http', function($rootScope,DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder,$scope, $http) {	
// 		$http.get(BASE_URL+'routerDNS/allRouters/').success(function(data,status, headers,config) {
// 			$scope.routerDetails=data.data;
// 			angular.module('TestApp', ['TestApp.controllers','datatables']);
// 		});
// 			}]);
	
app.controller('routerDetailsController', function($scope,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder , $http) {
	$http.get(BASE_URL+'routerDNS/allRouters/').then(function(response) {
		console.log(response);
		$scope.routerDetails=response.data.data;
	});
	$scope.vm = {};
	$scope.vm.dtInstance = {};   
	//$scope.vm.dtColumnDefs = [DTColumnDefBuilder.newColumnDef(2).notSortable()];
	$scope.vm.dtOptions = DTOptionsBuilder.newOptions()
				  .withOption('paging', true)
				  .withOption('searching', true)
				  .withOption('info', true);
				//$scope.user_det=$rootScope.user;

	$scope.dnsDetails = function() {
		 	var datastr = $.param({
		 		dns_name: $scope.dns_name,
		 		host_name: $scope.host_name,
		 		client_ip_address: $scope.client_ip_address,
		 		mac_address: $scope.mac_address
		 	});
		console.log(datastr);
		var config = {
			headers : {
				'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
			}
		}
		$http.post(BASE_URL+'routerDNS/addRouterDetails/', datastr, config).success(function(data, headers) {
			if (data.status==true) {
				$http.get(BASE_URL+'routerDNS/allRouters/').then(function(response) {
				$scope.routerDetails=response.data.data;
					swal("Added!", "Your DNS Details Added Successfully.", "success");
				$('#myModal').modal('toggle');
				 $("#dns_details").trigger('reset');
				});
				

			} else {
				swal("Failed !", "Please enter correct details", "error");
				$scope.errorMsg = "Data is incorrect";
			}
		})
		
	}
	$scope.openModal= function(edit_data){
       $scope.dns=edit_data;
       $('#myeditModal').modal('show');  
		console.log($scope.dns);
    }
    $scope.editSaveDetails=function(){
	    $scope.path = BASE_URL + 'routerDNS/updateDetails/';
	    $http.put($scope.path, $scope.dns).success(function(data, headers) {
	    		swal("Updated!", "This User Details Updated.", "success");
	    		$('#myeditModal').modal('toggle');

	    	});
    }

	$scope.deleteRoute = function(id) {
    	//console.log(id);
    	swal({
    		title: "Are you sure?",
    		text: "You want to Delete data",
    		type: "warning",
    		showCancelButton: true,
    		cancelButtonText: " cancel !",
    		confirmButtonColor: "#DD6B55",
    		confirmButtonText: " Delete it!",
    		closeOnConfirm: false,
    		closeOnCancel: false
    	},
    		function(isConfirm) {
    		if (isConfirm) {
    			$scope.path = BASE_URL + 'routerDNS/deleteRouter/' + id;
    			$http.delete($scope.path).success(function(data) {
    			if(data.Status_code="200"){
    				$http.get(BASE_URL+'routerDNS/allRouters/').then(function(response) {
						$scope.routerDetails=response.data.data;
					});	
    				swal("Deleted!", "Your Records Deleted.", "success");
    			}else{
					swal("Failed !", "Somthing went wrong.", "error");
    			}
    			});
                   
               } else {
               	swal("Cancelled", "Your Status is safe :)", "error");
               	window.location.href = '#/routers';
               }
           });
    }
});

