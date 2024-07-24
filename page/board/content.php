<?php
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
<div class="container">
    <div class="content">
        <h2>Main Content Area</h2>
        <p>This is where the main content of the page goes!!!.</p>

        <?php
				if(!isset($_SESSION['userid'])){
					echo "<div id='not_use'>You can write after logging in</div>";
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
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> Hit:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
		</div>
		<div>
		file : <a href="/upload/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
		</div>
		<div id="bo_content">
			<?php echo nl2br("$board[content]"); ?>
			<?php
				if($board['file']){
					echo "<img src='/upload/".$board['file']."' width='100%' height='100%'>";
				}
			?> 
		</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<!-- <li><a href="/">[Back to list]</a></li> -->
			<li><a href="/page/board/modify.php?idx=<?php echo $board['idx']; ?>">[Modify]</a></li>
			<li><a href="/page/board/delete.php?idx=<?php echo $board['idx']; ?>">[Delete]</a></li>
		</ul>
	</div>
</div>

<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>List of comments</h3>
		<?php
			$sql3 = query("select * from reply where con_num='".$board['idx']."' order by idx desc");
			while($reply = $sql3->fetch_array()){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">Modify</a>
				<a class="dat_delete_bt" href="#">Delete</a>
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
	<div class="dap_ins">
		<form action="/page/board/reply_ok.php?idx=<?php echo $board['idx']; ?>" method="post">
			<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="Id">
			<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="Password">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">comments</button>
			</div>
		</form>
	</div>
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