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
        <script type="text/javascript" src="js/about-scripts.js"></script>
        <title>Alex McCaughran</title>
    </head>
    <body>
        <?php include('config.php');        // Include config data
        include('components/navbar.php');   // Incldue dynamic navbar
        ?>
        <main>
            <section id="projects-section">
                <a class="project-link" href="project-pages/password-manager.php"><div class="project-card">
                    <img class="project-pic" src="images/projects/thumbs/PasswordManagerThumb.jpg">
                    <div class="project-text">
                        <h5 class="project-header">Android Password Manager</h5>
                        <p class="project-desc">
                            A simple android app which creates an SQLite table containing account details and can generate complex, secure passwords.
                        </p>
                    </div>
                </div></a>

                <div class="project-card">
                    <a class="project-link" href="project-pages/shady-link-generator.php"><img class="project-pic" src="images/projects/thumbs/ShortenerThumb.png">
                    <div class="project-text">
                        <h5 class="project-header">Shady URL Generator</h5>
                        <p class="project-desc">
                            A parody of sorts on the URL shortening services we've all seen and used.
                        </p>
                    </div>
                </div></a>

                <div class="project-card">
                    <div class="project-pic"></div>
                    <div class="project-text">
                        <h5 class="project-header">Compound Interest Android App</h5>
                        <p class="project-desc">
                            Android app to calculate compound interest over set periods of time.
                        </p>
                    </div>
                </div>
                <div class="project-card">
                    <div class="project-pic"></div>
                    <div class="project-text">
                        <h5 class="project-header">Android app</h5>
                        <p class="project-desc">
                            Lorem ipsum. This is an app which does something lol, what more description do you need?
                        </p>
                    </div>
                </div>
            </section>
        </main>
        <?php include('components/footer.php');?>
    </body>
</html>