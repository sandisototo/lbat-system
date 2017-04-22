angular.module("admin",['toastr'])
.controller("adminController", ['$http', '$scope', '$window', 'SharedProperties', 'toastr', function($http, $scope,$window, SharedProperties, toastr){
			$scope.all_user_count = 0;
		 $scope.get_all_users = function () {
				 $http.get(SharedProperties.link +'admin/get_all_users')
				 .success(function (data) {

						 $scope.all_users = data;
						 $scope.all_user_count = $scope.all_users.length;
				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 };
		 $scope.DisplayToast = function(result,title,message) {
					 result(message, title,{
						 'extendedTimeOut': '2000',
						 'closeButton': 'true',
						 'progressBar': 'true',
						 'positionClass': 'toast-bottom-left'
					 });
			 };
		 $scope.isActive = function (viewLocation) {
     var active = (viewLocation === $window.location.pathname);
     return active;
};
		 $scope.all_none_getters = function () {
				 $http.get(SharedProperties.link +'admin/all_none_getters')
				 .success(function (data) {

						 $scope.all_none_get = data;
						 $scope.all_user_counts = $scope.all_none_get.length;
				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 };
		 $scope.get_all_notifications = function () {
				 $http.get(SharedProperties.link +'admin/get_all_notifications')
				 .success(function (data) {

						 $scope.all_notifications = data;
						 $scope.notification_count = $scope.all_notifications.length;
				 })
				 .error(function (data, status) {

					 console.log(data);
				 });
		 };

	$scope.notify_user_amout_available = function(user){
		
		 var user_cell_number = user.cell_number.replace('0', '27');
		var params = {
										"from":"Fintech Rewards",
										"to":  user_cell_number,
										"text": "Hi "+ user.user_name +" "+user.user_surname+", this is to notify you that the amount of (R"+user.request_amount+") you've requested to help with is available. Please check the system. FROM: Fintech Rewards."
										 };
				$http({
				method  : 'POST',
				url     : 'https://api.infobip.com/sms/1/text/single',
				data    : params,  // pass in data as strings
				headers : {
										'Authorization': 'Basic V0dUY3JlZGk6V2d0Q3IxMkA=',
										'Content-Type': 'application/json',
										'Accept': 'application/json',
				 },  // set the headers so angular passing info as form data (not request payload)
			 })
				.success(function(data) {
					$scope.errorMessage = "A message was sent to "+user.user_name;
					$scope.DisplayToast(toastr.success, "Success", $scope.errorMessage);
				})
				.error(function (data, status) {
					$scope.errorMessage = "Couldn't send a message to this number!";
					$scope.DisplayToast(toastr.error, "Error", $scope.errorMessage);
				})
				.finally(function(){
							var parrams = {
										 user_id: user.user_id
									 };
							$http({
							method  : 'POST',
							url     : SharedProperties.link+'admin/remove_from_notifications',
							data    : $.param(parrams),  // pass in data as strings
							headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
						 })
						 .finally(function() {
								$window.location.href = SharedProperties.link +'admin/notifications';
							});

				});
	}
 $scope.get_all_notifications();
    $scope.show_user_details = function(user){
			    	$scope.selected_user = user;
			 		$scope.selected_user_id = $scope.selected_user.id;

			};
		 $scope.get_all_getters = function () {
				 $http.get(SharedProperties.link +'admin/get_all_getters')
				 .success(function (data) {

						 $scope.all_getters = data;
						 $scope.all_getter_count = $scope.all_getters.length;
				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 };

		$scope.getter = {};
		$scope.create_getter = function(selected_user){
			   var getter = {
					 			user_id: selected_user.id,
							   	amount_expected:selected_user.amount_expected
							};
			   $http({
			   method  : 'POST',
			   url     : SharedProperties.link+'admin/create_getter',
			   data    : $.param(getter),  // pass in data as strings
			   headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			  })
			   .success(function(data) {
			     $window.location.href = SharedProperties.link +'admin/add_new_getters';
					 //console.log(data);
			   });
		};

		$scope.all_helpers_count = 0;


		 $scope.getter_byhelper_id = function (helper_id) {

				 $http.get(SharedProperties.link +'admin/getter_byhelper_id/'+ helper_id)
				 .success(function (data) {

						 $scope.all_helpers_getters = data;

				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 };

		  $scope.get_helper_getter = function () {
				 $http.get(SharedProperties.link +'admin/get_helper_getter')
				 .success(function (data) {
					 	//console.log(data); return false;
						 $scope.all_helpers = data;
						 $scope.all_helpers_count = $scope.all_helpers.length;

				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 };

		 $scope.get_helper_getter();
		 $scope.view_transactions = function(selected_user){


			   $window.location.href = SharedProperties.link +'admin/view_transaction/'+ selected_user.id;
		};
		$scope.user_id = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
			//console.log($scope.user_id);

		$scope.get_user_byid = function () {

				 $http.get(SharedProperties.link +'admin/get_user_byid/'+$scope.user_id)
				 .success(function (data) {

					if (data == "null") {
						$scope.get_user_byid = "User already been helped"
					} else {
						$scope.get_user_byid = data;
					}


				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 };
		  $scope.new_content =[];
		  $scope.pending_content =[];
		  $scope.paid_content =[];
		  $scope.over_due_content =[];
		  $scope.get_getter_all_transactions = function () {
		       $http.get(SharedProperties.link +'admin/get_getter_all_transactions/'+ $scope.user_id)
		      .success(function (data) {
		          $scope.all_transactions = data;

		          angular.forEach($scope.all_transactions, function(value, key) {

		            if(value.status == 0){
		              $scope.new_content.push(value);
		            }else if(value.status == 1){
		              $scope.pending_content.push(value);
		            }else if(value.status == 2){
		              $scope.paid_content.push(value);
		            }else if(value.status == 3){
		              $scope.over_due_content.push(value);
		            }

		          });
		          console.log($scope.pending_content);

		      })
		      .error(function (data, status) {
		        console.log(data);
		        console.log(status);
		      });
		  };

		  $scope.new_content_helper =[];
		  $scope.pending_content_helper =[];
		  $scope.paid_content_helper =[];
		  $scope.over_due_content_helper =[];
		  $scope.get_helper_all_transactions = function () {
		       $http.get(SharedProperties.link +'admin/get_helper_all_transactions/'+ $scope.user_id)
		      .success(function (data) {
		          $scope.all_transactions_helper = data;

		          angular.forEach($scope.all_transactions_helper, function(value, key) {

		            if(value.status == 0){
		              $scope.new_content_helper.push(value);
		            }else if(value.status == 1){
		              $scope.pending_content_helper.push(value);
		            }else if(value.status == 2){
		              $scope.paid_content_helper.push(value);
		            }else if(value.status == 3){
		              $scope.over_due_content_helper.push(value);
		            }

		          });
		          console.log($scope.pending_content_helper);

		      })
		      .error(function (data, status) {
		        console.log(data);
		        console.log(status);
		      });
		  };

		  	$scope.get_all_overdue_transactions = function () {
		  	  	$scope.curent_date = moment().format('YYYY-MM-DD h:mm:ss ');


				 $http.get(SharedProperties.link +'admin/get_all_overdue_transactions/'+ $scope.curent_date)
				 .success(function (data) {

						 $scope.all_trans_overdue = data;

						 console.log($scope.all_trans_overdue)
				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 	};
		 	$scope.paid_transaction_byadmin = function (trans_id,getter_id,helper_id) {

				 $http.get(SharedProperties.link +'admin/paid_transaction_byadmin/'+ trans_id + '/'+ getter_id +'/'+ helper_id)
				 .success(function (data) {
				 	$scope.paid_byadmin = data;
						 if(data !=0){
						 	$window.location.href = SharedProperties.link +'admin/view_overdue_transactions';

						 }
						 console.log($scope.paid_byadmin)

				 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 	};

		 	$scope.create_admin = function(selected_user){
			   var admin = {
					 			user_id: selected_user.id,
							   	username:selected_user.username,
							   	password: selected_user.password
							};
			   $http({
			   method  : 'POST',
			   url     : SharedProperties.link+'admin/create_admin',
			   data    : $.param(admin),  // pass in data as strings
			   headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			  })
			   .success(function(data) {
			     $window.location.href = SharedProperties.link +'admin/';
					 //console.log(data);
			   });
		};
		 $scope.get_all_users();
		 $scope.get_all_getters();
		 $scope.all_none_getters();
		 $scope.get_getter_all_transactions();
		 $scope.get_helper_all_transactions();
		 $scope.get_all_overdue_transactions();
		 //$scope.paid_transaction_byadmin();
		 $scope.get_user_byid();

	}]);
