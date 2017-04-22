angular.module("helper",[ 'toastr'])
.controller("helperController", ['$http', '$scope', '$window', 'SharedProperties', 'toastr' , function($http, $scope,$window, SharedProperties, toastr){
	$scope.all_getters =[];
	$scope.new_content =[];
	$scope.pending_content =[];
	$scope.paid_content =[];
	$scope.over_due_content =[];
	$scope.search_amount = 1000;
		 $scope.get_all_getters = function () {
				 $http.get(SharedProperties.link +'helper/get_all_getters')
				 .success(function (data) {
					 $scope.all_getters = data;
			 })
				 .error(function (data, status) {

					 console.log(status);
				 });
		 };

		  $scope.transaction_status = "pendiente";

		 $scope.get_all_transactions = function () {
 		 			$http.get(SharedProperties.link +'helper/get_all_transactions')
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
				 })
				 .error(function (data, status) {
					 console.log(data);
					 console.log(status);
				 });
		 };



		 $scope.get_all_getters();
		 $scope.get_all_transactions();
		 //var helper_cell_number = $scope.cell_number.replace('0', '27');
		 //console.log(helper_cell_number);
		 $scope.send_confirmation_sms = function(selected_getter,due_date){
			 var helper_cell_number = $scope.cell_number.replace('0', '27');

			 var params = {
										   "from":"Fintech Rewards",
										   "to":  helper_cell_number,
										   "text":"Thank you for choosing "+selected_getter.name+" "+selected_getter.surname+". Below are his/her banking details"+
															"( Bank Name: "+selected_getter.bank+
															", Branch Code: "+selected_getter.branch_code+
															", Account Number: "+ selected_getter.account_number+
															", Account Holder: "+ selected_getter.account_holder+
															", Account Type: "+ selected_getter.account_type+
															", Deposit Amount: R"+ selected_getter.amount_expected+
															", Contact Number: "+ selected_getter.cell_number +" )"+
															" Please make sure you make a payment before "+ moment(due_date).format('LLLL') +"."
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
					 console.log(data);

			 })
			 .error(function (data, status) {
				 console.log(data);
			 });
		 };
		 $scope.send_chosen_user_sms = function(selected_getter){
			     var getter_cell_number = selected_getter.cell_number.replace('0', '27');
		 			 var params = {
		 										   "from":"Fintech Rewards",
		 										   "to": getter_cell_number,
		 										   "text": $scope.user_name + " " + $scope.user_surname + " has promised to deposit your reward amount of: R"+
													 			   selected_getter.amount_expected+". Once this payment has been made, please log on to: http://fintechrewards.co.za/ " +
													 "and confirm the payment. Contact him/her on: "+$scope.cell_number
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
							 console.log(data);
							 $window.location.href = SharedProperties.link +'helper/transactions';
		 			 })
		 			 .error(function (data, status) {
						 console.log(data);
						 $window.location.href = SharedProperties.link +'helper/transactions';
		 			 });
		 		 };

				 $scope.send_received_amount_sms = function(selected_getter){
					 var helper_cell_number = $scope.cell_number.replace('0', '27');

					 var params = {
													 "from":"Fintech Rewards",
													 "to":  helper_cell_number,
															 "text": "PAYMENT RECIEVED: Thank you for paying "+selected_getter.name+" "+selected_getter.surname+
															         "Reward Amount: "+ selected_getter.amount_paid
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
									 console.log(data);
							 })
							 .error(function (data, status) {
									 console.log(data);

							 });

						 };

						 $scope.add_to_notification_list = function(){
							 //console.log(search_amount); return false;
							 var params = {
										 search_amount: $scope.search_amount,
							 };

							 $http({
							 method  : 'POST',
							 url     : SharedProperties.link+'helper/add_to_notification_list',
							 data    : $.param(params),  // pass in data as strings
							 headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
							})
							 .success(function(data) {
									// console.log(data);
								 if (!data.status){
									 // if not successful, bind errors to error variables
									 $scope.errorMessage = data.message;
									 $scope.DisplayToast(toastr.error, "Error", $scope.errorMessage);
								 } else {
									 // if successful, bind success message to message
										 $scope.DisplayToast(toastr.success, "Success", data.message);
										 //$scope.notify_admin_to_allocate($scope.search_amount);
								 }
							 })
							 .error(function (data, status) {

								 $scope.DisplayToast(toastr.error, "Error", "Server not responding.");
							 });
						 };
		 $scope.notify_admin_to_allocate = function(search_amount){

			 var params = {
											 "from":"Fintech Rewards",
											 "to":  "27635386573",
											 "text": "Hi Fintech Admin: "+ $scope.user_name +" "+$scope.user_surname+" needs to be reallocated to pay an amount of: R"+search_amount+"."
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
						 $scope.errorMessage = "A message was sent to system admin!";
						 $scope.DisplayToast(toastr.success, "Success", $scope.errorMessage);
					 })
					 .error(function (data, status) {
						 $scope.errorMessage = "Couldn't send a message to system admin!";
						 $scope.DisplayToast(toastr.error, "Error", $scope.errorMessage);
					 })
					 .finally(function(){
						 $window.location.href = SharedProperties.link +'helper';
					 });

				 };

		 $scope.add_to_my_getters = function(selected_getter,reward_amount, due_date, reward_date){
			 //console.log(selected_getter); return false;
			 var params = {
						 reward_amount: reward_amount,

						 amount_expected: parseInt(selected_getter.amount_expected),
						 getter_id:selected_getter.id,
						 due_date: due_date,
						 reward_date: reward_date
			 };

			 $http({
			 method  : 'POST',
			 url     : SharedProperties.link+'helper/add_to_my_getters',
			 data    : $.param(params),  // pass in data as strings
			 headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			})
			 .success(function(data) {
					 console.log(data);
				 if (!data.status) {
					 // if not successful, bind errors to error variables
					 $scope.errorMessage = "Server Error!";
					 console.log($scope.errorMessage);
				 } else {
					 // if successful, bind success message to message
						 //$scope.send_confirmation_sms(selected_getter, due_date);
						 //$scope.send_chosen_user_sms(selected_getter);
					   //$window.location.href = SharedProperties.link +'helper/transactions';
				 }
			 })
			 .error(function (data, status) {

				 console.log(status);
			 });
		 };



		 $scope.show_getter_details = function(getter){
			    $scope.increase_amount = parseInt(getter.amount_expected * 100/100);
			    $scope.reward_amount = parseInt(getter.amount_expected) + parseInt($scope.increase_amount);
			 		$scope.selected_getter = getter;

					$scope.due_date_conv = moment().format('YYYY-MM-DD h:mm:ss ');
					$scope.due_date = moment($scope.due_date_conv).add(3, 'days').format('YYYY-MM-DD h:mm:ss ');
					$scope.reward_date = moment($scope.due_date).add(3, 'days').format('YYYY-MM-DD h:mm:ss ');
					$scope.modal_due_date = moment($scope.due_date).format('LLLL');
					$scope.modal_reward_date = moment($scope.reward_date).format('LLLL');

			};
			$scope.show_transaction = function(transaction){
							$scope.selected_transaction = transaction;
			 };
			$scope.calculate_reward = function(amount_expected,percentage){
					 $scope.increase_amount = parseInt(amount_expected * percentage/100);
					 $scope.reward_amount = parseInt(amount_expected) + parseInt($scope.increase_amount);

			 };
			 $scope.range_content =[];
			 $scope.range_content_load = false;
			 $scope.show_range = function(range, amount){
				 $scope.search_amount = amount;
				 $scope.range_content_load = true;
				//console.log($scope.all_getters);
				 $scope.range_content =[];
				 $scope.due_dates = [];
				 angular.forEach($scope.all_getters, function(value, key) {
					 switch (range) {
          case 1:
						console.log(value);
					  if(value.amount_expected == amount){
							 $scope.range_content.push(value);
							 $scope.due_date_conv = new Date();
							 $scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
							 $scope.due_dates.push($scope.due_date);
						}
            break;
          case 2:
						if(value.amount_expected == amount){
								$scope.range_content.push(value);
								$scope.due_date_conv = new Date();
								$scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
								$scope.due_dates.push($scope.due_date);
						}
						break;
					case 3:
						if(value.amount_expected == amount){
								 $scope.range_content.push(value);
								 $scope.due_date_conv = new Date();
								 $scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
								 $scope.due_dates.push($scope.due_date);
						}
						break;
						case 4:
							if(value.amount_expected == amount){
									 $scope.range_content.push(value);
									 $scope.due_date_conv = new Date();
									 $scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
									 $scope.due_dates.push($scope.due_date);
							}
							break;
					  case 5:
								if(value.amount_expected == amount){
										 $scope.range_content.push(value);
										 $scope.due_date_conv = new Date();
										 $scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
										 $scope.due_dates.push($scope.due_date);
								}
								break;
						case 6:
								if(value.amount_expected == amount){
											 $scope.range_content.push(value);
											 $scope.due_date_conv = new Date();
											 $scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
											 $scope.due_dates.push($scope.due_date);
									}
									break;
						case 7:
									if(value.amount_expected == amount){
												$scope.range_content.push(value);
												$scope.due_date_conv = new Date();
												$scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
												$scope.due_dates.push($scope.due_date);
										}
									break;
						 case 8:
									if(value.amount_expected == amount){
													 $scope.range_content.push(value);
													 $scope.due_date_conv = new Date();
												   $scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
													 $scope.due_dates.push($scope.due_date);
										}
									break;
						case 9:
								 if(value.amount_expected == amount){
												$scope.range_content.push(value);
												$scope.due_date_conv = new Date();
												$scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
												$scope.due_dates.push($scope.due_date);
									}
								break;
						case 10:
								if(value.amount_expected == amount){
												$scope.range_content.push(value);
												$scope.due_date_conv = new Date();
												$scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
												$scope.due_dates.push($scope.due_date);
									}
								break;
						case 11:
								 if(value.amount_expected > amount){
											$scope.range_content.push(value);
											$scope.due_date_conv = new Date();
											$scope.due_date = $scope.due_date_conv.setDate($scope.due_date_conv.getDate() + parseInt(3));
											$scope.due_dates.push($scope.due_date);
									}
									break;
						default:
			    				$scope.range_content =[];
									$scope.due_dates = [];
        }
			});

				};



	}]);
