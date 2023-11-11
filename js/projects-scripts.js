window.onload = function() {
    const tabs = document.querySelectorAll(".tabs .tab");
    const tabContents = document.querySelectorAll(".tab-content");

    tabs.forEach((tab, index) => {
        tab.addEventListener("click", (e) => {
            e.preventDefault(); // Prevent the default behavior of the link
            tabs.forEach((t) => t.classList.remove("active"));
            tabContents.forEach((content) => content.classList.remove("active"));

            tab.classList.add("active");
            tabContents[index].classList.add("active");
        });
    });

    // Activate the first tab and content by default
    tabs[0].click();

    // from scripts.js
    navExpander();
	navScrollResize();
};