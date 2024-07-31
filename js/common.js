$(document).ready(function(){
	// When the user clicks on the button, load more 5 posts
	var offset = 5; // Initial offset for the next set of posts

	$("#loadMore").click(function(){
	  $.ajax({
		url: '/page/board/load_more.php',
		type: 'post',
		data: {offset: offset},
		success: function(response){
		  // Append the new posts to the existing ones
		  $("#posts").append(response);
		  // Update the offset
		  offset += 5;
		}
	  });
	});

	// When the user clicks on the button, comment on the post
	$("#rep_bt").click(function(){
		$.post("reply_ok.php",{
			bno:$(".bno").val(),
			dat_user:$(".dat_user").val(),
			dat_pw:$(".dat_pw").val(),
			content:$(".reply_content").val(),
		},	
		function(data,success){
			if(success=="success"){
				$(".reply_view").html(data);
				alert("A comment has been made");	
			}else{
				alert("Comment failed");
			}
		});
	});

	// When the user clicks on the button, edit the comment
	$(".dat_edit_bt").click(function(){
		var obj = $(this).closest(".dap_lo").find(".dat_edit");
		obj.dialog({
			modal:true,
			width:650,
			height:200,
			title: "Edit comments",
			close: function () {
				console.log("dialog_close");
				history.go(0);
			}
		});
		console.log("dialog_open");
	});

	// When the user clicks on the button, delete the comment
	$(".dat_delete_bt").click(function(){
		var obj = $(this).closest(".dap_lo").find(".dat_delete");
		obj.dialog({
			modal:true,
			width:400,
			title: "Confirm comment deletion",
			close: function () {
				console.log("dialog_close");
				history.go(0);
			}
		});
		console.log("dialog_open");
	});

});