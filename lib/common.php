<?php
//session starten
session_start();

// root Dateipfad
function getRootPath()
{
    return realpath(__DIR__ . '/..');
}

// Dateipfad Datenbank
function getDatabasePath()
{
    return getRootPath() . '/database/data.db';
}

function db()
{
	return new SQLite3(getDatabasePath());
}

//Datenbank überprüfen
function checkdatabase()
{
	if(is_readable(getDatabasePath()))
	{
		return true;
	}
	else
	{
		return false;
	}
}

if(isset($_POST['logout']))
{
	unset($_SESSION['id']);
	header("Location: http://localhost/BlogProjekt/index.php");
	exit();
}

function selectuser($id)
{
	$db = db();
	$stmt = $db->prepare('SELECT * FROM user WHERE id=:id');
	$stmt->bindValue(':id', $id, SQLITE3_INTEGER);

	$result = $stmt->execute();
	$fetch = $result->fetchArray();
	return $fetch;
}

function selectpost($id)
{
	$db = db();
	$stmt = $db->prepare('SELECT * FROM post WHERE id=:id');
	$stmt->bindValue(':id', $id, SQLITE3_INTEGER);

	$result = $stmt->execute();
	$fetch = $result->fetchArray();
	return $fetch;
}

?>