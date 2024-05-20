<!DOCTYPE html>
<html>
<head>
    <title>List of Letters</title>
</head>
<body>
    <h1>List of Letters</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Content</th>
            <th>Status</th>
            <th>Response</th>
        </tr>
        <?php foreach ($letters as $letter): ?>
        <tr>
            <td><?php echo $letter['id']; ?></td>
            <td><?php echo $letter['type']; ?></td>
            <td><?php echo $letter['content']; ?></td>
            <td><?php echo $letter['status']; ?></td>
            <td><?php echo $letter['admin_response']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
