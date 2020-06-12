angular.module('routeService',['ngResource'])
	.factory('Route',function($resource){
		return $resource('json/urls.json');
	});