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
  membersFactory.getMember = (id) => $http.get(`${baseUrl}members/get/${id}`)
  membersFactory.getAllMembers = () => $http.get(`${baseUrl}members/all`)
  membersFactory.editMember = (member) => $http.post(`${baseUrl}members/edit`, $.param(member), headers)
  membersFactory.addMember = (member) => $http.post(`${baseUrl}members/add`, $.param(member), headers)
  membersFactory.addDepandant = (depandant) => $http.post(`${baseUrl}members/add_depandant`, $.param(depandant), headers)
  membersFactory.getDepandants = (id) => $http.get(`${baseUrl}members/get_depandants/${id}`)
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
.controller('MainController', ['$scope', '$window', 'baseUrl',
  function($scope, $window, baseUrl) {
    console.debug('MainController Running')
    $scope.isActivePath = (viewLocation) => viewLocation === $window.location.href.substr(window.location.href.lastIndexOf('/') + 1)
    $scope.redirect = (route) => $window.location.href = `${baseUrl}${route}`
    $scope.formatDate = (date) => new Date(date)
  }
])
