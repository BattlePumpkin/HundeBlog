<!DOCTYPE html>
<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Checking...</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<body>
<h3>Server Message</h3>

<?php
$title = $_POST['title'];
$content = $_POST['content'];
$select = $_POST['select'];
$id = $_SESSION['id'];
$error = '';

//Datenbank überprüfen
if (!checkdatabase()) {
    $error = "Die Datenbank ist nicht erreichbar.";
}

//Mit Datenbank verbinden und SQL ausführen
if (!$error) {
    $db = db();
    $insert = $db->prepare('INSERT INTO post (title, body, tag, created_at, user_id)VALUES(:title, :body, :tag, strftime("%H:%M %d.%m.%Y", "now", "+60 minutes"), :id);');
    $insert->bindValue(':title', $title, SQLITE3_TEXT);
    $insert->bindValue(':body', $content, SQLITE3_TEXT);
    $insert->bindValue(':tag', $select, SQLITE3_TEXT);
    $insert->bindvalue(':id', $id, SQLITE3_INTEGER);
    $result = $insert->execute();

    if ($result === false) {
        $error = 'Das SQL konnte nicht ausgeführt werden: ' . $insert->lastErrorMsg();
    }
}

if ($error) {
    echo "<p>$error<p>";
    echo "<a href='register.php'><button>BACK</button></a>";
} else {
    header("Location: http://localhost/BlogProjekt/frontpage.php");
    exit();
}

?>
</body>


</html>