<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Manager</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Event List</h2>
<a href="create.php" class="btn">Add Event</a>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM events");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['event_date'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn">Edit</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn delete">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
