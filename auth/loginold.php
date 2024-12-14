<?php
require './db.php';
require'./header.php';
require'./nav.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = true;
        header('Location: ./index.php');
    } else {
        echo "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
    input {
        margin-top: 10px !important;
    }
</style>
</head>
<body>
    <div class="container mt-5" style="border:1px solid #2BBADB; border-radius:20px; padding:30px;">
        <!-- Header -->
        <div class="text-center fs-1 mt-2 fw-bolder">Konekte</div>

        <!-- Form Section -->
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
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Modpass" 
                            required 
                            class="form-control mt-3"
                        />
                        <button type="submit" class="btn btn-primary btn-lg mt-4 w-100">
                            Konekte sou kont mw an
                        </button>
                    </form>
                    <p class="mt-3 text-center">
                        Mw poko gen yon kont 
                        <span>
                            <a href="#" class="text-primary">kreye youn</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
