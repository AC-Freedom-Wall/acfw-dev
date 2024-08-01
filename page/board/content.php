<?php
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
?>
<div class="container">
    <div class="content">
        <h2>Your Voice, Your Space! So speak up!</h2> <br>
        <h4>This is a safe haven for voice! Join the conversation today.</h4> <br>

		<img class="photomain" src="img/studentspeakoutwatercolor.png" alt="students speakout image">

        <?php
			// start session to check if user is logged in
			if(!isset($_SESSION['userid'])){
				echo "<div id='not_use'>Kindly log in to start sharing your thoughts. See what other users are sharing below.</div>";
			}else{
		?>

		<!-- start seach box -->
		<div id="search_box">
		<h2>Search for a post here.</h2>
		<form action="/page/board/search_result_new.php" method="get">
		<select name="catgo">
			<option value="title">Title</option>
			<option value="name">Name</option>
			<option value="content">Content</option>
		</select>
		<input type="text" name="search" size="40" required="required" /> <button>Search</button>
		</form>
		</div>
		<!-- end search box -->

		<!-- start write post -->
        <div id="write_area">
			<h2>Write your post here.</h2>
			<form action="/page/board/post_write_ok.php" method="post" enctype="multipart/form-data">
				<div id="in_title">
					<textarea name="title" id="utitle" rows="1" cols="55" placeholder="Title" maxlength="100" required></textarea>
				</div>
				<div class="wi_line"></div>
				<div id="in_name">
					<textarea name="name" id="uname" rows="1" cols="55" placeholder="Pseudonym" maxlength="100" required></textarea>
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
		<!-- end write post -->
		<?php
			} // end of session check
		?>

		<?php
			// load the latest 5 posts
			$result = query("SELECT * FROM board ORDER BY idx DESC LIMIT 5");
		?>
		<!-- start display posts -->
		<div id="posts">
		<?php
			// check if there are posts
			if ($result->num_rows > 0) {
				while($board = $result->fetch_array()){
		?>
			<div id="board_read">
				<h2><?php echo $board['title']; ?></h2> <!-- title -->
					<div id="bo_content">
						<?php
							echo nl2br("$board[content]"); // content
							
							if($board['file']){
								echo "<br><img src='/upload/".$board['file']."' width='50%' height='50%'>"; // image
							}
						?> 
					</div>
					<div id="user_info"> <!-- user info -->
						<?php echo "written by ".$board['name']; ?> <?php echo "on ".$board['date']; ?>  
					</div>
					<div class="bo_ser"> <!-- modify, delete buttons -->
						<ul>
							<?php
								if(isset($_SESSION['userid'])){
							?>
							<li><button class="moddelbutton" onclick="location.href='/page/board/post_modify.php?idx=<?php echo $board['idx']; ?>'">Modify</button></li>
							<li><button class="moddelbutton" onclick="location.href='/page/board/post_delete.php?idx=<?php echo $board['idx']; ?>'">Delete</button></li>
							<?php
								}
							?>
						</ul>
					</div>
			</div>

			<!--- start comments -->
			<div class="reply_view">
				<h3>Comments</h3>
				<?php
					// start query to get comments
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
						// check if user is logged in
						if(isset($_SESSION['userid'])){
					?>

						<li><button class="dat_edit_bt" href="#">Modify</a></li>
						<li><button class="dat_delete_bt" href="#">Delete</a></li>

					<?php
						}
					?>
					</ul>
					</div>

					<!-- comment edit form for dialog and it's hiding -->
					<div class="dat_edit">
						<form method="post" action="/page/board/reply_modify_ok.php">
							<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
							<input type="password" name="pw" class="dap_sm" placeholder="Password" />
							<textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
							<input type="submit" value="Edit" class="re_mo_bt">
						</form>
					</div>
					<!-- comment delete and it's hiding -->
					<div class='dat_delete'>
						<form action="/page/board/reply_delete.php" method="post">
							<input type="hidden" name="rno" value="<?php echo $reply['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $board['idx']; ?>">
							<p>Password<input type="password" name="pw" /> <input type="submit" value="Conform"></p>
							</form>
					</div>
				</div> <!-- end of div class="dap_lo" -->
				<?php 
					} // end of while loop
				?>

				<!--- comment input form -->
				<?php
					// check if user is logged in
					if(isset($_SESSION['userid'])){
				?>
				<!-- comment form -->
				<div class="dap_ins">
					<form action="/page/board/reply_ok.php?idx=<?php echo $board['idx']; ?>" method="post">
						<div style="margin-top:10px; ">
							<textarea name="content" class="reply_content" id="re_content" ></textarea>
							<input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="Pseudonym">
							<input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="Password">
							<button id="rep_bt" class="re_bt">comment</button>
						</div>
					</form>
				</div>
				<?php
					} 
				?>
			</div><!--- end of div class="reply_view" -->
			<?php
			} // end of while loop
		} else {
			echo "0 results";
		} // end of if statement
		?>

		</div> <!-- end of div id="posts" -->
		<!-- Load More button -->
		<button id="loadMore">Load More</button>
	</div> <!-- end of div class="content" -->
	<?php
		include $_SERVER['DOCUMENT_ROOT']."/right-menu.php";
	?>
</div> <!-- end of div class="container" -->
<?php
	include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>