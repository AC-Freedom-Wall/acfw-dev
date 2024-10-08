<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: post_modify.php
	description: This file is used to modify a post from the board.
-->
    
<?php
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/head.php";
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/db.php";
include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/header.php";
?>

<?php
	$bno = $_GET['idx'];
	$sql = query("select * from board where idx='$bno';");
	$board = $sql->fetch_array();
 ?>
    <div id="board_write">      
        <h3>Edit your post below.</h3>
            <div id="write_area">
                <form action="/www.acfw.com/server/board/post_modify_ok.php?idx=<?php echo $bno; ?>" method="post">
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
                
                <button id="back-to-freeboard" onclick="history.back()">Back to Freeboard</button>
            </div>
        </div>
    </body>
</html>