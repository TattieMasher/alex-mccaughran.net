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
        <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@700&family=Ubuntu+Mono:wght@400;700&family=Ubuntu:wght@700&display=swap" rel="stylesheet">  <!-- Linux Terminal Font -->
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
            <section id="about-section">
				<h1 id="fade-in-about1" class="section-title">Hi,<span id="fade-in-about2"> nice to meet you!</span></h1>
                <?php include('components/terminal.php'); ?>
                <div id="about-overview">
					<div class="about-card">
                        <p class="about-card-description">I'm a 25 year old, final-year <a class="about-link" href="https://www.open.ac.uk/courses/computing-it/degrees/bsc-computing-it-software-q62-soft">Computing & IT (Software)</a> student, studying whilst working full-time as a Techinical Analyst for Celtic FC.</p>
                        <p class="about-card-description">I have a background in customer service, with a recent history in IT-realted roles, but a passion for computing!</p>
                        <p class="about-card-description">I'm now looking for a role that will allow me to express my love for creating clean, creative code.</p>
                        <p class="about-card-description-remove">For a long time, I've dreamt of breaking out into the software development, but lacked the skills to do so.</p>
                        <p class="about-card-description-remove">By studying part-time, I've been building those skills and I'm now looking to plant the seeds for a fruitful career in my dream industry.</p>
					</div>
                    <div class="image-container">
                        <img id="me-pic" src="images/Me-500x500.png" alt="Me">
                    </div>
                    <div class="about-card-alt">
                        <p class="about-card-description-alt">For a long time, I've dreamt of breaking out into the software development, but lacked the skills to do so.</p>
                        <p class="about-card-description-alt">By studying part-time, I've been building those skills and I'm now looking to plant the seeds for a fruitful career in my dream industry.</p>
                    </div>
				</div>
            </section>
            <section id="skills-section">
                <h3 class="section-title">Personal Traits</h3>
                <p>I'm friendly, goal-driven individual who truly enjoys learning new skills more than anything else! When encountering new problems, I revel in finding solutions to them. It's a firm belief of mine that it's necessary to take full responsibility of a task and own it completely. </p>
                <ul id="skills-overview">
                    <li><div class="skill-card">
                        <h4>Enthusiastic learner</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Highly motivated</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Effective communicator</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Meticulous attention to detail</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Strong time management</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Positive attitude</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Team player</h4>
                    </div></li>
                </ul>
            </section>
            <section id="uni-section">
                <h3 class="section-title">University</h3>
                <div id="uni-summary">
                    <p>During the first lockdown, I took a decisive step towards my dream career in software development by enrolling with the Open University degree program while balancing full-time work.                    </p>
                    <p>Since then, I've maintained an excellent grade by using excellent time-management, fuelled by a deep desire to exceed at my commitments. If my current trajectory is maintained, <b>I will graduate comfortably with a First Class Honours (1:1).</b></p>
                    <p>Throughout my time at the Open University, I have learned about software development, networking protocols, system security, web APIs, cloud computing, ITIL service management practices, database architecture/administration, operating systems, ethics in computing, statistical analysis and the list goes on(!), but <b>object-oriented programming has intereseted me the most by far.</b></p>
                </div>

                <?php include('components/uni-slider.php');?>
            </section>
            <section id="about-section">
                <h3 class="section-title">So . . .</h3>
                <p>I hope that now- with my developing skills and my eagerness to learn more– that I will make a good candidate to be considered for a Junior Developer position, with room to grow into my full potential.</p>

                <h3 class="section-title">The sky's the limit!</h3>
            </section>
        </main>
        <script type="text/javascript" src="js/slider.js"></script> <!-- Uni slider functionality -->
        <?php include('components/footer.php');?>
    </body>
</html>