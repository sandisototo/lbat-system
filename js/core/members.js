angular.module("members",['toastr','datatables', 'cgBusy'])
.controller("MembersController", ['$http', '$scope', '$window', 'SharedProperties', 'toastr', 'MainFactory', function($http, $scope,$window, SharedProperties, toastr, mainFactory){
  console.debug('<----Members Controller----->')

  $scope.all_user_count = 0
  $scope.loading_message = 'Please wait....'
	$scope.get_all_users = () => {
		 $scope.usersPromise = $http.get(`${SharedProperties.link}payments/get_all_users`)
		.success(function (data) {
			$scope.all_users = data
			$scope.all_user_count = $scope.all_users.length
		})
		.error(function (data, status) {
			console.log('status-->', status)
		})
	}
  $scope.get_all_users()
 }])
