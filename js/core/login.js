angular.module("login",['register','toastr'])
.controller("LoginController", ['$http', '$scope', '$window', 'toastr', 'baseUrl', 'validateFactory', 'exrasFactory',
  function($http, $scope, $window, toastr, baseUrl, validateFactory, exrasFactory) {
    $scope.user = {}

    // Login User
  	$scope.login = () => {
    	$scope.failed = false
    	$scope.success = false
      validateFactory.validateUser($scope.user)
      .then((response) => response.data)
      .then((data) => {
        if (!data.user) {
          $scope.errorMessage = "User Not Found! Please try again"
          exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
          return
        }

        $window.location.href = `${baseUrl}site`
       },
       (error) => {
         $scope.errorMessage = "Sorry we coudn't process this request! Please try again later"
         exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
       })
  	}

    $scope.admin = {}
    // Login Admin
    $scope.admin_login = (admin) => {
      validateFactory.validateAdmin(admin)
      .then((response) => response.data)
      .then((data) => {
        if (!data.admin) {
          $scope.errorMessage = "Admin Not Found! Please try again"
          exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
        }

        $window.location.href = `${baseUrl}admin`
       },
       (error) => {
         $scope.errorMessage = "Sorry we coudn't process this request! Please try again later"
         exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
       })
    };

    $scope.total_member_count = 0;
    $scope.total_active_member_count = 0;
    $scope.lapsed_member_count = 0;

    $scope.get_helper_count = function(){
     $http.get(`${baseUrl}`)
     .success(function(data) {
       if (!data.status) {
         // if not successful, bind errors to error variables
         $scope.errorMessage = data.message;
         console.log($scope.errorMessage);
       } else {

         $scope.helper_count = data.count;
         console.log($scope.helper_count);

       }
     });
    };

    $scope.get_getter_count = function(){

     $http.get(`${baseUrl}`)
     .success(function(data) {

       if (!data.status) {
         // if not successful, bind errors to error variables
         $scope.errorMessage = data.message;
         console.log($scope.errorMessage);
       } else {

         $scope.getter_count = data.count;
         console.log($scope.getter_count);
       }
     });
    };

    $scope.get_my_reward_count = function(){

     $http.get(`${baseUrl}`)
     .success(function(data) {

       if (!data.status) {
         // if not successful, bind errors to error variables
         $scope.errorMessage = data.message;
         console.log($scope.errorMessage);
       } else {

         $scope.reward_count = data.count;
         console.log($scope.reward_count);
       }
     });
    };

    $scope.get_getter_count();
    $scope.get_helper_count();
    $scope.get_my_reward_count();

    $scope.helper_redirect = function(){
        $window.location.href = `${baseUrl}`;
    };

    $scope.getter_redirect = function(){
        $window.location.href = `${baseUrl}`;
    };

  	}
  ]);
