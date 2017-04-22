angular.module("getter",[])
.controller("getterController", ['$http', '$scope', '$window', 'SharedProperties', function($http, $scope,$window, SharedProperties){
  $scope.new_content =[];
  $scope.pending_content =[];
  $scope.paid_content =[];
  $scope.over_due_content =[];
  $scope.get_all_transactions = function () {
       $http.get(SharedProperties.link +'getter/get_all_transactions')
      .success(function (data) {
          $scope.all_transactions = data;
          angular.forEach($scope.all_transactions, function(value, key) {
            if(value.status == 0){
              $scope.new_content.push(value);
            }else if(value.status == 1){
              $scope.pending_content.push(value);
            }else if(value.status == 2){
              $scope.paid_content.push(value);
            }else if(value.status == 3){
              $scope.over_due_content.push(value);
            }

          });

      })
      .error(function (data, status) {
        console.log(data);
        console.log(status);
      });
  };
  $scope.get_all_transactions();


  $scope.update_transaction = function(transaction){
   //console.log(transaction); return false;
    var params = {
          helper_id : transaction.id,
          transaction_id:transaction.transaction_id,
    };

    $http({
    method  : 'POST',
    url     : SharedProperties.link+'getter/update_transaction',
    data    : $.param(params),  // pass in data as strings
    headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
   })
    .success(function(data) {
        console.log(data);
      if (!data.status) {
        // if not successful, bind errors to error variables
        $scope.errorMessage = "Server Error!";
        console.log($scope.errorMessage);
      } else {
        // if successful, bind success message to message
        $window.location.href = SharedProperties.link +'getter';
      }
    })
    .error(function (data, status) {

      console.log(status);
    });
  };
}]);
