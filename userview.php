<!DOCTYPE html>
<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Profil</title>
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
<h1><?php echo selectuser($_GET['id'])['username'] ?>'s World</h1>
<a href="frontpage.php">
            <button name="home">HOME</button>
</a><br>
<div id="main">

    <h1> Posts</h1>
    <div id="posts">
        <?php
        $db = db();
        $stmt = $db->prepare('SELECT * FROM post WHERE user_id=:id ORDER BY id DESC');
        $stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
        $result = $stmt->execute();
        while ($fetch = $result->fetchArray()) {
    
            echo '<h3>' . $fetch['tag'] . '</h3>';
            echo '<h1>' . $fetch['title'] . '</h1>';
            echo '<h4>' . $fetch['created_at'] . '</h4>';
            ?>
            </h2><?php
            echo '</div>';
        }
        if ($result->fetchArray() === false) {
            echo "<h2>There is nothing</h2>";
        }
        ?>
    </div>


</div>

<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.nailthumb.1.1.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.nailthumb').nailthumb();
    });
</script>
</body>


</html>