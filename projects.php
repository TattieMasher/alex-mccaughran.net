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
        <title>Alex McCaughran</title>
    </head>
    <body>
        <?php include('config.php');        // Include config data
        include('components/navbar.php');   // Incldue dynamic navbar
        ?>
        <main class="project-wrapper">
            <section id="projects-section">
                <div class="project-card">
                    <a class="project-link" href="project-pages/shopping-list-generator.php">
                        <img class="project-pic" src="images/projects/thumbs/ShoppingThumb.png">
                        <div class="project-text">
                            <h5 class="project-header">Shopping List Generator</h5>
                            <p class="project-desc">
                                A utility web-app to create an aggregated shopping list based on the meals provided to it.
                            </p>
                        </div>
                    </a>
                </div>
                
                <div class="project-card">
                    <a class="project-link" href="project-pages/food-finder.php">
                        <img class="project-pic" src="images/projects/thumbs/TinderThumb.png">
                        <div class="project-text">
                            <h5 class="project-header">FoodFinder</h5>
                            <p class="project-desc">
                                Tinder-style web-app with a twist that uses Google Places API to obtain local restaurant information.
                            </p>
                        </div>
                    </a>
                </div>

                <div class="project-card">
                    <a class="project-link" href="project-pages/shady-link-generator.php">
                        <img class="project-pic" src="images/projects/thumbs/ShortenerThumb.png">
                        <div class="project-text">
                            <h5 class="project-header">Shady URL Generator</h5>
                            <p class="project-desc">
                                A parody of sorts on the URL shortening services we've all seen and used.
                            </p>
                        </div>
                    </a>
                </div>

                <div class="project-card">
                    <a class="project-link" href="project-pages/password-manager.php">
                        <img class="project-pic" src="images/projects/thumbs/PasswordManagerThumb.jpg">
                        <div class="project-text">
                            <h5 class="project-header">Android Password Manager</h5>
                            <p class="project-desc">
                                Simple android app to manage account details and can generate complex, secure passwords.
                            </p>
                        </div>
                    </a>
                </div>

                <div class="project-card">
                    <a class="project-link" href="project-pages/compound-interest.php">
                        <img class="project-pic" src="images/projects/thumbs/InterestThumb.png">
                        <div class="project-text">
                            <h5 class="project-header">Compound Interest Android App</h5>
                            <p class="project-desc">
                                Calculate compound interest over set periods of time.
                            </p>
                        </div>
                    </a>
                </div>
                
            </section>
        </main>
        <?php include('components/footer.php');?>
    </body>
</html>