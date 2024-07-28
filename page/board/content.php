<?php
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
<div class="container">
    <div class="content">
        <h2>Your Voice, Your Space! So speak up!</h2> <br>
        <p>This is a safe haven for voice! Join the conversation today.</p> <br>

		<img src="img/studentspeakoutwatercolor.png" alt="students speakout image">

        <?php
				if(!isset($_SESSION['userid'])){
					echo "<div id='not_use'>Kindly log in to start sharing your thoughts. See what other users are sharing below.</div>";
				// }else if( $lo_point['point']=='0' || $lo_point['point']>'0'){
				}else{
			?>
			

			        <div id="search_box">
    <form action="/page/board/search_result.php" method="get">
      <select name="catgo">
        <option value="title">Title</option>
        <option value="name">Name</option>
        <option value="content">Content</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>Search</button>
    </form>
    </div>

			    <!-- <div id="write_btn">
      <a href="write.php"><button>Write</button></a>
    </div> -->


        <div id="write_area">
			<form action="/page/board/write_ok.php" method="post" enctype="multipart/form-data">
				<div id="in_title">
					<textarea name="title" id="utitle" rows="1" cols="55" placeholder="Title" maxlength="100" required></textarea>
				</div>
				<div class="wi_line"></div>
				<div id="in_name">
					<textarea name="name" id="uname" rows="1" cols="55" placeholder="Name" maxlength="100" required></textarea>
				</div>
				<div class="wi_line"></div>
				<div id="in_content">
					<textarea name="content" id="ucontent" placeholder="Content" required></textarea>
				</div>
				<div id="in_pw">
					<input type="password" name="pw" id="upw"  placeholder="Password" required />  
				</div>
				<div id="in_lock">
					<input type="checkbox" value="1" name="lockpost" />Lock the post.
				</div>
				<div id="in_file">
					<input type="file" value="1" id="b_file" name="b_file" />
				</div>
				<div class="bt_se">
					<button type="submit">Write a post</button>
				</div>
			</form>
		</div>




	<?php
				}
			?>



    <?php
		// $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
    // $bno = 1; /* bno함수에 idx값을 받아와 넣음*/
		// $hit = mysqli_fetch_array(query("select * from board where idx ='".$bno."'"));
		// $hit = $hit['hit'] + 1;
		// $fet = query("update board set hit = '".$hit."' where idx = '".$bno."'");
		// $sql = query("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		// $board = $sql->fetch_array();
    // Fetch the latest 5 posts ordered by ascending idx
    $result = query("SELECT * FROM board ORDER BY idx DESC LIMIT 5");
	?>
<!-- 글 불러오기 -->
 <!-- Display the posts -->
<div id="posts">

<?php
if ($result->num_rows > 0) {
  while($board = $result->fetch_array()){
?>

<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>

		<div>
		<!--file : <a href="/upload/<?php //echo $board['file'];?>" download><?php //echo $board['file']; ?></a>-->
		</div>
		<div id="bo_content">
			<?php echo nl2br("$board[content]"); ?> 
			<?php
				if($board['file']){
					echo "<img src='/upload/".$board['file']."' width='50%' height='50%'>";
				}
			?> 
		</div>
		<div id="user_info">
			<?php echo "written by ".$board['name']; ?> <?php echo "on ".$board['date']; ?>  
			
			<!--Hit: --><?php //echo $board['hit']; ?>
				<!--<div id="bo_line"></div>-->
		</div>

	<!-- 목록, 수정, 삭제 -->
	<div class="bo_ser">
		<ul>
		<?php
				if(isset($_SESSION['userid'])){
			?>
			<!-- <li><a href="/">[Back to list]</a></li> -->
			<li><button class="moddelbutton" onclick="location.href='/page/board/modify.php?idx=<?php echo $board['idx']; ?>'">Modify</button></li>
			<li><button class="moddelbutton" onclick="location.href='/page/board/delete.php?idx=<?php echo $board['idx']; ?>'">Delete</button></li>
			<?php
				}
			?>
		</ul>
	</div>
</div>

<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>Comments</h3>
		<?php
			$sql3 = query("select * from reply where con_num='".$board['idx']."' order by idx desc");
			while($reply = $sql3->fetch_array()){ 
		?>
		<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
		<div class="rep_me dap_to">written by <?php echo $reply['name'];?> on <?php echo $reply['date']; ?></div>	
		<div class="dap_lo">
			<div ><b></b></div>
			
			<div class="bo_ser">
			<ul>
			<?php
				if(isset($_SESSION['userid'])){
			?>

				<li><button class="dat_edit_bt" href="#">Modify</a></li>
				<li><button class="dat_delete_bt" href="#">Delete</a></li>

			<?php
				}
			?>
			</ul>
			</div>

			<!-- 댓글 수정 폼 dialog -->
			<div class="dat_edit">
				<form method="post" action="/page/board/reply_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="Password" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="Edit" class="re_mo_bt">
				</form>
			</div>
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="/page/board/reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
			 		<p>Password<input type="password" name="pw" /> <input type="submit" value="Conform"></p>
				 </form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<?php
				if(isset($_SESSION['userid'])){
			?>
	<div class="dap_ins">
		<form action="/page/board/reply_ok.php?idx=<?php echo $board['idx']; ?>" method="post">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="Username or another pseudonym">
				<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="Password">
				<button id="rep_bt" class="re_bt">comment</button>
			</div>
		</form>
	</div>
	<?php } ?>
</div><!--- 댓글 불러오기 끝 -->

<?php
  }
} else {
  echo "0 results";
}
?>

</div>
<!-- Load More button -->
<button id="loadMore">Load More</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
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
	});
</script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
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
</script>


    <?php
    //  }else{
		// 	echo "<div id='not_use'>This is a general-grade only board.<br />Earn 1 point for writing a post.(General Class 1 Points)</div>";
		// }
    ?>

  </div>

  <?php
include $_SERVER['DOCUMENT_ROOT']."/right-menu.php";
?>



</div>
<?php
include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>