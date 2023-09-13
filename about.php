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
        <?php include('config.php');    // Include config data
        include('navbar.php');          // Incldue dynamic navbar
        ?>  
        <main>
            <section id="about-section">
				<h1 id="fade-in-about1" class="section-title">Hi,<span id="fade-in-about2"> nice to meet you!</span></h1>
                <h3 id="fade-in-about3" style="text-align: center;">I'm Alex.</h3>
				<div id="about-overview">
					<div class="about-card">
                        <div id="animation-container">
                            <span id="animation-content">I love to <span id="output"></span></span>
                        </div>
                        <div id="about-card-description">
                            <p>
                                I'm a 24 year old, final-year <a class="about-link" href="https://www.open.ac.uk/courses/computing-it/degrees/bsc-computing-it-software-q62-soft">Computing & IT (Software)</a> student, studying whilst working full-time as a Techinical Analyst for Celtic FC.
                                <br><br>
                                I'm friendly, goal-driven and I thrive when encountering new problems and finding solutions to them.
                            </p>
                        </div>
					</div>
					<div class="about-card">
                        <div class="image-container">
                            <img id="me-pic" src="images/Me-500x500.png" alt="Me">
                        </div>
                    </div>                    
				</div>
                <div id="about-description">
                    <p>
                        I have a background in customer service, but a passion for computing! I'm now looking for a role that will allow me to express my love for creating clean, creative code.
                        <br><br>For a long time, I've dreamt of breaking out into the software development, but lacked the skills to do so. I've been building those skills over time, and I'm now looking to plant the seedss for a fruitful career in my dream industry.
                    </p>
                </div>
            </section>
            <section id="skills-section">
                <h3 class="section-title">Personal Traits</h3>
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
                <button id="uni expand">↑</button> <!-- TODO: Make this pretty and responsive, able to expand and collapse sections -->
                <div class="about-description">
                    <p>
                        During the first lockdown, I took a decisive step towards my dream career in software development by enrolling with the Open University degree program while balancing full-time work.
                        <br><br>Since then, I've maintained an excellent grade by using excellent time-management, fuelled by a deep desire to exceed at my commitments.
                    </p>
                </div>
                <div id="uni-summary">
                    <p>
                        Throughout my time at the Open University, I have learned about software development, networking protocols, system security, web APIs, cloud computing, ITIL service management practices, database architecture/administration, operating systems, ethics in computing, statistical analysis and much more! 
                        <br><br>Areas that have interested me most so far are studies on object-oriented programming, system administration, database querying (SQL), user experience & networking. Throughout my studies I have gained experience with a wide array of programming languages such as Java, Python, HTML, Javascript and PHP. I have also undertaken various projects within my (limited) free time, as my Github will show.
                        <br><br>I hope that now– with my developing skills and my eagerness to learn more– that I will make a good candidate to be considered for a Junior Developer position, with room to grow further (the sky's the limit!).
                    </p>
                </div>
                <div id="uni-prediction">
                    <div>
                        <h4>Average grade so far:</h4>
                        <h5>86.7% overall</h5>
                    </div>
                    <div>
                        <h4>Predicted final grade:</h4>
                        <h5>First Class Honours</h5>
                    </div>
                </div>
                <div class="uni-year">
                    <div class="uni-year-date">
                        <h4>Year 1</h4>
                        <h4>2020 - 2021</h4>
                    </div>
                    <div class="uni-year-desc">
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/tm111">TM111 - Introduction to Computing and Information Technology 1: 91%</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/mu129">MU123 - Discovering Mathematics: 91%</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/tm129">TM129 - Technologies in practice: 79%</a></h5>
                    </div>
                </div>
                <div class="uni-year">
                    <div class="uni-year-date">
                        <h4>Year 2</h4>
                        <h4>2021 - 2022</h4>
                    </div>
                    <div class="uni-year-desc">
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/tm112">TM112 - Introduction to computing and information technology 2: 88%</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/tm254">TM254 - Managing IT: the why, the what and the how: 82%</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/m250">M250 - Object-oriented Java programming: 92%</a></h5>
                    </div>
                </div>
                <div class="uni-year">
                    <div class="uni-year-date">
                        <h4>Year 3</h4>
                        <h4>2022 - 2023</h4>
                    </div>
                    <div class="uni-year-desc">
                        <h5><a class="about-link" href="http://www.open.ac.uk/courses/modules/tm352">TM352 - Web, mobile and cloud technologies: 82%</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/tt284">TT284 - Web technologies: 86.5%</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/modules/m269">M269 - Algorithms, data structures and computability: 89%</a></h5>
                    </div>
                </div>
                <div class="uni-year">
                    <div class="uni-year-date">
                        <h4>Year 4</h4>
                        <h4>2023 - 2024</h4>
                    </div>
                    <div class="uni-year-desc">
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/qualifications/details/tm358">TM358 - Machine learning and artificial intelligence</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/qualifications/details/tm354">TM354 - Software engineering</a></h5>
                        <h5><a class="about-link" href="https://www.open.ac.uk/courses/qualifications/details/tm470">TM470 - The computing and IT project</a></h5>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>