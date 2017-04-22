angular.module("login",['register', 'toastr'])
.controller("LoginController", ['$http', '$scope', '$window', 'SharedProperties', 'toastr' , function($http, $scope,$window, SharedProperties, toastr){

  $scope.user = {};
  $scope.DisplayToast = function(result,title,message) {
        result(message, title,{
          'extendedTimeOut': '2000',
          'closeButton': 'true',
          'progressBar': 'true',
          'positionClass': 'toast-bottom-left'
        });
    };



	$scope.login = function(){
	 $scope.failed = false;
	 $scope.success = false;
	 $http({
   method  : 'POST',
   url     : SharedProperties.link+'login/validate_user',
   data    : $.param($scope.user),  // pass in data as strings
   headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
  })
   .success(function(data) {

     if (data.value == "notFound") {

       // if not successful, bind errors to error variables
       $scope.errorMessage = "User Not Found! Please try again";
       $scope.DisplayToast(toastr.error, "Error", $scope.errorMessage);
     } else {
       // if successful, bind success message to message
       if(!data.is_helper){
         $window.location.href = SharedProperties.link +'helper';
       }else{
         $window.location.href = SharedProperties.link +'site';
       }
       $scope.errorMessage = "Log in successful!";
       $scope.DisplayToast(toastr.success, "Success", $scope.errorMessage);
			 //$window.location.href = SharedProperties.link +'/helper';
     }
   });
	};

  $scope.admin = {};

  $scope.admin_login = function(admin){

   $http({
   method  : 'POST',
   url     : SharedProperties.link+'login/validate_admin',
   data    : $.param(admin),  // pass in data as strings
   headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
  })
   .success(function(data) {

     if (data.value == "notFound") {

       // if not successful, bind errors to error variables
       $scope.errorMessage = "Admin Not Found!";
        $scope.DisplayToast(toastr.error, "Error", $scope.errorMessage);
     } else {
          $scope.errorMessage = "Log in successful!";
          $scope.DisplayToast(toastr.success, "Success", $scope.errorMessage);
         $window.location.href = SharedProperties.link +'admin';

     }
   });
  };
  $scope.getter_count = 0;
  $scope.helper_count = 0;
  $scope.reward_count = 0;

  $scope.get_helper_count = function(){
   $http.get(SharedProperties.link +'site/get_helper_count')
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

   $http.get(SharedProperties.link +'site/get_getter_count')
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

   $http.get(SharedProperties.link +'site/get_my_reward_count')
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
      $window.location.href = SharedProperties.link +'helper';
  };

  $scope.getter_redirect = function(){
      $window.location.href = SharedProperties.link +'getter';
  };

	}]);
