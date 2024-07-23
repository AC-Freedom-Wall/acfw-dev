<?php 
include $_SERVER['DOCUMENT_ROOT']."/header.php";

if(isset($_SESSION['userid'])){
	echo "<script>alert('Incorrect approach.'); history.back();</script>"; 
}else{
?>
	<div id="join_form_in">
		<h2>Sign up</h2>
			<form action="join_ok.php" method="post">
				<div id="join_f">
					<div class="form-group">
						<label for="userid">ID</label>
						<div class="mb"><input type="text" class="inp" id="userid" name="userid" placeholder="ID" /></div>
					</div>
					<div class="form-group">
						<label for="userpw">Password</label>
						<div class="mb"><input type="password" class="inp" id="userpw" name="userpw" placeholder="Password" /></div>
					</div>
					<div class="form-group">
						<label for="name">Name</label>
						<div class="mb"><input type="text" class="inp" id="name" name="name" placeholder="Please enter a name" /></div>
					</div>
				    <div class="form_btn">
				    	<button type="submit" class="form_bt">submit</button>
				       	<button type="reset" class="form_bt2">reset</button>
				    </div>
				</div> <!-- join_f end -->
			</form>
		</div>
<?php }