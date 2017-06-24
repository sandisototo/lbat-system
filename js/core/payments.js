angular.module("payments",['toastr','datatables'])
.controller("PaymentsController", ['$http', '$scope', '$window', '$filter', 'toastr', 'exrasFactory', 'paymentsFactory',
function ($http, $scope, $window, $filter, toastr, exrasFactory, paymentsFactory) {
  console.debug('<----Payments Controller----->')
  $scope.currentPage = 0
  $scope.pageSize = 15
  $scope.q = ''
  $scope.all_members_count  = 0
  $scope.loading_message = "Updating...."

  $scope.getUnpaidMembers = () => {
		 $scope.usersPromise = paymentsFactory.getUnpaidMembers()
     .then((response) => response.data)
     .then((data) => {
       if (!data) {
         // exrasFactory.displayToast(toastr.error, "Error", "Members Not Found! Please try again later")
         return
       }

       done(data)
      },
      (error) => {
        exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
	}

  $scope.getPaidMembers = () => {
     $scope.paidPromise = paymentsFactory.getPaidMembers()
     .then((response) => response.data)
     .then((data) => {
       if (!data) {
         return
       }

       paid_done(data)
      },
      (error) => {
        exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }

  $scope.getUnpaidMembers()
  $scope.getPaidMembers()

  let done = (data) => {
    $scope.all_members = data
    $scope.all_members_count = data.length
  }

  let paid_done = (data) => {
    $scope.all_paid_members = data
    $scope.all_paid_members_counter = data.length
  }

  // Selected paid members
  $scope.selectedAsPaidMembers = []
  // Paid members
  $scope.paidMembers = []

  // Toggle selection for a given user by id
  $scope.togglePaidSelection = (member) => {
    let user_index = $scope.paidMembers.indexOf(member);

    // Is currently selected
    if (user_index > -1) {
      $scope.paidMembers.splice(user_index, 1)
    } else {
       $scope.paidMembers.push(member)
    }
   }

   $scope.confirmedPaidMembers= []

   $scope.$watchCollection('confirmedPaidMembers', (newIds, oldIds) => {
    angular.forEach(newIds, (member, key) => {
        $scope.all_members.splice($scope.all_members.indexOf(member), 1)
    })

    if ($scope.confirmedPaidMembers.length !== 0) {
      $scope.usersPromise = paymentsFactory.paidForThisMonth($scope.confirmedPaidMembers)
      .then((response) => response.data)
      .then((data) => {
        if (!data) {
          exrasFactory.displayToast(toastr.error, "Error", "Members could not be confirmed! Please try again later")
          return
        }

        angular.forEach($scope.confirmedPaidMembers, (value, key) => {
          $scope.all_paid_members.push(value)
        })

        $scope.all_paid_members_counter = $scope.all_paid_members.length
        exrasFactory.displayToast(toastr.success, "Success", "Members confirmed successfully!")
        return
       },
       (error) => {
         exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
     })
    }
   })

   $scope.confirmPaid = (confirmedPaidMembers) => {
     $scope.paidMembers = []
     $scope.confirmedPaidMembers = confirmedPaidMembers
   }

   //Pagination
   $scope.getData = () =>  $filter('filter')($scope.all_members, $scope.q)
   $scope.numberOfPages = () => Math.ceil($scope.all_members_count/$scope.pageSize)

   //Tabs
   $scope.active = {
    a: true
   }
   $scope.activateTab = function(tab) {
    $scope.active = {}
    $scope.active[tab] = true
   }
   // Dates
   $scope.currentMonth = moment().format('MMMM')
   $scope.currentYear = moment().format('YYYY')

}])
.filter('startFrom', () => {
    return (input, start) => {
      if (!input || !input.length) { return }
        start = +start
        return input.slice(start)
    }
})
