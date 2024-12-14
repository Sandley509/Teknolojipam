<?php

require './db.php';  // Include database connection
require './header.php';  // Include header (if you have one)
require './nav.php';  // Include navigation (if you have one)

// Initialize error message variable
$error_message = '';

// Handle email form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Email exists, generate a code and send it to the user
        $verification_code = rand(100000, 999999);  // Random 6-digit code

        // Save the code to the session (or database) to verify later
        $_SESSION['verification_code'] = $verification_code;
        $_SESSION['email'] = $email;

        // Send the code to the user's email
        mail($email, "Your Verification Code", "Your verification code is: $verification_code");

        // Inform the user to check their email
        $error_message = "A verification code has been sent to your email. Please check your inbox.";
    } else {
        // Email does not exist in the database
        $error_message = "Email address not found. Please register first.";
    }
}

// Handle verification code form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verification_code'])) {
    $entered_code = $_POST['verification_code'];
    $stored_code = $_SESSION['verification_code'];
    $email = $_SESSION['email'];

    // Check if the entered code matches the one sent to the user's email
    if ($entered_code == $stored_code) {
        // Successful verification: log the user in
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;
            header('Location: ./index.php');
            exit();
        }
    } else {
        // Incorrect verification code
        $error_message = "Invalid verification code. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Login</title>
    <style>
        input {
            margin-top: 10px !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5" style="border:1px solid #2BBADB; border-radius:20px; padding:30px;">
        <div class="text-center fs-1 mt-2 fw-bolder">Konekte</div>

        <?php if (!isset($_SESSION['verification_code'])): ?>
            <!-- Step 1: Enter email -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="form-group">
                        <form method="POST" action="">
                            <input 
                                type="email" 
                                name="email" 
                                placeholder="Imèl" 
                                required 
                                class="form-control"
                            />
                            <button type="submit" class="btn btn-primary btn-lg mt-4 w-100">
                                Voye kòd verifikasyon
                            </button>
                            <p class="text-primary mt-2">Ou poko gen kont? <a href="./courseprice.php?">Kreye yon kont</a></p>
                        </form>
                        <!-- Show error message if any -->
                        <?php if ($error_message): ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Step 2: Enter verification code -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="form-group">
                        <form method="POST" action="">
                            <input 
                                type="text" 
                                name="verification_code" 
                                placeholder="Kòd verifikasyon" 
                                required 
                                class="form-control"
                            />
                            <button type="submit" class="btn btn-primary btn-lg mt-4 w-100">
                                Konfime kòd verifikasyon
                            </button>
                            <p class="text-primary mt-2">Ou poko gen kont? <a href="./courseprice.php?">Kreye yon kont</a></p>
                        </form>
                        <!-- Show error message if any -->
                        <?php if ($error_message): ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
