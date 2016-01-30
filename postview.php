<!DOCTYPE html>
<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Post lesen</title>
    <link rel="stylesheet" href="postviewstyle.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<?php
if (!isset($_SESSION['id'])) {
    header("Location: http://localhost/BlogProjekt/login.php");
    exit();
}
if (!isset($_GET['id'])) {
    header("Location: http://localhost/BlogProjekt/frontpage.php");
    exit();
}
?>

<body>
<div id="main">
    <?php
    $db = db();
    $stmt = $db->prepare('SELECT * FROM post WHERE id=:id');
    $stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
    $result = $stmt->execute();
    while ($fetch = $result->fetchArray())
    {
    echo "<h1>" . $fetch['title'] . "</h1>";
    echo "<h3>" . $fetch['tag'] . "</h3>";
    echo "<h4>" . $fetch['created_at'] . "</h4>";
    ?>
    <?php
    ?><p><?php foreach (preg_split("/((\r?\n)|(\r\n?))/", $fetch['body']) as $line) {
            echo $line . '<br>';
        } ?></p>

    <a href="userview.php?id=<?php echo $fetch['user_id']; ?>"><h4>Created by<br><?php echo selectuser($fetch['user_id'])['username'] ?></h4></a>
    <a href="frontpage.php">
        <button>HOME</button>
    </a>
    <?php
    if ($_SESSION['id'] == $fetch['user_id']) { ?>
        <a href="editpost.php?id=<?php echo $_GET['id'] ?>"><button>EDIT</button></a>
        </a>
    <?php }
    ?>
</div>
<?php }
?>

</div>

<script type="text/javascript" src="scripts/jquery.nailthumb.1.1.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.nailthumb').nailthumb();
    });
</script>

</body>

</html>