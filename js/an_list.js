var anModule= angular.module("anList",[]);//开始
//获取json数据赋值给指令
anModule.controller("listCtrl",["$scope","$http",function($scope,$http){

	$http({
		method: 'GET',
		url: 'api/api.php'
	}).success(function(data, status, headers, config) {
		console.log("success...");
		console.log(data);
		$scope.lists=data;
	}).error(function(data, status, headers, config) {
		console.log("error...");
	});

}]);



