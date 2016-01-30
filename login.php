<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<?php
if (isset($_SESSION['id'])) {
    header("Location: http://localhost/BlogProjekt/frontpage.php");
}
?>

<body>
<div id="main">
    <form action="checklogin.php" method="post" id="loginform" autocomplete="off">

        <label class="label">Email</label>
        <br>
        <span class="span">Enter your email here</span>
        <br>
        <input type="email" name="email" id="email" class="input">
        <br>


        <label class="label">Password</label>
        <br>
        <span class="span">Your password</span>
        <br>
        <input type="password" name="password" id="password" class="input">

        <br>
        <button type="submit" name="submit">LOGIN</button>
    </form>
    <a href="index.php">
        <button>BACK</button>
    </a>
</div>
</body>

</html>