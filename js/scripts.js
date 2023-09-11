window.onload = function() {
	navExpander();
	navScrollResize();
};

function navExpander() {
	document.getElementById("menu-toggle").addEventListener("click", function() {
		document.querySelector(".navbar-links").classList.toggle("show");
	});
}

function navScrollResize() {
	let previousScrollPos = window.pageYOffset;
	let currentScrollPos = window.pageYOffset;
  
	const navIcon = document.getElementById("alex-pic"); // Reference to the image icon
  
	window.addEventListener("scroll", function() {
	  currentScrollPos = window.pageYOffset;
	  const navbar = document.getElementById("navbar");
	  const navbarLinks = document.getElementsByClassName("navbar-links")[0]; // Select the first element with navgbar-links class TODO: Amend this to ID, not class
  
  
	  // Calculate the difference in scroll position
	  const scrollDiff = currentScrollPos - previousScrollPos;
  
	  // Set the effectMultiplier based on scrolling direction
	  let effectMultiplier;
	  if (scrollDiff > 0) {
		effectMultiplier = 0.15; // Increase slower when scrolling down
	  } else {
		effectMultiplier = 0.3; // Increase faster when scrolling up
	  }
  
	  // Calculate the new height for the navbar
	  let newHeight = parseInt(getComputedStyle(navbar).height) - scrollDiff * effectMultiplier;
  
	  // Limit the new height within a reasonable range
	  newHeight = Math.min(Math.max(newHeight, 40), 90); // Limit between 40px and 90px
  
	  // Set the new height for the navbar
	  navbar.style.height = newHeight + "px";
	  
	  // Calculate the position for navbar-links
	  const navbarBottom = navbar.offsetTop + newHeight;
	  const navbarLinksTop = Math.min(window.innerHeight - parseInt(getComputedStyle(navbarLinks).height), navbarBottom);
  
	  // Update the style of navbar-links
	  navbarLinks.style.top = navbarLinksTop + "px";
  
	  // Calculate the proportional scaling factor based on navbar height
	  const initialNavbarHeight = 90; // Default navbar height in pixels
	  const newNavbarHeight = parseInt(getComputedStyle(navbar).height);
	  const scale = newNavbarHeight / initialNavbarHeight;
  
	  // Apply proportional scaling to the image icon
	  navIcon.style.transform = `scale(${scale})`;
  
	  // Calculate the inverse of the scaling factor for box shadow size around navbar icon
	  const boxShadowScale = 1 / scale;
  
	  // Calculate the desired box shadow size based on the inverse scaling factor
	  const boxShadowSize = 20 * boxShadowScale; // Adjust this factor as needed
  
	  // Update the box shadow with the new size
	  navIcon.style.boxShadow = `0 0 0 ${boxShadowSize}px #757a79`;
  
	  // Update the previous scroll position
	  previousScrollPos = currentScrollPos;
	});
}