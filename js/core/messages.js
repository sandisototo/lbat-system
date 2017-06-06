angular.module("messages",['toastr'])
.controller("MessagesController", ['$http', '$scope', '$window', 'toastr', '$filter', 'baseUrl',
  function($http, $scope,$window, toastr, $filter, baseUrl){
    console.debug('<----Messages Controller----->')
    $scope.send_to_all
    $scope.char_counter = 160
    $scope.message
    
    // Please remember to put these in a factory
    $scope.get_all_users = () => {
      $http.get(`${baseUrl}payments/get_all_users`)
      .success(function (data) {
        $scope.all_users = data
        $scope.all_user_count = $scope.all_users.length
      })
      .error(function (data, status) {
        console.log('status-->', status)
      })
    }
    $scope.DisplayToast = (result, title, message) => {
  		result(message, title,{
  		'extendedTimeOut': '2000',
  		'closeButton': 'true',
  		'progressBar': 'true',
  		'positionClass': 'toast-bottom-left'
  		})
    }
    $scope.get_all_users()
    $scope.sendBroadCustMassage = (message, send_to_all) => {
      if (send_to_all && !!message) {
        const users = angular.fromJson($scope.all_users)
        $scope.sendBroadCustMassageToAll(users, message)
      }
    }
    $scope.sendBroadCustMassageToAll = (users, message) => {
      const userWithContacts = $filter('filter')(users, (user) =>
      user.cell_number !== ''
      && user.cell_number.replace(/\s/g, '').length === 9
      || user.cell_number.replace(/\s/g, '').length === 10
    )
    // To Contact List (recipient )
    let recipients = []
    angular.forEach(userWithContacts, function(user, key) {
            if (user.cell_number.replace(/\s/g, '').length === 9 ) {
              user.cell_number = `27${user.cell_number}`
            }
            if(user.cell_number.charAt(0) === '0') {
              user.cell_number = user.cell_number.replace('0', '27')
            }
            recipients.push(user.cell_number)
     })

     // Construct SMS
     let sms = {
       messages: [{
           from: 'Luvuyo Burial Society',
           to: recipients,
  		     text : message
          }]
     }

     $http({
        method  : 'POST',
        url     : 'http://api.infobip.com/sms/1/text/multi',
        data    : sms,  // pass in data as strings
        headers : {
          'Authorization': 'Basic U3RvdG93ZWI6U2FuZGlzb1QwNTA0',
          'Content-Type': 'application/json',
          'Accept': 'application/json',
         }, // set the headers so angular passing info as form data (not request payload)
        })
        .then((response) => {
          console.log('response--->', response)
          $scope.errorMessage = 'A broadcust message was sent successfully!'
          $scope.DisplayToast(toastr.success, 'Success', $scope.errorMessage)
          //$window.location.href = `${SharedProperties.link}messages`)
        },
        (error) => {
          console.log('error--->', error)
          $scope.errorMessage = 'Couldnt send a broadcust message!'
          $scope.DisplayToast(toastr.error, 'Error', $scope.errorMessage)
        })
      }
   }
 ])
