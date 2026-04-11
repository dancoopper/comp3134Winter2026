<?php
$conn = new mysqli("localhost", "labuser", "labpassword", "lab9");

$results = [];
if (isset($_GET["query"])) {
    $name = $_GET["query"];
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}
?>

<form method="GET">
    <input type="text" name="query" placeholder="Search by first name">
    <button type="submit">Search</button>
</form>

<table border="1">
    <tr><th>ID</th><th>Username</th><th>Email</th><th>First</th><th>Last</th><th>Active</th></tr>
    <?php foreach ($results as $row): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['firstname'] ?></td>
        <td><?= $row['lastname'] ?></td>
        <td><?= $row['active'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
