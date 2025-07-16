<?php include 'db.php'; ?>
<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = $_POST['event_date'];
    $sql = "INSERT INTO events (title, description, event_date) VALUES ('$title', '$desc', '$date')";
    if ($conn->query($sql)) {
        $msg = "Event added successfully!";
    } else {
        $msg = "Failed to add event.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add New Event</h2>
<p><?= $msg ?></p>
<form method="post">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description"></textarea>
    <input type="date" name="event_date" required>
    <button type="submit">Submit</button>
    <a href="index.php" class="btn">Back</a>
</form>
</body>
</html>
