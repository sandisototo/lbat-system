angular.module("members",['toastr','datatables', 'cgBusy'])
.controller("MembersController", ['$http', '$scope', '$window', 'toastr', '$filter', 'membersFactory', 'exrasFactory',
function($http, $scope,$window, toastr, $filter, membersFactory, exrasFactory){
  console.debug('<----Members Controller----->')

  $scope.all_user_count = 0
  $scope.loading_message = 'Please wait....'
	$scope.getAllMembers = () => {
		 $scope.usersPromise = membersFactory.getAllMembers()
     .then((response) => response.data)
     .then((data) => {
       if (!data) {
         $scope.errorMessage = "Users Not Found! Please try again later"
         exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
         return
       }

       $scope.all_members = data
 			 $scope.all_members_count = $scope.all_members.length
      },
      (error) => {
        $scope.errorMessage = "Sorry we coudn't process this request! Please try again later"
        exrasFactory.displayToast(toastr.error, "Error", $scope.errorMessage)
    })
	}

  $scope.showEditMember = (member, index) => {
    $scope.selected_index = index
    $scope.selected_member = member
  }

  $scope.editMember = (member) => {
    if (!$scope.inputForm.$valid) {
      exrasFactory.displayToast(toastr.error, "Error", "Name, Surname or ID number cannot be left blank. Please re-open and and edit again.")
      return false
    }

    $scope.usersPromise = membersFactory.editMember(member)
    .then((response) => response.data)
    .then((data) => {
      if (!data) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not update this record! Make sure all required fields are filled.")
        return
      }

      exrasFactory.displayToast(toastr.success, "Success", "Record updated successfully!")

    },
    (error) => {
      debag.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }

  $scope.getAllMembers()
 }])
