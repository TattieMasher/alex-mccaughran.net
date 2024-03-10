<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="robots" content="noindex, nofollow">
        <meta charset="utf-8" />
        <meta name="author" content="Alex McCaughran" />
        <!-- Set viewport to ensure this page scales correctly on mobile devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">  <!-- Google fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css" /> <!-- My styles -->
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/index-scripts.js"></script>
        <title>Alex McCaughran</title>
    </head>
    <body>
        <?php include('config.php');        // Include config data
        include('components/navbar.php');   // Incldue dynamic navbar
        ?>
        <main>
            <section id="intro">
				<h1 id="fade-in-hi" class="page-title">Hi!  <span id="fade-in-wave">👋</span><br><span id="fade-in-alex">I'm Alex<span id="fade-in-end">.</span></span></h1>
				<p class="fade-in-index-content_1">I am currently in my final year of Open University studying BSc (Honours) in Computing & IT (Software). I have a deep passion for all things scientific and IT-related.</p>
				<p class="fade-in-index-content_2">I aim to break into the software development industry.</p>
                <p class="fade-in-index-content_3">My vision in building this website was to showcase my potential, store and deploy projects, and share my enthusiasm for software development.</p>
				<p class="fade-in-index-content_4">I hope this labour of love is an interactive and engaging way to demonstrate my skills and ability to write clean, functional code to do interesting things.  </p>
				<br><br>
            </section>
        </main>
        <?php include('components/footer.php');?>
    </body>
</html>