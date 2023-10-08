window.onload = function() {
	// Force scroll to top of page load, for best viewing
	window.scrollTo(0,0);
	
	// Delay the execution of typeAndDeleteStrings(stringsArray) by 4.5 seconds, to allow for other animations to occur first
    setTimeout(function() {
        typeAndDeleteStrings(stringsArray);
    }, 4000);

	flickerCursor();

	// Work history tooltip functionalities
	tooltipExpander();
	closeTooltipsOnClick();

	document.body.style.overflow = 'hidden';

	// Enable scrolling after 6 seconds (6000 milliseconds)
	setTimeout(enableScrolling, 6000);
};

// Function to enable scrolling after 6 seconds
function enableScrolling() {
	console.log("Starting scrolling")
	document.body.style.overflow = 'auto';
}


const stringsArray = ["develop interesting code", "play guitar", "listen to podcasts" ,"learn new skills",
	 "go bouldering", "get lost in a good story","travel to new places", "do jiu jitsu", 
	 "solve problems", "drink coffee"];

function typeAndDeleteStrings(stringsArray) {
	const outputElement = document.getElementById("command-input");

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
			// Set outputted text to current text, missing last character
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

// Function to create the flickering cursor effect that Linux terminal has
function flickerCursor() {
	const cursor = document.getElementById("command-cursor"); // Get the existing cursor span

	if (cursor) {
		// Toggle its visibility every 0.75 seconds
		setInterval(function () {
			cursor.style.visibility = cursor.style.visibility === "hidden" ? "visible" : "hidden";
		}, 750);
	}
}

// Function to show tooltips when event divs are clicked
function tooltipExpander() {
	const events = document.querySelectorAll(".event");
  
	events.forEach(function (event) {
	  event.addEventListener("click", function () {
		// Get child tooltip within clicked event and toggle the show class on it
		const tooltip = event.querySelector(".tooltip");
		tooltip.classList.toggle("show-tooltip");
	  });
	});
}

// Function to close tooltips when clicking anywhere outside
function closeTooltipsOnClick() {
	document.addEventListener("click", function (event) {
	  const tooltips = Array.from(document.querySelectorAll(".tooltip"));
	  const events = Array.from(document.querySelectorAll(".event"));

	  // Check if the click occurred outside of tooltips and events
	  if (
		!tooltips.some((tooltip) => tooltip.contains(event.target)) &&
		!events.some((eventElement) => eventElement.contains(event.target))
	  ) {
		console.log("Closing tooltips");
		// Remove the "show-tooltip" class from all tooltips
		tooltips.forEach((tooltip) => {
		  tooltip.classList.remove("show-tooltip");
		});
	  }
	});
}