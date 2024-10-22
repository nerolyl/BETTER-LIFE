<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile Test Page</title>
</head>
<body>
    <h1>Update Profile</h1>
    <form action="update_profile.php" method="post" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture" accept="image/*" required><br><br>
        
        <input type="submit" value="Update Profile">
    </form>

    <?php if (isset($_GET['username']) && isset($_GET['profile_picture'])): ?>
        <h2>Updated Profile</h2>
        <p>Username: <?php echo htmlspecialchars($_GET['username']); ?></p>
        <p>Profile Picture:</p>
        <img src="<?php echo htmlspecialchars($_GET['profile_picture']); ?>" alt="Profile Picture" style="max-width: 200px;">
    <?php endif; ?>
</body>
</html>