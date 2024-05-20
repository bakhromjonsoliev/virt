<!DOCTYPE html>
<html>
<head>
    <title>Create Letter</title>
</head>
<body>
    <h1>Create Letter</h1>
    <form action="<?php echo site_url('letter/createLetter'); ?>" method="post">
        <label for="type">Type:</label>
        <select name="type">
            <option value="request">Request</option>
            <option value="suggestion">Suggestion</option>
            <option value="complain">Complain</option>
        </select><br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
