<div class="right-menu">
        <h2>Login</h2>
        <?php
				if(isset($_SESSION['userid'])){ //세션 userid가 있으면 페이지를 보여줍니다
					// lo_point변수에 sql쿼리결과를 저장
					$sql = query("select * from levelpoint where userid='".$_SESSION['userid']."'");
					$lo_point = $sql->fetch_array();
			?>
			Welcome <?php echo $_SESSION['userid']; ?>. &nbsp;&nbsp;&nbsp;<a href="/page/member/logout.php">Logout</a><br />
				<?php
					switch ($lo_point['point']) {
					case '0':
					echo "Member Grade : 0 Points";
					break;

					case '1':
					echo "Member Grade : 1 Points";
					break;

					case '2':
					echo "Member Grade : 2 Points";
					break;
					
					case '3';
					echo "Member Grade : 3 Points";
					break;

					case '4';
					echo "Member Grade : 4 Points";
					break;

					default:
					echo "Member Grade : Admin ",$lo_point['point'],"Points";
					break;
				} //switch문 끝 
			?>
			<?php }else{ ?><!--세션 userid체크해서 세션값 없으면 로그인 폼 표시 -->
				<form class="login-form" action="/page/member/login_ok.php" method="post">
					<ul>
						<li><input type="text" name="userid" placeholder="Id" required /></li>
						<li><input type="text" name="userpw" placeholder="Password" required /></li>
            <li><button type="submit">Login</button></li>
            <li><button onclick="location.href='/page/member/join_form.php'">Registration</button></li>
          </ul>
				</form>
			<?php } ?>

            </div>
    
