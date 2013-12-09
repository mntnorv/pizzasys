//Chosen
$(function(){
	//Chosen config
	$("#user-manage-form #user_id").chosen();

	//Update user info on user change
	$("#user-manage-form #user_id").change(function (){
		var normalus_user_id = $('#user-manage-form').find('select[name="user_id"]').val();

		$.getJSON("../api/get/user/" + normalus_user_id, function ( user ){
			$('#user-manage-form #type').val(user['user_type_id']);
			if(user['blocked'] === 1){
				$('#user-manage-form #blocked').prop('checked', true);
			}else{
				$('#user-manage-form #blocked').prop('checked', false);
			}
		})
	});

	//Update info at db
	$("#user-manage-form").submit( function ( event ) {
  		//Prevent default submitting
  		event.preventDefault();

		//Form values
		var user_id = $("#user-manage-form #user_id").chosen().val();
		var type_id = $("#user-manage-form #type").val();
		var blocked = $("#user-manage-form #blocked").prop('checked');
		var password = $("#user-manage-form #password").val();

		$.post(
			'users',
			{user_id: user_id, type_id: type_id, blocked: blocked, password: password},
			function ( response ){
				alert(response);
			}
			)
	});
})
