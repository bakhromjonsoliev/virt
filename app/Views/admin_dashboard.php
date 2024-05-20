<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Content</th>
            <th>Status</th>
            <th>Response</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($letters as $letter): ?>
        <tr>
            <td><?php echo $letter['id']; ?></td>
            <td><?php echo $letter['type']; ?></td>
            <td><?php echo $letter['content']; ?></td>
            <td><?php echo $letter['status']; ?></td>
            <td><?php echo $letter['admin_response']; ?></td>
            <td>
                <?php if ($letter['status'] == 'unread'): ?>
                <a href="<?php echo site_url('admin/markAsRead/'.$letter['id']); ?>">Mark as Read</a> |
                <?php endif; ?>
                <a href="<?php echo site_url('admin/reply/'.$letter['id']); ?>">Reply</a> |
                <a href="<?php echo site_url('admin/delete/'.$letter['id']); ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
