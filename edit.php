<?php include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM events WHERE id=$id");
$row = $result->fetch_assoc();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = $_POST['event_date'];
    $sql = "UPDATE events SET title='$title', description='$desc', event_date='$date' WHERE id=$id";
    if ($conn->query($sql)) {
        $msg = "Updated successfully!";
        header("Location: index.php");
    } else {
        $msg = "Update failed.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Event</h2>
<p><?= $msg ?></p>
<form method="post">
    <input type="text" name="title" value="<?= $row['title'] ?>" required>
    <textarea name="description"><?= $row['description'] ?></textarea>
    <input type="date" name="event_date" value="<?= $row['event_date'] ?>" required>
    <button type="submit">Update</button>
    <a href="index.php" class="btn">Cancel</a>
</form>
</body>
</html>
