angular.module("login",['register','toastr'])
.controller("LoginController", ['$http', '$scope', '$window', 'toastr', 'baseUrl', 'validateFactory', 'exrasFactory', 'statsFactory',
  function($http, $scope, $window, toastr, baseUrl, validateFactory, exrasFactory, statsFactory) {
    // Login User
    $scope.user = {}

  	$scope.login = () => {
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


    // Login Admin
    $scope.admin = {}

    $scope.admin_login = () => {
      validateFactory.validateAdmin($scope.admin)
      .then((response) => response.data)
      .then((data) => {
        if (!data.user) {
          $scope.errorMessage = "Admin Not Found! Please try again"
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

    $scope.getStats = () => {
      statsFactory.all()
      .then((response) => response.data)
      .then((data) => {
        if (!data) {
          $scope.errorMessage = "Report failed to load! Please reload the page again"
          exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
          return
        }

        done(data)
       },
       (error) => {
         $scope.errorMessage = "Sorry we coudn't return the lates STATISTICS! Please try again later"
         exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
       })
    }
    $scope.getStats()
    let done = (data) => {
      $scope.total_member_count = data.total_member_count
      $scope.total_active_member_count = data.total_active_member_count
      $scope.lapsed_member_count = data.lapsed_member_count
      $scope.total_due_count = data.total_due_count
      $scope.total_paid_count = data.total_paid_count
      $scope.missed_last_month_count = data.missed_last_month_count
    }
  }
]);
