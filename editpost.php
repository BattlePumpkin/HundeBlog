<!DOCTYPE html>
<?php
	require_once 'lib/common.php';
	?>

	<?php
	if(!isset($_SESSION['id']))
	{
		header("Location: http://localhost/BlogProjekt/index.php");
		exit();
	}
	?>

	<html>

		<head>
		    <title>Edit your Post</title>
		    <link rel="stylesheet" href="style.css">
		    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		</head>

		<body>
			<h3>Edit</h3>
			<p>Please enter your changes :)</p>
				<form action="checkeditpost.php?id=<?php echo $_GET['id']; ?>" method="post" autocomplete="off" onsubmit="return checkformpost()">
				<label class="label">Title</label>
				<br>
				<input name="title" value="<?php echo selectpost($_GET['id'])['title']; ?>" id="titleform" type="text" class="input">
				<br>

				<br>
				<label class="label">Content</label>
				<br>
				<textarea name="content" id="content"class="input textareacontent" maxlength="7000" cols="10"><?php echo selectpost($_GET['id'])['body']; ?></textarea>
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
				<button type="submit" name="submit">SUBMIT</button><button type="submit" name="delete">DELETE</button>
			</form>
			<a href="postview.php?id=<?php echo $_GET['id'];?>"><button type="submit" name="submit">BACK</button></a>
		</body>

		<script src="scripts/validate.js"></script>

	</html>