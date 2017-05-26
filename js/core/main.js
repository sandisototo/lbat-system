angular.module('starterApp', ['login', 'admin', 'payments', , 'messages', 'members'])
.run(function($log){
  $log.debug('MyApp is ready!')
})
.factory('MainFactory', ['$window', function($window) {
  console.debug('MainFactory Running')
  return {

  }
}])
.controller('MainController', ['$scope', '$window', function($scope, $window) {
  console.debug('MainController Running')
  $scope.isActivePath = (viewLocation) => viewLocation === $window.location.href.substr(window.location.href.lastIndexOf('/') + 1)
}])
.service('SharedProperties', function () {
  const enviroment = 'dev'
  let url_link   = {}
  if (enviroment === 'dev') {
    url_link   = { link: 'http://localhost/lbat/' }
  }else{
    url_link  =  { link: 'http://fintechrewards.co.za/' }
  }
  return url_link
})
