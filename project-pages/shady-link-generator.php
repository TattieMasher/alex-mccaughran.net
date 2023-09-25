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
        <script type="text/javascript" src="../js/about-scripts.js"></script>
        <title>Alex McCaughran</title>
    </head>
    <body>
        <?php include('../config.php');        // Include config data
        include('../components/navbar.php');   // Incldue dynamic navbar
        ?>
        <main>
            <section class="project-page-header">
                <div>
                    <h1>Shady Link Generator</h1>
                    <h4>This satirical project can be used for fun, to send friends and others scammy links to user-specified URLs.</h4>
                </div>
                <div class="project-header-links">
                    <a href="https://shady-link.alex-mccaughran.net/"><img class="project-github" src="/images/play-sign.png"></a>
                    <a href="https://github.com/TattieMasher/Shadifier"><img class="project-github" src="/images/github-sign.png"></a>
                </div>
            </section>
            <section class="project-section">
                <p>Full description, with code-showcases, coming soon!</p>
            </section>
        </main>
        
        <div style="margin-top: 55px;">
        <?php include('../components/footer.php');?>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Prism.highlightAll();
            });
        </script>
    </body>
</html>