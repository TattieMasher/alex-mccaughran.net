(function () {
    "use strict";

    // Vertical Slider object
    const vertical_slider = {

        // Slide class name
        slider_class: ".slider",

        // Initialize slide
        init_slider: function (slider) {
            const slide_container = slider.querySelector(".slides");
            if (slide_container) {
                const slides = slide_container.querySelectorAll(".slide");
                let currentSlideIndex = 0;

                // Show the current slide by index
                function showCurrentSlide() {
                    if (slides && slides[currentSlideIndex]) {
                        // Calculate the top position of the current slide
                        const topPosition = slides[currentSlideIndex].offsetTop - slide_container.offsetTop;

                        slide_container.scrollTo({
                            top: topPosition,
                            behavior: "smooth"
                        });

                        // Set active context item
                        const navigation_items = slider.querySelectorAll(".slide-navigation a");
                        if (navigation_items) {
                            navigation_items.forEach((item) => {
                                item.classList.remove("active-uni-link");
                            });
                            navigation_items[currentSlideIndex].classList.add("active-uni-link");
                        }
                    }
                }

                // Show the next slide
                function showNextSlide() {
                    if (currentSlideIndex < slides.length - 1) {
                        currentSlideIndex++;
                    } else {
                        currentSlideIndex = 0; // Wrap around to the first slide
                    }
                    showCurrentSlide();
                }

                // Show the previous slide
                function showPreviousSlide() {
                    if (currentSlideIndex > 0) {
                        currentSlideIndex--;
                    } else {
                        currentSlideIndex = slides.length - 1; // Wrap around to the last slide
                    }
                    showCurrentSlide();
                }

                // Add click event listeners to the previous and next buttons
                const prevButton = slider.querySelector("#prev-slide-button");
                const nextButton = slider.querySelector("#next-slide-button");

                if (prevButton && nextButton) {
                    prevButton.addEventListener("click", (e) => {
                        e.preventDefault();
                        showPreviousSlide();
                    });

                    nextButton.addEventListener("click", (e) => {
                        e.preventDefault();
                        showNextSlide();
                    });
                }

                // Add click event listeners to the direct links
                const navigation_items = slider.querySelectorAll(".slide-navigation a");
                if (navigation_items) {
                    navigation_items.forEach((item, index) => {
                        item.addEventListener("click", (e) => {
                            e.preventDefault();
                            currentSlideIndex = index;
                            showCurrentSlide();
                        });
                    });
                }

                // Initial slide display
                showCurrentSlide();
            }
        },

        // Initialize sliders
        init: function () {
            // Iterate over each slider
            document.querySelectorAll(this.slider_class).forEach((slider) => this.init_slider(slider));
        }
    };

    // Initialize sliders
    vertical_slider.init();
})();