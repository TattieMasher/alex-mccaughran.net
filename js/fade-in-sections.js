// Get all the section elements
const sections = document.querySelectorAll('section');
const skills = document.getElementsByClassName('skill-card');

// Intersection Observer options
const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.33, // Adjust this value as needed
};

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, options);

// Observe each section
sections.forEach(section => {
    observer.observe(section);
});