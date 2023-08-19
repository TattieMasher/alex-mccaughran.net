window.onload = function() {
	navExpander();
	navScrollResize();
	
	// Delay the execution of typeAndDeleteStrings(stringsArray) by 4.5 seconds, to allow for other animations to occur first
    setTimeout(function() {
		const animationContainer = document.getElementById("animation-container");
		// Style animation container
		animationContainer.style.opacity = 1;
		animationContainer.style.minHeight = 100 + "px";
        typeAndDeleteStrings(stringsArray);
    }, 4000);
};

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