angular.module('starterApp', ['login', 'admin', 'payments', , 'messages', 'members'])
.run(function($log){
  $log.debug('MyApp is ready!')
})
.provider('baseUrl', function () {
  const enviroment = 'dev'
  this.$get = () => enviroment === 'dev' ? 'http://localhost/lbat/' : 'http://fintechrewards.co.za/'
})
.provider('headers', function () {
    this.$get = () => {
        return { headers :{ 'Content-Type': 'application/x-www-form-urlencoded' }}
    }
})
.factory('validateFactory', ['$http', 'baseUrl', 'headers', function($http, baseUrl, headers) {
  console.debug('validateFactory Running')
  let validateFactory = {}

  validateFactory.validateUser = (user) => $http.post(`${baseUrl}login/validate_user`, $.param(user), headers)
  validateFactory.validateAdmin = (admin) => $http.post(`${baseUrl}login/validate_admin`, $.param(admin), headers)
  return validateFactory
}])
.factory('membersFactory', ['$http', 'baseUrl', 'headers', function($http, baseUrl, headers) {
  console.debug('membersFactory Running')
  let membersFactory = {}

  membersFactory.getAllMembers = () => $http.get(`${baseUrl}members/all`)
  membersFactory.editMember = (member) => $http.post(`${baseUrl}members/edit`, $.param(member), headers)
  return membersFactory
}])
.factory('exrasFactory', ['$http', 'toastr', function($http, toastr) {
  console.debug('exrasFactory Running')
  let exrasFactory = {}
  // DisplayToast
  exrasFactory.displayToast = (result,title,message) => {
    result(message, title,{
      'extendedTimeOut': '2000',
      'closeButton': 'true',
      'progressBar': 'true',
      'positionClass': 'toast-bottom-left'
    })
  }
  return exrasFactory
}])

.controller('MainController', ['$scope', '$window', function($scope, $window) {
  console.debug('MainController Running')
  $scope.isActivePath = (viewLocation) => viewLocation === $window.location.href.substr(window.location.href.lastIndexOf('/') + 1)
}])
