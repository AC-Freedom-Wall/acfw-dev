<div class="right-menu">
        <h2>Login</h2>
        <?php
				if(isset($_SESSION['userid'])){ //세션 userid가 있으면 페이지를 보여줍니다
					// lo_point변수에 sql쿼리결과를 저장
					$sql = query("select * from levelpoint where userid='".$_SESSION['userid']."'");
					$lo_point = $sql->fetch_array();
			?>
			Welcome <?php echo $_SESSION['userid']; ?>! 🤗
			<br> <br> <a href="/www.acfw.com/server/member/logout.php">Logout</a> <br>
				<?php
				echo "You got ",$lo_point['point']," Points 😀<br><br>";
				echo "Write a post and get 5 points 😮<br>";
				echo "With uploading a picture, you get 5 points more! 😱<br>";
				echo "Comment and get 1 point 😘<br>";
				echo "And every day you log in, you get 1 point! 🫡<br><br>";
				echo "🤩 Share your story with us! 🥰";
			?>
			<?php }else{ ?><!--세션 userid체크해서 세션값 없으면 로그인 폼 표시 -->
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
    
