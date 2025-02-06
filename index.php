<?php

session_start();
// Hardcoded username and password
$validUsername = 'brenda';
$validPassword = 'virtuoStudiosToYourService!35';

// Check if the form is submitted (after the modal form is submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if credentials are correct
    if ($username === $validUsername && $password === $validPassword) {
        // Store session data
        $_SESSION['logged_in'] = true;
        $loginSuccess = true; // To show content after successful login
    } else {
        // Invalid credentials
        $loginError = 'Invalid username or password';
    }
}
// If logged in, show content
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    require_once("./logica.php");
    require_once("./page.php");
} else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Simple modal styling */
        .modal { display: none; }
        .modal.show { display: block; }
    </style>
</head>
<body class="bg-gray-100">

<!-- The Modal -->
<div id="loginModal" class="modal fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-80">
        <h2 class="text-2xl font-bold mb-4">Login</h2>
        
        <?php if (isset($loginError)): ?>
            <div class="text-red-500 mb-4"><?= htmlspecialchars($loginError) ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-semibold">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Login</button>
            </div>
        </form>
    </div>
</div>

<!-- Your page content (only visible after successful login) -->
<div class="container mx-auto p-8">
    <?php if (isset($loginSuccess) && $loginSuccess): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold">Welcome to the Dashboard</h1>
            <p class="mt-4">You are logged in successfully!</p>
        </div>
    <?php endif; ?>
</div>

<script>
    // Show the login modal when the page loads
    window.onload = function() {
        var modal = document.getElementById('loginModal');
        modal.classList.add('show');
    }
</script>

</body>
</html>
<?php } ?>