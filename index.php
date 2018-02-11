<?php 
	$db = mysqli_connect('localhost', 'root', '', 'todo');
	
	if (isset($_POST['submit'])){
		$task = $_POST['task'];
		
		mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
		header('location: index.php');
	}
		if (isset($_GET['del_task'])) {
			$id = $_GET['del_task'];
			mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
			header('location: index.php');
		}
		$tasks = mysqli_query($db, "SELECT * FROM tasks");
?>

<html>
<head>
	<title>To do app</title>
	 <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
	<div class="Title">
		<h2>Todo APP</h2>
	</div>
	
	<form method="POST" action="index.php">
		<input type="text" name="task" class="task_input" required>
		<button type="submit" class="btn" name="submit">add todo</button>
	</form>
	<table>
		<thead>
			<tr>
				<th>Number</th>
				<th>items</th>
				
			</tr>
		</thead>
		<tbody>
		<?php while ($row = mysqli_fetch_array($tasks)) { ?>
		<tr>
				<td><?php echo $row['id']; ?></td>
				<td class="task"><?php echo $row['task']; ?></td>
				<td class="delete">
					<a href="index.php? del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php } ?>
			
		</tbody>
	</table>
</body>
</html>