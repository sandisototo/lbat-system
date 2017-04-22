angular.module("register", ['ui.bootstrap','toastr'])
.controller("RegisterController", ['$http', '$scope', '$location','$window', 'SharedProperties','toastr',function($http, $scope,$location, $window, SharedProperties,toastr){
  $scope.banks = [
      {
          name: 'ABSA Bank',
          code: 632005
      },
      {
          name: 'Capitec Bank',
          code: 470010
      },
      {
          name: 'FNB',
          code: 250655
      },
      {
          name: 'Nedbank',
          code: 198765
      },
      {
          name: 'Standard Bank',
          code: 051001
      },
      {
          name: 'SA Post Bank (Post Office)',
          code: 460005
      }

  ];
   $scope.DisplayToast = function(result,title,message) {
        result(message, title,{
          'extendedTimeOut': '2000',
          'closeButton': 'true',
          'progressBar': 'true',
          'positionClass': 'toast-bottom-left'
        });
    };

  $scope.selected = { name: $scope.banks[0].name, code: $scope.banks[0].code};
  $scope.check =function(selected,banks){
      var i = null;
      for(i in banks){
          if(banks[i].code == selected.code){
              return banks[i];
          }
      }
  };
  $scope.setBank= function(bank){
     $scope.bank_name = bank.name;
     $scope.bank_code = bank.code;
 };
   $scope.user = {};

///gender
  $scope.radioModel = 'Male';

  $scope.checkModel = {
    Male: false,
    Female: true,

  };

  $scope.checkResults = [];

  $scope.$watchCollection('checkModel', function () {
    $scope.checkResults = [];
    angular.forEach($scope.checkModel, function (value, key) {
      if (value) {
        $scope.checkResults.push(key);
      }
    });
  });
  //account
  $scope.radioModelacc = 'Savings';

  $scope.checkModelacc = {
    Check: false,
    Savings: true,
    Credit:false,

  };

  $scope.checkResultsacc = [];

  $scope.$watchCollection('checkModelacc', function () {
    $scope.checkResultsacc = [];
    angular.forEach($scope.checkModelacc, function (value, key) {
      if (value) {
        $scope.checkResultsacc.push(key);
      }
    });
  });

     
 $scope.register = function(){
  var user_deatials = {
                  name: $scope.user.name,
                  surname: $scope.user.surname,
                  cell_number: $scope.user.cell_number,
                  refferal_number: $scope.user.refferal_number,
                  password: $scope.user.password,
                  username: $scope.user.username,
                  email:$scope.user.email,
                  account_type:$scope.radioModelacc,
                  account_holder:$scope.user.account_holder,
                  account_number: $scope.user.account_number,
                  gender:$scope.radioModel,
                  bank_name:$scope.user.selectedBank.name,
                  bank_code:$scope.user.selectedBank.code
              };
   
  $http({
   method  : 'POST',
   url     : SharedProperties.link+'user/register_user',
   data    : $.param(user_deatials),  // pass in data as strings
   headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
  })
   .success(function(data) {
     if (!data) {
       // if not successful, bind errors to error variables
       $scope.errorMessage = "User Not Registered!";
       $scope.DisplayToast(toastr.error, "Error", $scope.errorMessage);

     } else {
       // if successful, bind success message to message
       $scope.errorMessage = "You are Succesfully Registered !";

       $window.location.href = SharedProperties.link +'login';
       $scope.DisplayToast(toastr.success, "Please Login", $scope.errorMessage);


     }
   });

  


  };


  }]);
