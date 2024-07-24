<?php
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
<div id="board_area"> 
  <h1>Algonquine College Freedom Wall</h1>
  <h4>It's an anonymous space where anyone can talk to anyone about anything.</h4>

  <span id="mem_info">
			<?php
				if(isset($_SESSION['userid'])){ //세션 userid가 있으면 페이지를 보여줍니다
					// lo_point변수에 sql쿼리결과를 저장
					$sql = query("select * from levelpoint where userid='".$_SESSION['userid']."'");
					$lo_point = $sql->fetch_array();
			?>
			Welcome <?php echo $_SESSION['userid']; ?>. &nbsp;&nbsp;&nbsp;<a href="/page/member/logout.php">Logput</a><br />
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
				<form action="/page/member/login_ok.php" method="post">
					<ul>
						<li><input type="text" name="userid" placeholder="Id" required /></li>
						<li><input type="text" name="userpw" placeholder="Password" required /></li>
            <li><button type="submit">Login</button></li>
            <li><button onclick="location.href='/page/member/join_form.php'">Registration</button></li>
          </ul>
				</form>
			<?php } ?>
		</span>

    <?php
				if(!isset($_SESSION['userid'])){
					echo "<div id='not_use'>You must be logged in to view it.</div>";
				}else if( $lo_point['point']=='0' || $lo_point['point']>'0'){
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



    <table class="list-table">
      <thead>
          <tr>
              <th width="70">No</th>
                <th width="500">Title</th>
                <th width="120">Name</th>
                <th width="100">Date</th>
                <th width="100">Hit</th>
            </tr>
        </thead>
        <?php
            if(isset($_GET['page'])){
              $page = $_GET['page'];
                }else{
                  $page = 1;
                }
                  $sql = query("select * from board");
                  $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                  $list = 5; //한 페이지에 보여줄 개수
                  $block_ct = 5; //블록당 보여줄 페이지 개수

                  $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                  $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                  $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

                  $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                  if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                  $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                  $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

                  $sql2 = query("select * from board order by idx desc limit $start_num, $list");  
                  while($board = $sql2->fetch_array()){
                  $title=$board["title"]; 
                    if(strlen($title)>30)
                    { 
                      $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                    }
                    $sql3 = query("select * from reply where con_num='".$board['idx']."'");
                    $rep_count = mysqli_num_rows($sql3);
                  ?>
<tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500"><?php 
             $lockimg = "<img src='/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
            if($board['lock_post']=="1")
            { ?>
              <a href='/page/board/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
            }else{
              $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
              $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음
          
          if($boardtime==$timenow){
            $img = "<img src='/img/new.png' alt='new' title='new' />";
          }else{
            $img ="";
          }  ?>
        <a href='/page/board/read.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?><span class="re_ct">[<?php echo $rep_count; ?>]<?php echo $img; ?></span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="page_num">
      <ul>
        <?php
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면
            echo "<li class='fo_re'>First</li>"; //처음이라는 글자에 빨간색 표시 
          }else{
            echo "<li><a href='?page=1'>First</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면 빈값
            
          }else{
          $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
            echo "<li><a href='?page=$pre'>Prev</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
            }
          }
          if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
          }else{
            $next = $page + 1; //next변수에 page + 1을 해준다.
            echo "<li><a href='?page=$next'>Next</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
          }
          if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
            echo "<li class='fo_re'>Last</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
          }else{
            echo "<li><a href='?page=$total_page'>Last</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
      </ul>
    </div>
    <div id="write_btn">
      <a href="/page/board/write.php"><button>Write</button></a>
    </div>

    <?php }else{
			echo "<div id='not_use'>This is a general-grade only board.<br />Earn 1 point for writing a post.(General Class 1 Points)</div>";
		}?>

  </div>
</body>
</html>