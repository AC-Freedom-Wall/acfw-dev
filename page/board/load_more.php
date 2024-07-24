<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

if (isset($_POST['offset'])) {
  $offset = intval($_POST['offset']);
  $result = query("SELECT * FROM board ORDER BY idx DESC LIMIT 5 OFFSET $offset");

  if ($result->num_rows > 0) {
    while($board = $result->fetch_array()){
      echo '<div id="board_read">';
      echo '<h2>' . $board['title'] . '</h2>';
      echo '<div id="user_info">' . $board['name'] . ' ' . $board['date'] . ' Hit:' . $board['hit'] . '<div id="bo_line"></div></div>';
      echo '<div>file : <a href="../../upload/' . $board['file'] . '" download>' . $board['file'] . '</a></div>';
      echo '<div id="bo_content">' . nl2br($board['content']) . '</div>';
      echo '<div id="bo_ser"><ul>';
      echo '<li><a href="modify.php?idx=' . $board['idx'] . '">[Modify]</a></li>';
      echo '<li><a href="delete.php?idx=' . $board['idx'] . '">[Delete]</a></li>';
      echo '</ul></div></div>';
?>
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
    echo 'No more posts to load';
  }
}
?>