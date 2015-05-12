var anModule= angular.module("anGet",[]);//开始
//获取json数据赋值给指令
anModule.controller("getCtrl",["$scope","$http",function($scope,$http){

	$http({
		method: 'GET',
		url: 'api/get.php'
	}).success(function(data, status, headers, config) {
		console.log("success...");
		console.log(data);
		$scope.lists=data;
	}).error(function(data, status, headers, config) {
		console.log("error...");
	});

}]);



