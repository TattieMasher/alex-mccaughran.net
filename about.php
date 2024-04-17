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
        <script type="text/javascript" src="js/tech-slider.js"></script>
        <title>Alex McCaughran</title>
    </head>
    <body>
        <?php include('config.php');        // Include config data
        include('components/navbar.php');   // Incldue dynamic navbar
        ?>  
        <main>
            <section id="about-section" class="fade-in-section">
				<h1 id="fade-in-about1" class="section-title">Hi,<span id="fade-in-about2"> nice to meet you!</span></h1>
                <?php include('components/terminal.php'); ?>
                <p class="fade-in-about3">Alongside my <a class="about-link" href="https://www.open.ac.uk/courses/computing-it/degrees/bsc-computing-it-software-q62-soft">Computing & IT (Software)</a> coursework, I work full-time as a Techinical Analyst for Celtic FC. As I approach graduation, I am keen to pursue opportunities in my dream sector– software development.   </p>
                <div id="about-overview">
					<div class="about-card">
                        <p class="about-card-description fade-in-about3">In my current role, I am primarily committed to providing valuable, data-driven business insights. I write complex, multi-purpose SQL queries to pull data and support critical decision making at all levels of the business. I compile these datasets into interesting, dynamic, interactive reports in Tableau to clearly present integral data to a variety of stakeholders.</p>
                        <p class="about-card-description-remove2 fade-in-about3">My three-man team and I are responsible for operating, maintaining and optimising Celtic's ticketing and venue entry related systems. We are super users on these and provide first-line support in resolving queries related to these, as well as ensure they operate smoothly for all users.</p>
                        <p class="about-card-description-remove2 fade-in-about3">On match days, we provide constant monitoring and on-the-fly support for our vast turnstile network, ensuring all 50,000+ supporters make it to each event.</p>
                        <p class="about-card-description-remove fade-in-about3">I constantly seek process improvements and have recently oversaw two projects: upgrading our turnstile readers across the stadium and implementing QR ticket encoding to enhance the supporter matchday entry experience. I've also undertaken several minor projects, such as an interactive web-map of our stadium and its various entrances.</p>
					</div>
                    <div class="image-container">
                        <img id="me-pic" class="fade-in-about3" src="images/Me-500x500.png" alt="Me">
                    </div>
                    <div class="about-card-alt">
                        <p class="about-card-description-alt2 fade-in-about3">My three-man team and I are responsible operating, maintaining and optimising Celtic's ticketing and venue entry related systems. We are super users on these and provide first-line support in resolving queries related to these, as well as ensure they operate smoothly for all users.</p>
                        <p class="about-card-description-alt2 fade-in-about3">On match days, we provide constant reporting and on-the-fly support for our turnstile network, ensuring all 50,000+ supporters make it to each event.</p>
                        <p class="about-card-description-alt fade-in-about3">I constantly seek process improvements and recently oversaw a project to implement QR encoding to enhance the supporter matchday entry experience. I've also undertaken several projects entirely of my own accord, such as an interactive web-map of our stadium and its various entrances.</p>
                    </div>
				</div>
            </section>
            <section id="work-section" class="fade-in-section fade-in-about3">
                <?php include('components/timeline.php'); ?>
            </section>
            <section id="skills-section" class="fade-in-section fade-in-about3">
                <h3 class="section-title">Personal Traits</h3>
                <p>I am a friendly, goal-driven individual who truly enjoys learning new skills more than anything else! When encountering new problems, I take full ownership of them and revel in finding their solutions. This is a truly deep passion of mine.</p>
                <p>I feel that high-pressure environments are where I truly shine brightest— pressure makes diamonds after all!</p>
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
                        <h4>Resilient personality</h4>
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
                    <li><div class="skill-card">
                        <h4>Analytical mindset</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Innovative problem-solver</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Ambitious</h4>
                    </div></li>
                    <li><div class="skill-card">
                        <h4>Forward-thinking</h4>
                    </div></li>
                </ul>
            </section>
            <section id="uni-section" class="fade-in-section fade-in-about3">
                <h3 class="section-title">University</h3>
                <div id="uni-summary">
                    <p>During lockdown, I took a decisive step towards my dream career in software development by enrolling in the Open University. Since then, I have maintained excellent grades whilst balancing full-time work commitments. I have done this through stellar time management, deep determination to exceed at my commitments, and (most importantly) a lot of hard work!</p>
                    <p>I am currently set to graduate with a <b>First Class Honours (1:1).</b></p>
                    <p>Throughout my time with the Open University, I have learned invaluable skills, such as software development patterns (MVC, SOLID, etc), machine learning techniques, algorithms and data structures, web development, networking protocols, system security, REST/SOAP API development, cloud computing, ITIL service management, database architecture/administration, operating system architecture, ethics in computing, statistical analysis (the list goes on!).</p>
                    <p>Of all my studies, <b>object-oriented programming</b> has interested me most and it is my dream to leverage this within a cloud environment.</p>
                </div>
                <?php include('components/uni-slider.php');?>
            </section>
            <section id="skills-section">
                <h3 class="section-title">Tech Skills</h3>
                <p>Thoughout my studies, and in my own endevours, I've used a number of technologies— too many to remember and count, in all honesty! Some of the software development technologies I'm most familiar and comfortable with are below. I am most proficient in Java and Python, since many of my university modules have been taught on these languages. 
                <?php include('components/tech-slider.php'); ?>
                <p>This website illustrates a few personal projects of mine, demonstrating my skills with some of these languages and frameworks. Please visit my <a class="about-link" href="projects.php">projects page</a> to see them in action! There, I showcase some of the code going into them.</p>
                <p>Through the development of these projects and University work, I have been further building upon my capabilities (both back-end and front-end) with every iteration of every project.</p>
            </section>
            <section id="about-section" class="fade-in-section fade-in-about3">
                <h3 class="section-title">So . . .</h3>
                <p>This website was created to promote my developing skills, and eagerness to learn and demonstrate that I will make a good candidate for Junior Software Development positions. Hopefully, you agree!</p>
                <h3 class="section-title">The sky's the limit!</h3>
            </section>
        </main>
        <script type="text/javascript" src="js/slider.js"></script> <!-- Uni slider functionality -->
        <?php include('components/footer.php');?>
        <script type="text/javascript" src="js/fade-in-sections.js"></script>
        <script type="text/javascript" src="js/tech-slider.js"></script>
    </body>
</html>