<?php
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
	<?php
		$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(query("select * from board where idx ='".$bno."'"));
		$hit = $hit['hit'] + 1;
		$fet = query("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = query("select * from board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $board['title']; ?></h2>
		<div id="user_info">
			<?php echo $board['name']; ?> <?php echo $board['date']; ?> Hit:<?php echo $board['hit']; ?>
				<div id="bo_line"></div>
			</div>
			<div>
			file : <a href="../../upload/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
			</div>
			<div id="bo_content">
				<?php echo nl2br("$board[content]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="/">[Back to list]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[Modify]</a></li>
			<li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[Delete]</a></li>
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
				<form method="post" action="reply_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="Password" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="Edit" class="re_mo_bt">
				</form>
			</div>
			<!-- 댓글 삭제 비밀번호 확인 -->
			<div class='dat_delete'>
				<form action="reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
			 		<p>Password<input type="password" name="pw" /> <input type="submit" value="Conform"></p>
				 </form>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="reply_ok.php?idx=<?php echo $bno; ?>" method="post">
			<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="Id">
			<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="Password">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">comments</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>
</div>
</body>
</html>