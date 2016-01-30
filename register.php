<!DOCTIYPE html>

<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<body>
<div id="main">
<form action="checkregistration.php" method="post" id="registerform" autocomplete="off" onsubmit="return checkform()">
    <label class="label">Username</label>
    <br>
    <span class="span">Your username has to be longer than 5 characters</span>
    <br>
    <input name="username" id="username" type="text" class="input" onchange="usernamecheck()">
    <br>

    <label class="label">Email</label>
    <br>
    <span class="span">Enter a valid Email</span>
    <br>
    <input name="email" id="email" type="email" class="input" onchange="emailcheck()">
    <br>

    <label class="label">Password</label>
    <br>
    <span class="span">Your password must be at least 8 characters</span>
    <br>
    <input name="password" id="password" type="password" onchange="passwordcheck()" class="input">
    <br>

    <label class="label">Confirm Password</label>
    <br>
    <span class="span">Confirm your password</span>
    <br>
    <input name="passwordconfirm" id="passwordconfirm" onchange="passwordconfirmcheck()" type="password" class="input">

    <br>
    <button type="submit" name="submit">CONFIRM</button>
</form>
</div>
<a href="index.php">
    <button>BACK</button>
</a>
<script src="scripts/validate.js"></script>
</body>
</html>
