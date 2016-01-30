<!DOCTIYPE html>

<?php
require_once 'lib/common.php';
?>
<html>
<head>
    <title>Checking...</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>

<h2>Login.</h2>
<div idgggf="main">
    <h3>Server Message</h3>

    <?php
    $email = $_POST['email'];
    $password = $_POST["password"];
    $error = '';

    if (!checkdatabase()) {
        $error = "Die Datenbank ist nicht erreichbar.";
    }

    //Username überprüfen
    if (!$error) {
        $db = db();
        $select = $db->query("SELECT * FROM user");

        while ($fetch = $select->fetchArray()) {

            if ($fetch['email'] == $email && password_verify($password, $fetch['password'])) {
                $_SESSION['id'] = $fetch['id'];
                header("Location: http://localhost/BlogProjekt/frontpage.php");
                exit();
                break;
            } else {
                $error = "Diese Kombination von Benutzername und Password gibt es nicht.";
            }
        }
    }

    if ($error) {
        echo "<p>$error</p>";
        echo "<a href='login.php'><button>BACK</button></a>";
    } else {
        echo "<p>Entweder sind gar keine User registriert oder ein fataler Fehler ist passiert.</p>";
    }

    ?>
</div>


</html>