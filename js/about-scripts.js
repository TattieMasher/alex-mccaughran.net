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

	// Code from scripts.js
	navExpander();
	navScrollResize();
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
	console.log("Tooltip expander function called."); // Add this line for debugging
  
	const events = document.querySelectorAll(".event");
  
	events.forEach(function (event) {
	  event.addEventListener("click", function () {
		console.log("Event clicked."); // Add this line for debugging
  
		// Get child tooltip within clicked event and toggle the show class on it
		const tooltip = event.querySelector(".tooltip");
		tooltip.classList.toggle("show-tooltip");
  
		// Reset the scroll position of all tooltip content to the top
		if (tooltip.classList.contains("show-tooltip")) {
		  console.log("Tooltip is shown."); // Add this line for debugging
  
		  const tooltipContents = tooltip.querySelectorAll(".left, .right, .central");
		  tooltipContents.forEach(function (tooltipContent) {
			tooltipContent.scrollTop = 0; // Reset scroll position to the top
		  });
  
		  // Calculate the position of the tooltip and its width
		  const tooltipRect = tooltip.getBoundingClientRect();
		  const tooltipWidth = tooltipRect.width;
  
		  // Calculate the distance from the right edge of the screen
		  const distanceToRightEdge = window.innerWidth - tooltipRect.right;
		  console.log("Distance to right edge:", distanceToRightEdge); // Add this line for debugging
  
			// Check if the tooltip is too close to the right edge
			if (distanceToRightEdge < tooltipWidth) {
				// Check if there is enough space on the left, otherwise reposition to the right
				if (tooltipRect.left - tooltipWidth > 0) {
				tooltip.style.left = (tooltipRect.left - tooltipWidth) + 'px';
				} else {
				// Reposition the tooltip to the right (default position)
				tooltip.style.left = (tooltipRect.left + tooltipWidth) + 'px';
				}
			}
		}
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
		// Remove the "show-tooltip" class from all tooltips
		tooltips.forEach((tooltip) => {
		  tooltip.classList.remove("show-tooltip");
		});
	  } else {
		// Clicked on an event, so close all tooltips first
		tooltips.forEach((tooltip) => {
		  tooltip.classList.remove("show-tooltip");
		});
  
		// Find the clicked event
		const clickedEvent = events.find((eventElement) =>
		  eventElement.contains(event.target)
		);
  
		// Find the tooltip associated with the clicked event and open it
		if (clickedEvent) {
		  const tooltip = clickedEvent.querySelector(".tooltip");
		  if (tooltip) {
			tooltip.classList.add("show-tooltip");
		  }
		}
	  }
	});
}  