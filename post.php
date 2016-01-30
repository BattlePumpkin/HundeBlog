<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Post</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<?php
if (!isset($_SESSION['id'])) {
    header("Location: http://localhost/BlogProjekt/login.php");
    exit();
}
?>

<body>
<form action="checkpost.php" method="post" autocomplete="off" onsubmit="return checkformpost()">
    <label class="label">Title</label>
    <br>
    <input name="title" id="titleform" type="text" class="input">
    <br>
    <br>


    <label class="label">Content</label>
    <br>
    <textarea name="content" id="content" class="input textareacontent" maxlength="3000" cols="10"></textarea>
    <br>

    <br>
    <label class="label">Theme</label>
    <br>
    <select name="select" id="select" class="input">
        <option value="RANDOM">Random</option>
        <option value="MUSIC">Musik</option>
        <option value="STORY">Story</option>
        <option value="GAMES">Games</option>
        <option value="FILME">Filme</option>
    </select>

    <br>
    <br>
    <button type="submit" name="submit">SUBMIT</button>
</form>
<a href="frontpage.php">
    <button type="submit" name="submit">BACK</button>
</a>
</body>

</html>