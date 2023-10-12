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
                    $from = "enquiries@alex-mccaughran.net";
                    $to = "hello@alex-mccaughran.net";
                    $message = "Name: " . $_POST['name'] . "\n";
                    $message .= "Email/Phone: " . $_POST['contact'] . "\n";
                    $message .= "Purpose: " . $_POST['purpose'] . "\n";
                    $message .= "Message:\n" . $_POST['message'];
                    $headers = "From:" . $from;
                    $subject = "Contact Form Submission - " . $_POST['purpose'];

                    if (mail($to, $subject, $message, $headers)) {
                        include('components/contact-success.php');
                    } else {
                        include('components/contact-failure.php');
                    }
                } else {
                    include('components/contact-form.php');
                }
                ?>
                </div>
            </section>
        </main>
        <?php include('components/footer.php');?>
    </body>
</html>