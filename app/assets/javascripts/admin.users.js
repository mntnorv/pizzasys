//Chosen
$(function(){
	$("#user-manage-form #user_id").chosen();

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
})


