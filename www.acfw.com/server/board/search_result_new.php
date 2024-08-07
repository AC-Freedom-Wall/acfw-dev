<!--
	author: Andres Julian Rivera Ariza, aebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: search_result_new.php
	description: This file is used to display the search results from the board.
-->

<?php
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/head.php";
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/header.php";
?>

<div class="container">
    <div class="content">
<?php
 $catagory = $_GET['catgo'];
 $search_con = $_GET['search'];
?>
 <h2>'<?php echo $catagory; ?>' from '<?php echo $search_con; ?>' Search results</h2>
 <h4 ><a style="background-color: gray" href="/www.acfw.com/">Back to home</a></h4>

 <?php
          $result = query("select * from board where $catagory like '%$search_con%' order by idx desc");
?>
 <!-- Display the posts -->
 <div id="posts">
 <?php
if ($result->num_rows > 0) {
  while($board = $result->fetch_array()){
?>

<div id="board_read">
	<h2><?php echo htmlspecialchars($board['title']); ?></h2>

		<div id="bo_content">
			<?php 
				echo htmlspecialchars("$board[content]");
				
				if($board['file']){
					echo "<br><img src='/www.acfw.com/upload/".$board['file']."' width='50%' height='50%'>";
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
			<!-- <li><a href="/">[Back to list]</a></li> -->
			<li><button class="moddelbutton" onclick="location.href='/www.acfw.com/server/board/post_modify.php?idx=<?php echo $board['idx']; ?>'">Modify</button></li>
			<li><button class="moddelbutton" onclick="location.href='/www.acfw.com/server/board/post_delete.php?idx=<?php echo $board['idx']; ?>'">Delete</button></li>
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
				<form method="post" action="/www.acfw.com/server/board/reply_modify_ok.php">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
					<input type="password" name="pw" class="dap_sm" placeholder="Password" />
					<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
					<input type="submit" value="Edit" class="re_mo_bt">
				</form>
			</div>

			<div class='dat_delete'>
				<form action="/www.acfw.com/server/board/reply_delete.php" method="post">
					<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
			 		<p>Password<input type="password" name="pw" /> <input type="submit" value="Confirm"></p>
				 </form>
			</div>
		</div>
	<?php } ?>

	<?php
				if(isset($_SESSION['userid'])){
			?>
	<div class="dap_ins">
		<form action="/www.acfw.com/server/board/reply_ok.php?idx=<?php echo $board['idx']; ?>" method="post">
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
  echo "0 results";
}
?>

<div id="search_box2">
      <form action="/www.acfw.com/server/board/search_result_new.php" method="get">
      <select name="catgo">
        <option value="title">Title</option>
        <option value="name">Name</option>
        <option value="content">Content</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>Search</button>
    </form>
  </div>

</div>
</div>

</div>
<?php
	include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/footer.php";
?>