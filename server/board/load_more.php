<?php

include "../../db.php";

if (isset($_POST['offset'])) {
  $offset = intval($_POST['offset']);
  $result = query("SELECT * FROM board ORDER BY idx DESC LIMIT 5 OFFSET $offset");

  if ($result->num_rows > 0) {
    while($board = $result->fetch_array()){
?>
			<div id="board_read">
				<h2><?php echo htmlspecialchars($board['title']); ?></h2>
				<div id="bo_content">
					<?php
						echo htmlspecialchars("$board[content]");

						if($board['file']){
							echo "<br><img src='../../upload/".$board['file']."' width='50%' height='50%'>";
						}
					?> 
				</div>
				<div id="user_info">
					<?php echo "written by ".htmlspecialchars($board['name']); ?> <?php echo "on ".$board['date']; ?>  
				</div>
				<div class="bo_ser">
					<ul>
						<?php
							if(isset($_SESSION['userid'])){
						?>
						<li><button class="moddelbutton" onclick="location.href='post_modify.php?idx=<?php echo $board['idx']; ?>'">Modify</button></li>
						<li><button class="moddelbutton" onclick="location.href='post_delete.php?idx=<?php echo $board['idx']; ?>'">Delete</button></li>
						<?php
							}
						?>
					</ul>
				</div>
			</div>
	
			<div class="reply_view">
				<h3>Comments</h3>
				<?php
					$sql3 = query("select * from reply where con_num='".$board['idx']."' order by idx desc");
					while($reply = $sql3->fetch_array()){ 
				?>
				<div class="dap_to comt_edit"><?php echo htmlspecialchars("$reply[content]"); ?></div>
				<div class="rep_me dap_to">written by <?php echo htmlspecialchars($reply['name']);?> on <?php echo $reply['date']; ?></div>	
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
		
					<div class="dat_edit">
						<form method="post" action="reply_modify_ok.php">
							<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
							<input type="password" name="pw" class="dap_sm" placeholder="Password" />
							<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
							<input type="submit" value="Edit" class="re_mo_bt">
						</form>
					</div>
					<div class='dat_delete'>
						<form action="reply_delete.php" method="post">
							<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
							<p>Password<input type="password" name="pw" /> <input type="submit" value="Conform"></p>
						</form>
					</div>
				</div>
				<?php } ?>
			
				<?php
					if(isset($_SESSION['userid'])){
				?>
				<div class="dap_ins">
					<form action="reply_ok.php?idx=<?php echo $board['idx']; ?>" method="post">
						<div style="margin-top:10px; ">
							<textarea name="content" class="reply_content" id="re_content" ></textarea>
							<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="Pseudonym">
							<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="Password">
							<button id="rep_bt" class="re_bt">comment</button>
						</div>
					</form>
				</div>
				<?php } ?>
			</div>
		<?php
		}
	} else {
		?>
		<script type="text/javascript">alert('No more posts to load');</script>
<?php
	}
}
?>
