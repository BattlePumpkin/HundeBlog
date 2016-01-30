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

	<div id="person">
		<h2>Update.</h2>
			<h3>Server Message</h3>
			<?php
				$title = $_POST["title"];
				$content = $_POST["content"];
				$select = $_POST["select"];
				$delete = 
				$error = '';

				if(!checkdatabase())
				{
					$error = "Die Datenbank ist nicht erreichbar.";
				}

				if(isset($_POST['delete']) && !$error)
				{
					if(!$error)
					{
						$db = db();
						$delete = $db->prepare("DELETE FROM post WHERE id=:id");
						$delete->bindValue(":id", $_GET['id'], SQLITE3_INTEGER);
						$result = $delete->execute();

						if($result === false)
						{
							$error = 'Das SQL konnte nicht ausgeführt werden: ' . $result->lastErrorMsg();
						}
					}
				}


				//update
				if(isset($_POST['submit']) && !$error)
				{
					$db = db();
					$update = $db->prepare("UPDATE post SET title=:title, summary=:summary, body=:content, tag=:tag WHERE id=:id;");
					$update->bindValue(":title", $_POST['title'], SQLITE3_TEXT);
					$update->bindValue(":summary", $_POST['summary'], SQLITE3_TEXT);
					$update->bindValue(":content", $_POST['content'], SQLITE3_TEXT);
					$update->bindValue(":summary", $_POST['summary'], SQLITE3_TEXT);
					$update->bindValue(":tag", $_POST['select'], SQLITE3_TEXT);
					$update->bindValue(":id", $_GET['id'], SQLITE3_INTEGER);

					$result = $update->execute();

					if($result === false)
					{
						$error = 'Das SQL konnte nicht ausgeführt werden: ' . $result->lastErrorMsg();
					}
				}

				if(!$error)
				{
					echo "<p>The Update was succesfull<p>";
					echo "<a href='frontpage.php'><button>HOME</button></a>";
				}
				else
				{
					echo "<p>$error<p>";
					echo "<a href='login.php'><button>BACK</button></a>";
				}
	
			?>
	</div>

</html>