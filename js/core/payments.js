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

  $scope.getLapsedMembers = () => {
     $scope.lapsedPromise = paymentsFactory.getLapsedMembers()
     .then((response) => response.data)
     .then((data) => {
       if (!data) {
         return
       }

       laspsed_done(data)
      },
      (error) => {
        exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }

  $scope.getUnpaidMembers()
  $scope.getPaidMembers()
  $scope.getLapsedMembers()

  let done = (data) => {
    $scope.all_members = data
    $scope.all_members_count = data.length
  }

  let paid_done = (data) => {
    $scope.all_paid_members = data
    $scope.all_paid_members_counter = data.length
  }

  let laspsed_done = (data) => {
    $scope.all_lapsed_members = data
    $scope.all_lapsed_members_counter = data.length
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
}])
.controller("PaymentsHistoryController", ['$http', '$scope', '$window', '$filter', 'toastr', 'exrasFactory', 'paymentsFactory',
function ($http, $scope, $window, $filter, toastr, exrasFactory, paymentsFactory) {
  console.debug('<----Payments History Controller----->')

  $scope.loading_message = 'Updating....'
  // load Payement
  $scope.loadPayment = (payment) => {
    if (!$scope.paymentForm.$valid) {
      exrasFactory.displayToast(toastr.error, "Error", "Date cannot be left blank. Please load payment again.")
      return false
    }
    $scope.new_payment = payment
    $scope.new_payment.timestamp = `${payment.date_year}-${payment.date_month}-${payment.date_day}`
    $scope.new_payment.user_plan_amount = 200
    $scope.post_data = {
      user_id: $scope.new_payment.user_id,
      user_plan_amount: $scope.new_payment.user_plan_amount,
      timestamp: $scope.new_payment.timestamp
    }
    $scope.paymentPromise = paymentsFactory.loadPayment($scope.post_data)
    .then((response) => response.data)
    .then((status) => {
      if (!status) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not add this record! Make sure all required fields are filled.")
        return
      }
      $scope.new_payment.status = 1
      $scope.payment_histroy.push($scope.new_payment)
      $scope.new_payment = {}
      $scope.post_data = {}
      exrasFactory.displayToast(toastr.success, "Success", "Record added successfully!")
    },(error) => {
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
      console.log(error)
    })
  }

  // Confirm revert payment
  $scope.confirmRevertPayment = (payment, index) => {
    $scope.selected_payment_index = index
    $scope.selected_payment = payment
  }

  // Revert Payment
  $scope.revertPayment = (member_id, payment_id, timestamp, $index) => {
    $scope.paymentPromise = paymentsFactory.revertPayment(member_id, payment_id, timestamp.substring(0, 10))
    .then((response) => response.data)
    .then((data) => {
      if (!data) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not revert this payment! Please try again later.")
        return
      }
      if($scope.selected_payment_index !== -1) {
        $scope.payment_histroy[$scope.selected_payment_index].status = 0
        $scope.selected_payment_index = -1
        exrasFactory.displayToast(toastr.success, "Success", "Payment reverted successfully!")
      }

    },
    (error) => {
      console.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }
  //Get Payment History
  $scope.getPaymentsHistory = (member_id) => {
     $scope.paymentPromise = paymentsFactory.getPaymentsHistory(member_id)
     .then((response) => response.data)
     .then((data) => {
       if (!data) {
         return
       }

       done(data)
      },
      (error) => {
        exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }

  let done = (data) => {
    $scope.payment_histroy = data
  }
}])
.filter('startFrom', () => {
    return (input, start) => {
      if (!input || !input.length) { return }
        start = +start
        return input.slice(start)
    }
})
