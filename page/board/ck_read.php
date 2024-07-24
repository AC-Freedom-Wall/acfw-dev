<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php"; /* Load the database */
?>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.js"></script>
<script type="text/javascript">
	$(function(){
		$("#writepass").dialog({
		 	modal:true,
		 	title:'This is a secret post.',
		 	width:400,
	 	});
	});
</script>
<?php

$bno = $_GET['idx']; /* Get the idx value and store it in the bno variable */
$sql = query("SELECT * FROM board WHERE idx='".$bno."'"); /* Select the record with the given idx value */
$board = $sql->fetch_array();

?>
<div id='writepass'>
	<form action="" method="post">
 		<p>Password<input type="password" name="pw_chk" /> <input type="submit" value="Confirm" /></p>
 	</form>
</div>
	<?php
	$bpw = $board['pw'];

	if(isset($_POST['pw_chk'])) // If there is a POST value for pw_chk
	{
		$pwk = $_POST['pw_chk']; // Store the POST value for pw_chk in the $pwk variable
		if(password_verify($pwk, $bpw)) // Compare the entered password with the stored password
		{
			$pwk == $bpw;
		?>
			<script type="text/javascript">location.replace("read.php?idx=<?php echo $board["idx"]; ?>");</script><!-- If passwords match, redirect to read.php -->
		<?php 
		}else{ ?>
			<script type="text/javascript">alert('Invalid password');</script><!-- Otherwise, show an "Invalid password" message -->
		<?php } } ?>
