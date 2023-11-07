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
                    <h1>Shopping List Generator</h1>
                    <h4>Simplify the most difficult part of your weekly shop– the planning! Supply this application with the meals you wish to have, then allow it to tell you all that you need.</h4>
                    <h4>Meal prep made easy.</h4>
                </div>
                <div class="project-header-links">
                    <a href="https://shopping-list.alex-mccaughran.net/"><img class="project-github" src="/images/play-sign.png"></a>
                    <a href="https://github.com/TattieMasher/Android-Password-Manager"><img class="project-github" src="/images/github-sign.png"></a>
                </div>
            </section>
            <section class="project-section">
                <p>
                    I created this web-app to simplify the (seemingly) monumental task of meal prepping. It streamlines the meal planning process by allowing users to input meals with their ingredients. It then compiles these meal details into an aggregated shopping list, where ingredient quantities are combined to give a comprehensive shopping list.
                    <br><br>Built with a React front-end, the app interacts with a Spring Boot REST API hosted on a VPS, supplying real-time data management with a MySQL database. Users can plan meals, manage ingredients, and quantities, then generate a combined shopping list containing all their required ingredients.
                    <br><br>
                </p>
                <div class="shopping-list-swapper">
                    <ul class="tabs">
                        <li class="tab"><a href="#front-end-content">Front-end</a></li>
                        <li class="tab"><a href="#back-end-content">Back-end</a></li>
                    </ul>
                    <div id="front-end-content" class="tab-content">
                        <?php include('../components/shopping-frontend-content.php');?>
                    </div>
                    <div id="back-end-content" class="tab-content">
                        <?php include('../components/shopping-backend-content.php');?>
                    </div>
                </div>
            </section>
        </main>
        <?php include('../components/footer.php');?>

        <script src="../js/prism.js"></script>
    </body>
</html>