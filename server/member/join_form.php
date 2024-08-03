<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Algonquine College Freedom Wall">
    <meta name="keywords" content="Algonquine, College, Freedom, Wall">
    <meta name="author" content="ACFW dev group Co., Ltd. GhNM">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <meta name="format-detection" content="email=no">
    <meta name="theme-color" content="#ffffff">
    <title>Algonquin College Freedom Wall</title>
    <link rel="stylesheet" type="text/css" href="../../css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="../../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../css/aboutus.css" />
    <link rel="stylesheet" type="text/css" href="../../css/contactus.css" />
</head>
<body>
<header>
    <h1 id="mainpageheader"><a href="../../index.php">Algonquin College Freedom Wall</a></h1>
</header>

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
<script type="text/javascript" src="../../scripts/jquery.min.js"></script>
<script type="text/javascript" src="../../scripts/jquery-ui.js"></script>
<script type="text/javascript" src="../../scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../scripts/common.js"></script>

<footer>
<nav class="footer-links">
      <a href="../../index.php">Home</a>
      <a href="../aboutus.php">About Us</a>
      <a href="../contactus.php">Contact Us</a>
</nav>
<br>
<span>Algonquin College Freedom Wall</span><br>
    <span "footer-text"><em>"Speak out!"</em></span><br>
    <span "footer-text">&copy; 2024</span>
</footer>

</body>
</html>