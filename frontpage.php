<!DOCTIYPE html>

<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<body>
        <div id="welcome">
        <h5>Welcome <?php echo selectuser($_SESSION['id'])['username']; ?></h5>
        <h3>Wanna post something?</h3>
        <a href="post.php">
            <button name="post">POST</button>
        </a><br>
        <br>
        <form method="post" action="lib/common.php">
            <button name="logout">LOGOUT</button>
        </form>
    </div>

<div id="main">
    <?php
    echo '<h5>Blogs</h5>';
    $db = db();
    $stmt = $db->prepare('SELECT * FROM post ORDER BY id DESC');
    $result = $stmt->execute();
    while ($fetch = $result->fetchArray()) {

        echo '<h1>' . selectuser($fetch['user_id'])['username'] . '</h1>';
        echo '<a href="postview.php?id=' . $fetch['id'] . '">';
        echo '<h3>' . $fetch['tag'] . '</h3>';
        echo '<h1>' . $fetch['title'] . '</h1>';
        echo '<h4>' . $fetch['created_at'] . '</h4>';
        ?>
        <?php
        echo '</a>';

        echo '</div>';
    }

    if ($result->fetchArray() == false) {
        echo "<h2>No Entries found :( Be the first one!</h2>";
    }
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