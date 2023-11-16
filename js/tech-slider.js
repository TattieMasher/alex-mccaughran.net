document.addEventListener('DOMContentLoaded', function () {
    const slideTrack = document.querySelector('.slide-track');
    const slides = document.querySelectorAll('.tech-slide');
    const totalSlides = slides.length;
	
	for (let ii = 0; ii <totalSlides; ii++) {
		// Duplicate each slide
		for (let i = 0; i < totalSlides; i++) {
			let clone = slides[i].cloneNode(true);
			slideTrack.appendChild(clone);
		}
	}
});
