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

  $scope.showEditMember = (member, index) => {
    $scope.selected_index = index
    $scope.selected_member = member

    // get first 6 digits as a valid date
   let tempDate = new Date(member.id_number.substring(0, 2), member.id_number.substring(2, 4), member.id_number.substring(4, 6));

   let id_date = tempDate.getDate()
   let id_month = moment.months(tempDate.getMonth() - 1)
   let id_year = tempDate.getFullYear()
   $scope.dob = `${id_date} ${id_month} ${id_year}`

   //Get member dependents
   $scope.getDepandants(member.id);
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
      debag.log('error--->', error)
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

      exrasFactory.displayToast(toastr.success, "Success", "Record added successfully!")

    },
    (error) => {
      debag.log('error--->', error)
      exrasFactory.displayToast(toastr.error, "Error", "Sorry we coudn't process this request! Please try again later")
    })
    new_member = {}
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
      $scope.dependents_list.push(dependant)
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
      $scope.dependents_list = data
    }, (error) => {
      console.log(error)
    })
  }
  $scope.getAllMembers()
 }])
