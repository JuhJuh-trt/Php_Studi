<?php
session_start();

// Sample user data (replace with your actual user data)
$users = [
    'admin' => [
        'password' => 'admin123',
        'role' => 'admin',
    ],
    'user' => [
        'password' => 'user123',
        'role' => 'user',
    ],
];

function login($username, $password) {
    global $users;

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $users[$username]['role'];
        return true;
    }

    return false;
}

function logout() {
    session_unset();
    session_destroy();
}

// Example usage:

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (login($username, $password)) {
            header('Location: dashboard.php'); // Redirect to dashboard or user home page
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } elseif (isset($_POST['logout'])) {
        logout();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
</head>
<body>

<?php if (isset($_SESSION['username'])): ?>
    <p>Welcome, <?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['role']; ?>)!</p>
    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
<?php else: ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="login" value="Login">
    </form>

    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>