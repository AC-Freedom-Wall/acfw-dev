<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/head.php";
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/header.php";
?>

<?php
if (isset($_SESSION['userid'])) {
    echo "<script>alert('Incorrect approach.'); history.back();</script>";
} else {
?>
    <div id="join_form_in">
        <h2>Sign up</h2>
        <form id="signupForm" action="join_ok.php" method="post">
            <div id="join_f">
                <div class="form-group">
                    <label for="userid">Username</label>
                    <div class="mb"><input type="text" class="inp" id="userid" name="userid" placeholder="Username" /></div>
                    <span class="error" id="useridError"></span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="mb"><input type="email" class="inp" id="email" name="email" placeholder="Email" /></div>
                    <span class="error" id="emailError"></span>
                </div>
                <div class="form-group">
                    <label for="userpw">Password</label>
                    <div class="mb"><input type="password" class="inp" id="userpw" name="userpw" placeholder="Password" /></div>
                    <span class="error" id="userpwError"></span>
                </div>
                <div class="form-group">
                    <label for="retypepw">Retype Password</label>
                    <div class="mb"><input type="password" class="inp" id="retypepw" name="retypepw" placeholder="Retype Password" /></div>
                    <span class="error" id="retypepwError"></span>
                </div>
                <!--<div class="form-group">
                    <label for="name">Name</label>
                    <div class="mb"><input type="text" class="inp" id="name" name="name" placeholder="Please enter a name" /></div>
                    <span class="error" id="nameError"></span>
                </div>-->
                <div class="form_btn">
                    <button type="submit" class="form_bt">Submit</button>
                    <button type="reset" class="form_bt2">Reset</button>
                </div>
            </div> <!-- join_f end -->
        </form>
    </div>
<?php
    }
?>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/www.acfw.com/server/footer.php";
?>