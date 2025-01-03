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
        include('components/navbar.php');   // Include dynamic navbar
        ?>
        <main>
            <section id="intro">
				<h1 id="fade-in-hi" class="page-title">Hi!  <span id="fade-in-wave">👋</span><br><span id="fade-in-alex">I'm Alex<span id="fade-in-end">.</span></span></h1>
				<p class="fade-in-index-content_1">I recently graduated from the Open University with a First-Class Honours degree in BSc Computing & IT (Software). I now work as a Graduate Software Developer with Müller UK & Ireland, where I apply my skills to develop impactful software solutions.</p>
				<p class="fade-in-index-content_2">I am passionate about continuous learning and growth in the software development field.</p>
                <p class="fade-in-index-content_3">I built this website to showcase my skills, deploy my projects, and share my enthusiasm for software development.</p>
				<p class="fade-in-index-content_4">This labour of love is designed to be an interactive and engaging demonstration of my ability to craft clean, functional code that solves real-world problems and inspires creativity.</p>
				<br><br>
            </section>
        </main>
        <?php include('components/footer.php');?>
    </body>
</html>
