angular.module("members",['toastr','datatables', 'cgBusy'])
.controller("MembersController", ['$http', '$scope', '$window', 'toastr', '$filter', 'membersFactory', 'exrasFactory',
function($http, $scope, $window, toastr, $filter, membersFactory, exrasFactory){
  console.debug('<----Members Controller----->')

  $scope.all_user_count = 0
  $scope.loading_message = 'Please wait....'
  $scope.new_dependent = {}

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

  // Show edit member dialogue
  $scope.showEditMember = (member, index) => {
    $scope.selected_index = index
    $scope.selected_member = member
    $scope.dob = exrasFactory.dob(member.id_number)
    //Get member dependents
    $scope.getDepandants(member.id)
  }

  // Show edit depandant dialogue
  $scope.showEditDepandant = (depandant, index) => {
    $scope.selected_depandant_index = index
    $scope.selected_depandant = depandant
    $scope.dob = exrasFactory.dob(depandant.id_number)
  }

  // remove member
  $scope.removeMember = (member_id) => {
    $scope.usersPromise = membersFactory.removeMember(member_id)
    .then((response) => response.data)
    .then((data) => {
      if (!data) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not remove this record! Please try again later.")
        return
      }
      if($scope.selected_index !== -1) {
        $scope.all_members.splice($scope.selected_index, 1)
        $scope.selected_index = -1
        exrasFactory.displayToast(toastr.success, "Success", "Member removed successfully!")
      }

    },
    (error) => {
      console.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }

  // remove depandant
  $scope.removeDepandant = (member_id, depandant_id) => {
    $scope.usersPromise = membersFactory.removeDepandant(member_id, depandant_id)
    .then((response) => response.data)
    .then((data) => {
      if (!data) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not remove this record! Please try again later.")
        return
      }
      if($scope.selected_depandant_index !== -1) {
        $scope.depandants_list.splice($scope.selected_depandant_index, 1)
        $scope.selected_depandant_index = -1
        exrasFactory.displayToast(toastr.success, "Success", "Depandant removed successfully!")
      }

    },
    (error) => {
      console.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }
  // confirm remove member
  $scope.confirmRemoveMember = (member, index) => {
    $scope.selected_index = index
    $scope.selected_member = member
  }
  // confirm remove depandant
  $scope.confirmRemoveDepandant = (depandant, index) => {
    $scope.selected_depandant_index = index
    $scope.selected_depandant = depandant
  }


  // edit/update a given member object
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
      console.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }

  // edit/update a given depandant object
  $scope.editDepandant = (depandant) => {
    if (!$scope.editDepInputForm.$valid) {
      exrasFactory.displayToast(toastr.error, "Error", "Name, Surname or ID number cannot be left blank. Please re-open and and edit again.")
      return false
    }

    $scope.usersPromise = membersFactory.editDepandant(depandant)
    .then((response) => response.data)
    .then((data) => {
      if (!data) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not update this record! Make sure all required fields are filled.")
        return
      }

      exrasFactory.displayToast(toastr.success, "Success", "Record updated successfully!")

    },
    (error) => {
      console.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }

  // add member
  $scope.addMember = (new_member) => {
    if (!$scope.newInputForm.$valid) {
      exrasFactory.displayToast(toastr.error, "Error", "Name, Surname, ID number, Phone number or Address cannot be left blank. Please add new member again.")
      return false
    }

    $scope.usersPromise = membersFactory.addMember(new_member)
    .then((response) => response.data)
    .then((data) => {
      if (!data) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not add this record! Make sure all required fields are filled.")
        return
      }
      new_member.timestamp = new Date()
      new_member.policy_status = 1

      $scope.all_members.push(new_member)
      $scope.new_member = {}
      exrasFactory.displayToast(toastr.success, "Success", "Record added successfully!")
    },
    (error) => {
      console.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
  }
  // add depandants to a given member object
  $scope.addDepandant = (dependant) => {
    if (!$scope.depForm.$valid) {
      exrasFactory.displayToast(toastr.error, "Error", "Name, Surname, ID number or Gender cannot be left blank. Please add new dependant again.")
      return false
    }

    $scope.usersPromise = membersFactory.addDepandant(dependant)
    .then((response) => response.data)
    .then((status) => {
      if (!status) {
        exrasFactory.displayToast(toastr.error, "Error", "Could not add this record! Make sure all required fields are filled.")
        return
      }
      $scope.depandants_list.push(dependant)
      $scope.new_dependent = {}
      exrasFactory.displayToast(toastr.success, "Success", "Record added successfully!")
    },(error) => {
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
      console.log(error)
    })
  }

  $scope.getDepandants = (member_id) => {
    $scope.usersPromise = membersFactory.getDepandants(member_id)
    .then((response) => response.data)
    .then((data) => {
      if (!data) {
        return
      }
      $scope.depandants_list = data
    }, (error) => {
      console.log(error)
    })
  }
  $scope.getAllMembers()
 }])
