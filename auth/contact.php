<?php require('header.php'); ?>
<?php require('nav.php'); ?>

<div class="container">
    <!-- Contact Header -->
    <div class="text-center fs-1 fw-bolder">
        Kontaktem
    </div>
    <div class="text-center">
        <p style="color:#9A9B9D; font-size:25px">
           Mwen la  ou Kontaktem avek nimpot question ou genyen konsènan kou yo.
        </p>
    </div>

    <!-- Contact Form -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-10" style="border:1px solid #2BBADB; border-radius:20px; padding:30px;">
            <div class="form-group">
                <?php
                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Sanitize and validate the inputs
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    $message = htmlspecialchars($_POST['w3review']);

                    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
                        // Prepare the email
                        $to = "estaliensandley14@gmail.com"; // Replace with your email address
                        $subject = "New Contact Message from " . $email;
                        $body = "You have received a new message from the contact form.\n\n";
                        $body .= "Email: " . $email . "\n";
                        $body .= "Message: \n" . $message;

                        // Send the email
                        $headers = "From: no-reply@example.com" . "\r\n" . 
                                   "Reply-To: " . $email . "\r\n" . 
                                   "X-Mailer: PHP/" . phpversion();

                        if (mail($to, $subject, $body, $headers)) {
                            // Success message
                            echo "<div class='alert alert-success'>Mwen resevwa mesaj ou a. Nou va kontakte ou byento.</div>";
                        } else {
                            // Error message if mail fails
                            echo "<div class='alert alert-danger'>Erè pandan voye mesaj la. Tanpri eseye ankò.</div>";
                        }
                    } else {
                        // Error message if validation fails
                        echo "<div class='alert alert-danger'>Tanpri, ranpli fòm nan kòrèkteman.</div>";
                    }
                }
                ?>
                
                <!-- Form -->
                <form action="" method="post">
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control" 
                        placeholder="Imèl ou" 
                        required 
                    />
                    <textarea 
                        name="w3review" 
                        rows="4" 
                        class="form-control mt-4" 
                        placeholder="Mwen se .........." 
                        required
                    ></textarea>
                    <button type="submit" class="btn btn-primary btn-lg mt-4 w-100">
                        Voye mesaj ou a
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('footer.php'); ?>
