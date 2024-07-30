<?php
include $_SERVER['DOCUMENT_ROOT']."/head.php";
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>

<div id="board_area"> 
<!-- 18.10.11 검색 추가 -->
<?php
 
  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
?>
  <h1><?php echo $catagory; ?>form '<?php echo $search_con; ?>'Search results</h1>
  <h4 ><a style="background-color: gray" href="/">Back to home</a></h4>
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
          $sql2 = query("select * from board where $catagory like '%$search_con%' order by idx desc");
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
          <td width="500">
            <?php 
              $lockimg = "<img src='/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
              if($board['lock_post']=="1")
              { ?><a href='/page/board/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
              }else{?>

        <!--- 추가부분 18.08.01 --->
        <?php
          $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
          $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음
          
          if($boardtime==$timenow){
            $img = "<img src='/img/new.png' alt='new' title='new' />";
          }else{
            $img ="";
          }
          ?>
        <!--- 추가부분 18.08.01 END -->
        <a href='/page/board/read.php?idx=<?php echo $board["idx"]; ?>'><span style="background:grey;"><?php echo $title; }?></span><span class="re_ct">[<?php echo $rep_count;?>]<?php echo $img; ?> </span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>

        </tr>
      </tbody>

      <?php } ?>
    </table>
    <!-- 18.10.11 검색 추가 -->
    <div id="search_box2">
      <form action="/page/board/search_result.php" method="get">
      <select name="catgo">
        <option value="title">Title</option>
        <option value="name">Name</option>
        <option value="content">Content</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>Search</button>
    </form>
  </div>
</div>
</body>
</html>

