<!DOCTYPE html>
<html>
<head>
    <title>Reply Letter</title>
</head>
<body>
    <h1>Reply to Letter</h1>
    <form action="<?php echo site_url('admin/sendReply/'.$letter['id']); ?>" method="post">
        <label for="response">Response:</label>
        <textarea name="response" required></textarea><br>
        <button type="submit">Send Reply</button>
    </form>
</body>
</html>
