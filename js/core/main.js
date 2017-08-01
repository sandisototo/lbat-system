angular.module('starterApp', ['login', 'admin', 'payments', , 'messages', 'members'])
.run(function($log){
  $log.debug('MyApp is ready!')
})
.provider('baseUrl', function () {
  const enviroment = 'live'
  this.$get = () => $('body').attr('data-base') //enviroment === 'dev' ? 'http://localhost/lbat/' : 'http://demo.luvuyoburial.co.za/'
})
.provider('headers', function () {
    this.$get = () => {
        return { headers :{ 'Content-Type': 'application/x-www-form-urlencoded'}}
    }
})
.provider('Uploadheader', function () {
    this.$get = () => {
        return {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         }
    }
})
.directive('number', function() {
  const regex = /^(\d+)$/
  return {
    require: 'ngModel',
    link: function(scope, el, attrs, ctrl) {

      ctrl.$validators.number = (modelValue, viewValue) =>{
        
        if( typeof viewValue !== 'undefined' && viewValue !=''){
            let inputName   = $("input[name='"+el[0].name+"']" )
            if ( !regex.test(viewValue) ) {
                let val = viewValue.match(/\d+/)
                inputName.val(val)
               return false
              } else {
                return true
              }

        }
      }
    }
  }
})
.directive('maxlength', function() {
  const regex = /^(\d+)$/
  return {
    require: 'ngModel',
    scope:{
      accept:"="
    },
    link: function(scope, el, attrs, ctrl) {
     
      ctrl.$validators.maxlength = (modelValue, viewValue) =>{
        
        if( typeof viewValue !== 'undefined' && viewValue !=''){
            let inputName   = $("input[name='"+el[0].name+"']" )
          
            if ( viewValue.length > parseInt(scope.accept) ) {
              let val = inputName.val().slice(0, parseInt(scope.accept))
              inputName.val(val)
              return false
            } else {
              return true
            }
        }
      }
    }
  }
})
.directive('string', function() {
  const regex = /^[a-zA-Z()]+$/
  return {
    require: 'ngModel',
    link: function(scope, el, attrs, ctrl) {

      ctrl.$validators.string = (modelValue, viewValue) =>{
        
        if( typeof viewValue !== 'undefined' && viewValue !=''){
            let inputName   = $("input[name='"+el[0].name+"']" )
            if ( !regex.test(viewValue) ) {
              let val = viewValue.match(/[a-zA-Z]+/g)
              inputName.val(val)
              return false
            } else {
              return true
            }

        }
      }
    }
  }
})

.factory('validateFactory', ['$http', 'baseUrl', 'headers', function($http, baseUrl, headers) {
  console.debug('validateFactory Running')
  let validateFactory = {}

  validateFactory.validateUser = (user) => $http.post(`${baseUrl}login/validate_user`, $.param(user), headers)
  validateFactory.validateAdmin = (admin) => $http.post(`${baseUrl}login/validate_admin`, $.param(admin), headers)
  return validateFactory
}])
.factory('membersFactory', ['$http', 'baseUrl', 'headers','Uploadheader', function($http, baseUrl, headers, Uploadheader) {
  console.debug('membersFactory Running')
  let membersFactory = {}
  membersFactory.getMember = (id) => $http.get(`${baseUrl}members/get/${id}`)
  membersFactory.getAllMembers = () => $http.get(`${baseUrl}members/all`)
  membersFactory.editMember = (member) => $http.post(`${baseUrl}members/edit`, member,Uploadheader)
  membersFactory.editDepandant = (depandant) => $http.post(`${baseUrl}members/edit_depandant`, $.param(depandant), headers)
  membersFactory.addMember = (member) => $http.post(`${baseUrl}members/add`, member, Uploadheader )
  membersFactory.addDepandant = (depandant) => $http.post(`${baseUrl}members/add_depandant`, $.param(depandant), headers)
  membersFactory.getDepandants = (id) => $http.get(`${baseUrl}members/get_depandants/${id}`)
  membersFactory.removeMember = (id) => $http.get(`${baseUrl}members/remove/${id}`)
  membersFactory.removeDepandant = (member_id, depandant_id) => $http.get(`${baseUrl}members/remove_depandant/${member_id}/${depandant_id}`)
  return membersFactory
}])
.factory('paymentsFactory', ['$http', 'baseUrl', 'headers', function($http, baseUrl, headers) {
  console.debug('membersFactory Running')
  let paymentsFactory = {}
  paymentsFactory.getUnpaidMembers = () => $http.get(`${baseUrl}payments/unpaid`)
  paymentsFactory.getPaidMembers = () => $http.get(`${baseUrl}payments/paid`)
  paymentsFactory.getLapsedMembers = () => $http.get(`${baseUrl}payments/lapsed`)
  paymentsFactory.getPaymentsHistory = (id) => $http.get(`${baseUrl}payments/get_history/${id}`)
  paymentsFactory.loadPayment = (payment) => $http.post(`${baseUrl}payments/load_payment`, $.param(payment), headers)
  paymentsFactory.revertPayment = (member_id, payment_id, timestamp) => $http.get(`${baseUrl}payments/revert_payment/${member_id}/${payment_id}/${timestamp}`)
  paymentsFactory.paidForThisMonth = (confirmedPaidMembers) => {
    let paid_members = angular.toJson(confirmedPaidMembers)
    let objectToSerialize = { paid_members }
    return $http.post(`${baseUrl}payments/paid_for_this_month`, $.param(objectToSerialize), headers)
  }
  return paymentsFactory
}])
.factory('exrasFactory', ['toastr', function(toastr) {
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
  exrasFactory.dob = (id_number) => {
    // get first 6 digits as a valid date
   let tempDate = new Date(id_number.substring(0, 2), id_number.substring(2, 4), id_number.substring(4, 6))

   let id_date = tempDate.getDate()
   let id_month = moment.months(tempDate.getMonth() - 1)
   let id_year = tempDate.getFullYear()
   return `${id_date} ${id_month} ${id_year}`
  }
  return exrasFactory
}])
.factory('statsFactory', ['$http', 'baseUrl', function($http, baseUrl) {
  console.debug('statsFactory Running')
  let statsFactory = {}
  // get all statistics
  statsFactory.all = () => $http.get(`${baseUrl}stats/all`)
  return statsFactory
}])
.controller('MainController', ['$scope', '$window', 'baseUrl',
  function($scope, $window, baseUrl) {
    console.debug('MainController Running')
    $scope.isActivePath = (viewLocation) => viewLocation === $window.location.href.substr(window.location.href.lastIndexOf('/') + 1)
    $scope.redirect = (route) => $window.location.href = `${baseUrl}${route}`
    $scope.formatDate = (date) => new Date(date)
    // Dates
    $scope.currentMonth = moment().format('MMMM')
    $scope.currentYear = moment().format('YYYY')
    $scope.previousMonth = moment().subtract(1, 'months').format('MMMM')

    //print
    $scope.print = () => window.print()
  }
])
