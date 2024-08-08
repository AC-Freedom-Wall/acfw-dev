<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: right-menu.php
	description: This file is used to display the right menu of the website.
-->
	
<div class="right-menu">
        <h2>Login</h2>
        <?php
				if(isset($_SESSION['userid'])){ //Show the page if the session userid exists
					// Save the SQL query result in the lo_point variable
					$sql = query("select * from levelpoint where userid='".$_SESSION['userid']."'");
					$lo_point = $sql->fetch_array();
			?>
			Welcome <?php echo $_SESSION['userid']; ?>! 🤗
			<br> <br> <a href="/www.acfw.com/server/member/logout.php">Logout</a> <br>
				<?php
				echo "You got ",$lo_point['point']," Points 😀<br><br>";
				echo "Write a post and get 5 points 😮<br>";
				echo "By uploading a picture, you get 5 more points! 😱<br>";
				echo "Comment and get 1 point 😘<br>";
				echo "And every day you log in, you get 1 point! 🫡<br><br>";
				echo "🤩 Share your story with us! 🥰";
			?>
			<?php }else{ ?><!--Check session userid and show login form if no session value -->
				<form class="login-form" action="/www.acfw.com/server/member/login_ok.php" method="post">
					<ul>
						<li><input type="text" name="userid" placeholder="Username" required /></li>
						<li><input type="text" name="userpw" placeholder="Password" required /></li><br>
            <li><button type="submit">Login</button></li>
            <li><button onclick="location.href='/www.acfw.com/server/member/join_form.php'">Registration</button></li>
          </ul>
				</form>
			<?php } ?>

            </div>
    
