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
                    <h1>HistoryHike</h1>
                    <h4>Explore the world, complete quests, and unlock artefacts! This full-stack gamified mobile app integrates real-world exploration with objectives and rewards.</h4>
                </div>
                <div class="project-header-links">
                    <a href="https://github.com/TattieMasher/Android-Password-Manager"><img class="project-github" src="/images/github-sign.png"></a>
                </div>
            </section>
            <section class="project-section">
                <p>
                    HistoryHike is a highly ambitious location-based Android application designed to make exploration fun, interactive, and rewarding. The project is the culmination of advanced technical integration, with a frontend written in Java using Android Studio and a robust backend powered by a Spring Boot REST API hosted on a dedicated VPS.
                    <br><br>The app allows users to:
                    <ul>
                        <li>Complete location-based quests displayed on an interactive map.</li>
                        <li>Earn and collect unique artefacts tied to real-world locations.</li>
                        <li>Manage account details, track progress, and view their artefact collection.</li>
                    </ul>
                    This project involved designing complex backend systems with JWT authentication, secure database management, and a dynamic API capable of handling user-specific data like quests and artefacts. On the frontend, GPS features and interactive UI elements were implemented for seamless user interaction.
                    <br><br>
                    The scale of HistoryHike is vast, blending real-world data with gamification principles, and it stands as one of the most technically challenging and rewarding projects I’ve completed to date, netting me a <u>90% grade</u> for technical work in my University studies.
                </p>
                  <!-- TODO: REMOVE THE BELOW -->
                <h2>If you're seeing this page, please note that this write-up is a work in progress. There are more snippets and descriptions to come.</h2>
                <div class="shopping-list-swapper">
                    <ul class="tabs">
                        <li class="tab"><a href="#database-content">Database</a></li>
                        <li class="tab"><a href="#spring-content">Spring Boot REST API</a></li>
                        <li class="tab"><a href="#app-content">Android App</a></li>
                    </ul>
                    <div id="database-content" class="tab-content">
                        <?php include('../components/projects/history-database-content.php');?>
                    </div>
                    <div id="spring-content" class="tab-content">
                        <?php include('../components/projects/history-backend-content.php');?>
                    </div>
                    <div id="app-content" class="tab-content">
                        <?php include('../components/projects/history-app-content.php');?>
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