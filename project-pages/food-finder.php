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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prism-themes/themes/prism-material-dark.css"> <!-- Syntax highlighting -->
        <script src="https://cdn.jsdelivr.net/npm/prismjs@1.24.0"></script>
        <link rel="stylesheet" href="../js/slick/slick.css" /> <!-- https://kenwheeler.github.io/slick/ -->
        <link rel="stylesheet" href="../js/slick/slick-theme.css" />
        <link rel="stylesheet" href="../css/main.css" /> <!-- My styles -->
        <script type="text/javascript" src="../js/scripts.js"></script>
        <script type="text/javascript" src="../js/projects-scripts.js"></script>
        <title>Alex McCaughran</title>
    </head>
    <body>
        <?php include('../config.php');        // Include config data
        include('../components/navbar.php');   // Incldue dynamic navbar
        ?>
        <main>
            <section class="project-page-header">
                <div>
                    <h1>FoodFinder</h1>
                    <h4>Swipe, swipe, eat!</h4>
                    <h4>Why swipe right just to endure awkward first dates when you can find your <b>true</b> love— your next favorite local restaurant?</h4>
                </div>
                <div class="project-header-links">
                    <a href="https://foodswipe.alex-mccaughran.net/"><img class="project-github" src="/images/play-sign.png"></a>
                    <a href="https://github.com/TattieMasher/FoodFinder"><img class="project-github" src="/images/github-sign.png"></a>
                </div>
            </section>
            <section class="project-section">
                    This fun web-app project integrates calls to both the Google Places <a class="about-link" href="https://developers.google.com/maps/documentation/places/web-service/search-nearby">Nearby Search API</a> and <a class="about-link" href="https://developers.google.com/maps/documentation/places/web-service/photos">Place Photos API</a> into a Tinder-like interface.
                    <br><br>Users are initially greeted with a stacking view of nearby restaurants, formatted into cards, which they like or dislike. After liking, they receive messages from their liked restaurant. In these messages, they're told things such as opening times, user ratings and address (along with a Google Maps link for directions).
                    <br><br>I made this responsive project entirely in React, using <a class="about-link" href="https://v2.chakra-ui.com/">ChakraUI</a> for certain components, <a class="about-link" href="https://react-icons.github.io/react-icons/">React-icons for some icons</a> and general HTML/CSS styling for others. Please give it a try, or have a read through the source code. I've highlighted some of the interesting code below and the full source can also be viewed on GitHub!
                <div class="shopping-list-swapper">
                    <ul class="tabs">
                        <li class="tab"><a href="#back-end-content">Data Interactions</a></li>
                        <li class="tab"><a href="#front-end-content">Interface Interactions</a></li>
                    </ul>
                    <div id="back-end-content" class="tab-content">
                        <?php include('../components/projects/food-data-content.php');?>
                    </div>
                    <div id="front-end-content" class="tab-content">
                        <?php include('../components/projects/food-interface-content.php');?>
                    </div>
                </div>
            </section>
        </main>
        <?php include('../components/footer.php');?>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Prism.highlightAll();
            });
        </script>

        <script src="../js/prism.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../js/slick/slick.min.js"></script>
        <script type="text/javascript" src="../js/code-slider.js"></script> <!-- Initialising slick slider -->
    </body>
</html>