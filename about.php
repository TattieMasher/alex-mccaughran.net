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
                <p class="fade-in-about3">Having graduated with <b>First-Class Honours</b> in my <a class="about-link" href="https://www.open.ac.uk/courses/computing-it/degrees/bsc-computing-it-software-q62-soft">Computing & IT (Software)</a> degree, I now work with Müller UK & Ireland as a Graduate Software Developer. I develop innovative software solutions and support existing business-critical applications while collaborating within an agile team to drive business-wide continuous improvement.</p>
                <div id="about-overview">
                    <div class="about-card">
                        <p class="about-card-description fade-in-about3">In my current role, I design, develop, test, and deploy software applications using Microsoft technologies such as C#, ASP.NET, SQL Server, and Azure. I am actively involved in all stages of the Software Development Lifecycle, from requirement gathering, to development, to user acceptance testing and deployment. This ensures that the solutions I deliver closely align with business objectives and stakeholder needs.</p>
                        <p class="about-card-description-remove2 fade-in-about3">As part of an agile team, I am follow best practices and deliver value through collaboration. I play a key role when designing our software by sharing ideas, gathering requirements, and ensuring compliance with company standards while supporting seamless integration across teams.</p>
                        <p class="about-card-description-remove2 fade-in-about3">In addition to development work, I assist with integration testing, user acceptance testing, and thorough documentation of software designs and specifications. By engaging directly with stakeholders and end users, I ensure that all deliverables meet or exceed expectations.</p>
                        <p class="about-card-description-remove fade-in-about3">I continuously seek opportunities to enhance my technical expertise, including working with cloud services, DevOps tools, and business intelligence systems. My proactive approach supports both personal growth and the delivery of impactful software solutions that drive efficiency and innovation across the organisation.</p>
                    </div>
                    <div class="image-container">
                        <img id="me-pic" class="fade-in-about3" src="images/Me-500x500.png" alt="Me">
                    </div>
                    <div class="about-card-alt">
                        <p class="about-card-description-alt2 fade-in-about3">In my role at Müller, I focus on developing high-quality software applications that meet the needs of the business and its stakeholders. Leveraging technologies like C#, SQL Server, and Azure, I ensure that each solution is both robust and scalable.</p>
                        <p class="about-card-description-alt2 fade-in-about3">I actively contribute to all phases of the software development lifecycle, including requirement gathering, sprint planning, and delivery. My collaboration with stakeholders ensures that the solutions I develop align with the business's goals and standards.</p>
                        <p class="about-card-description-alt fade-in-about3">I am passionate about learning and continuously enhancing my technical and problem-solving skills. By collaborating with colleagues and stakeholders, I aim to deliver innovative solutions that drive success and efficiency across the organization.</p>
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
                <p>During the COVID-19 lockdown, I took a decisive step towards my dream career in software development by enrolling in the Open University. Balancing full-time work with my studies required stellar time management, deep determination, and a relentless work ethic—qualities that I have cultivated throughout my journey.</p>
                <p>I graduated with a <b>First Class Honours (1:1)</b>, a result I am immensely proud of. My final project, a comprehensive software development initiative, received an exceptional <b>90%</b>, highlighting my ability to apply technical knowledge and innovative thinking to real-world challenges.</p>
                <p>Throughout my time with the Open University, I gained invaluable skills, including software development patterns (MVC, SOLID, etc.), machine learning techniques, algorithms and data structures, web development, networking protocols, system security, REST/SOAP API development, cloud computing, ITIL service management, database architecture/administration, operating system architecture, ethics in computing, and statistical analysis (the list goes on!).</p>
                <p>Of all my studies, <b>object-oriented programming</b> interested me most, and I am eager to continue leveraging this expertise in cloud environments and beyond.</p>
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