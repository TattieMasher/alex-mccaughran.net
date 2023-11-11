<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="robots" content="noindex, nofollow">
        <meta charset="utf-8" />
        <meta name="author" content="Alex McCaughran" />
        <!-- Set viewport to ensure this page scales correctly on mobile devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- Google fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" /> <!-- My styles -->
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <title>Alex McCaughran</title>
    </head>
    <body>
        <?php include('config.php');        // Include config data
        include('components/navbar.php');   // Incldue dynamic navbar
        ?>
        <main>
            <section id="contact-section">
                <div id="contact-form-container">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $captcha = $_POST['g-recaptcha-response'];
                    $secretKey = "6LeKXwkpAAAAAH3NBbmZMlOnVngj7ZDqnMQ_LmWm";
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                    $responseKeys = json_decode($response,true);
                    
                    if($responseKeys["success"]) {
                        // CAPTCHA was entered correctly, process the form
                        $from = "enquiries@alex-mccaughran.net";
                        $to = "hello@alex-mccaughran.net";
                        $message = "Name: " . $_POST['name'] . "\n";
                        $message .= "Email/Phone: " . $_POST['contact'] . "\n";
                        $message .= "Purpose: " . $_POST['purpose'] . "\n";
                        $message .= "Message:\n" . $_POST['message'];
                        $headers = "From:" . $from;
                        $subject = "Contact Form Submission - " . $_POST['purpose'];

                        if (mail($to, $subject, $message, $headers)) {
                            include('components/contact-success.php'); // Email success
                        } else {
                            include('components/contact-failure.php'); // Email error
                        }
                    } else {
                        // Captcha error
                        include('components/contact-failure.php'); // TODO: Do something specific for Captcha? Maybe 
                    }
                } else {
                    include('components/contact-form.php'); // Show the form when no POST request
                }
                ?>
                </div>
            </section>
        </main>
        <?php include('components/footer.php');?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </body>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>