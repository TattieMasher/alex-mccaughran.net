window.onload = function() {
	navExpander();
	navScrollResize();
	
	// Delay the execution of typeAndDeleteStrings(stringsArray) by 2 seconds, to allow for other animations to occur first
    setTimeout(function() {
		const animationContainer = document.getElementById("animation-container");
		// Style animation container
		animationContainer.style.opacity = 1;
		animationContainer.style.minHeight = 100 + "px";
        typeAndDeleteStrings(stringsArray);
    }, 4500);
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
  
	  // Calculate the inverse of the scaling factor for box shadow size
	  const boxShadowScale = 1 / scale;
  
	  // Calculate the desired box shadow size based on the inverse scaling factor
	  const boxShadowSize = 20 * boxShadowScale; // Adjust this factor as needed
  
	  // Update the box shadow with the new size
	  navIcon.style.boxShadow = `0 0 0 ${boxShadowSize}px #757a79`;
  
	  // Update the previous scroll position
	  previousScrollPos = currentScrollPos;
	});
  }


function typeAndDeleteStrings(stringsArray) {
	const outputElement = document.getElementById("output");

	// Speed settings for typing, deletion, and pauses (in milliseconds)
	const typingSpeed = 75;    // Speed at which characters are typed
	const deletionSpeed = 50;   // Speed at which characters are deleted
	const pauseDuration = 1000; // Duration to pause between animations
	const rewriteDuration = 200; // Duration to pause between deletion and writing a enw string

	// Function to type a given string on screen
	function typeString(str) {
		let currentCharIndex = 0;

		// Recursive function to type the next character
		function typeNextChar() {
			if (currentCharIndex < str.length) {
				outputElement.textContent += str[currentCharIndex];
				currentCharIndex++;

				setTimeout(typeNextChar, typingSpeed);
			} else {
				setTimeout(deleteString, pauseDuration);
			}
		}

		typeNextChar();
	}

	// Function to delete the typed string from the output element
	function deleteString() {
		const currentContent = outputElement.textContent;

		if (currentContent.length > 0) {
			outputElement.textContent = currentContent.slice(0, -1);

			setTimeout(deleteString, deletionSpeed);
		} else {
			// Reset currentIndex to 0 if all strings are completed
			currentIndex = (currentIndex + 1) % stringsArray.length;

			setTimeout(() => {
				typeString(stringsArray[currentIndex]);
			}, pauseDuration);
		}
	}

  let currentIndex = 0;
  typeString(stringsArray[currentIndex]);
}

const stringsArray = ["develop interesting code.", "learn new skills.", "do other fun stuff lol."];