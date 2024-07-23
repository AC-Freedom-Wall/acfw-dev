$(document).ready(function(){
	// var offset = 5; // Initial offset for the next set of posts

	// $("#loadMore").click(function(){
	//   $.ajax({
	// 	url: '/page/board/load_more.php',
	// 	type: 'post',
	// 	data: {offset: offset},
	// 	success: function(response){
	// 	  // Append the new posts to the existing ones
	// 	  $("#posts").append(response);
	// 	  // Update the offset
	// 	  offset += 5;
	// 	}
	//   });
	// });

	/* re_bt클래스 클릭시 동작(댓글입력) */
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

	$(".dat_edit_bt").click(function(){
		/* dat_edit_bt클래스 클릭시 동작(댓글 수정) */
			var obj = $(this).closest(".dap_lo").find(".dat_edit");
			obj.dialog({
				modal:true,
				width:650,
				height:200,
				title: "Edit comments",
				close: function () {
				console.log("dialog_close");
				// location.reload();
				history.go(0);
				}
				});
				console.log("dialog_open");
		});

	$(".dat_delete_bt").click(function(){
		/* dat_delete_bt클래스 클릭시 동작(댓글 삭제) */
		var obj = $(this).closest(".dap_lo").find(".dat_delete");
		obj.dialog({
			modal:true,
			width:400,
			title: "Confirm comment deletion",
			close: function () {
			console.log("dialog_close");
			// location.reload();
			history.go(0);
			}
			});
			console.log("dialog_open");
	});

});