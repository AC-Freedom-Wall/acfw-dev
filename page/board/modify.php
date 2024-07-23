<!--- 게시글 수정 -->
<?php
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
<?php
	$bno = $_GET['idx'];
	$sql = query("select * from board where idx='$bno';");
	$board = $sql->fetch_array();
 ?>
    <div id="board_write">
        <h1><a href="/">Freeboard</a></h1>
        <h4>Edit your post.</h4>
            <div id="write_area">
                <form action="modify_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="Title" maxlength="100" required><?php echo $board['title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="Id" maxlength="100" required><?php echo $board['name']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="Content" required><?php echo $board['content']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="pw" id="upw"  placeholder="Password" required />  
                    </div>
                    <div class="bt_se">
                        <button type="submit">Write a post</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>