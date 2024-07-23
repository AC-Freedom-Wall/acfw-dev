<?php
include $_SERVER['DOCUMENT_ROOT']."/header.php";
include $_SERVER['DOCUMENT_ROOT']."/db.php";
?>
    <div id="board_write">
        <h1><a href="/">Free Board</a></h1>
        <h4>The space where you write your posts.</h4>
        <div id="write_area">
                <form action="write_ok.php" method="post" enctype="multipart/form-data">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="Title" maxlength="100" required></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="name" id="uname" rows="1" cols="55" placeholder="Name" maxlength="100" required></textarea>
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
        </div>
    </body>
</html>