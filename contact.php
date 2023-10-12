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
        echo "Thank you for your message. I will be sure to get back to you soon!";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}
?>

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
                <h1 class="section-title">If you like what you see, do get in touch!</h1>
                <h3>You can either reach me at <a class="about-link" href="mailto:someone@yoursite.com">hello@alex-mccaughran.net</a>, or use the form below to get in touch.</h3>
                <div id="contact-form-container">
                    <form id="contact-form" method="POST">
                        <div class="contact-row">
                            <label for="name">Name:</label>
                            <input type="text" id="form-name" name="name" required>
                        </div>

                        <div class="contact-row">
                            <label for="contact">Email Address or Phone Number:</label>
                            <input type="text" id="contact" name="contact" required>
                        </div>

                        <div class="contact-row">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                        </div>

                        <div class="contact-row">
                            <label for="purpose">Purpose for Contact:</label>
                            <select id="purpose" name="purpose">
                                <option value="Career Opportunity">Career Opportunity</option>
                                <option value="Feedback">Feedback</option>
                                <option value="Collaboration">Collaboration</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <button type="submit" onclick="">Submit</button>
                    </form>
                </div>
            </section>
        </main>
        <?php include('components/footer.php');?>
    </body>
</html>