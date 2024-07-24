<?php
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
<div id="board_area"> 
  <h1>Algonquine College Freedom Wall</h1>
  <h4>It's an anonymous space where anyone can talk to anyone about anything.</h4>

  <span id="mem_info">
    <?php
      if(isset($_SESSION['userid'])){ // If session userid exists, show the page
        // Store the result of the SQL query in the lo_point variable
        $sql = query("SELECT * FROM levelpoint WHERE userid='".$_SESSION['userid']."'");
        $lo_point = $sql->fetch_array();
    ?>
    Welcome <?php echo $_SESSION['userid']; ?>. &nbsp;&nbsp;&nbsp;<a href="/page/member/logout.php">Logout</a><br />
      <?php
        switch ($lo_point['point']) {
        case '0':
          echo "Member Grade: 0 Points";
          break;

        case '1':
          echo "Member Grade: 1 Point";
          break;

        case '2':
          echo "Member Grade: 2 Points";
          break;
          
        case '3':
          echo "Member Grade: 3 Points";
          break;

        case '4':
          echo "Member Grade: 4 Points";
          break;

        default:
          echo "Member Grade: Admin ",$lo_point['point'],"Points";
          break;
      } // End of switch statement
    ?>
    <?php } else { ?><!-- If session userid is not present, show login form -->
      <form action="/page/member/login_ok.php" method="post">
        <ul>
          <li><input type="text" name="userid" placeholder="Id" required /></li>
          <li><input type="text" name="userpw" placeholder="Password" required /></li>
          <li><button type="submit">Login</button></li>
          <li><button onclick="location.href='/page/member/join_form.php'">Register</button></li>
        </ul>
      </form>
    <?php } ?>
  </span>

  <?php
    if(!isset($_SESSION['userid'])){
      echo "<div id='not_use'>You must be logged in to view it.</div>";
    } else if($lo_point['point'] == '0' || $lo_point['point'] > '0'){
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
      } else {
        $page = 1;
      }
      $sql = query("SELECT * FROM board");
      $row_num = mysqli_num_rows($sql); // Total number of records in the board
      $list = 5; // Number of items to show per page
      $block_ct = 5; // Number of pages to show per block

      $block_num = ceil($page / $block_ct); // Get the current page block
      $block_start = (($block_num - 1) * $block_ct) + 1; // Starting number of the block
      $block_end = $block_start + $block_ct - 1; // Ending number of the block

      $total_page = ceil($row_num / $list); // Calculate the total number of pages
      if($block_end > $total_page) $block_end = $total_page; // If the block end is greater than the total number of pages, set block end to the total number of pages
      $total_block = ceil($total_page / $block_ct); // Calculate the total number of blocks
      $start_num = ($page - 1) * $list; // Starting number for the query

      $sql2 = query("SELECT * FROM board ORDER BY idx DESC LIMIT $start_num, $list");  
      while($board = $sql2->fetch_array()){
        $title = $board["title"]; 
        if(strlen($title) > 30) { 
          $title = str_replace($board["title"], mb_substr($board["title"], 0, 30, "utf-8") . "...", $board["title"]);
        }
        $sql3 = query("SELECT * FROM reply WHERE con_num='".$board['idx']."'");
        $rep_count = mysqli_num_rows($sql3);
    ?>
    <tbody>
      <tr>
        <td width="70"><?php echo $board['idx']; ?></td>
        <td width="500"><?php 
          $lockimg = "<img src='/img/lock.png' alt='lock' title='lock' width='20' height='20' />";
          if($board['lock_post'] == "1") { ?>
            <a href='/page/board/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
          } else {
            $boardtime = $board['date']; // Store board date in the boardtime variable
            $timenow = date("Y-m-d"); // Store current date in the timenow variable

            if($boardtime == $timenow) {
              $img = "<img src='/img/new.png' alt='new' title='new' />";
            } else {
              $img = "";
            } ?>
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
        if($page <= 1) {
          echo "<li class='fo_re'>First</li>"; // Display "First" in red if page is 1 or less
        } else {
          echo "<li><a href='?page=1'>First</a></li>"; // Link to the first page
        }
        if($page <= 1) {
          // Do nothing if page is 1 or less
        } else {
          $pre = $page - 1; // Previous page number
          echo "<li><a href='?page=$pre'>Prev</a></li>"; // Link to the previous page
        }
        for($i = $block_start; $i <= $block_end; $i++) {
          // Loop through the block start to block end
          if($page == $i) {
            echo "<li class='fo_re'>[$i]</li>"; // Highlight the current page number
          } else {
            echo "<li><a href='?page=$i'>[$i]</a></li>"; // Link to other pages
          }
        }
        if($block_num >= $total_block) {
          // Do nothing if the current block is the last block
        } else {
          $next = $page + 1; // Next page number
          echo "<li><a href='?page=$next'>Next</a></li>"; // Link to the next page
        }
        if($page >= $total_page) {
          echo "<li class='fo_re'>Last</li>"; // Display "Last" in red if page is the last page
        } else {
          echo "<li><a href='?page=$total_page'>Last</a></li>"; // Link to the last page
        }
      ?>
    </ul>
  </div>
  <div id="write_btn">
    <a href="/page/board/write.php"><button>Write</button></a>
  </div>

  <?php } else {
    echo "<div id='not_use'>This is a general-grade only board.<br />Earn 1 point for writing a post. (General Class 1 Point)</div>";
  }?>

</div>
</body>
</html>
