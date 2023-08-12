window.onload = function() {
    navExpander();
    typeAndDeleteStrings(stringsArray);
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

  window.addEventListener("scroll", function() {
      currentScrollPos = window.pageYOffset;
      const navbar = document.getElementById("navbar");

      // Calculate the difference in scroll position
      const scrollDiff = currentScrollPos - previousScrollPos;

      // Set the effectMultiplier based on scrolling direction
      let effectMultiplier;
      if (scrollDiff > 0) {
          effectMultiplier = 0.75; // Increase slower when scrolling down
      } else {
          effectMultiplier = 1.25; // Increase faster when scrolling up
      }

      // Calculate the new height for the navbar
      let newHeight = parseInt(getComputedStyle(navbar).height) - scrollDiff * effectMultiplier;

      // Limit the new height within a reasonable range
      newHeight = Math.min(Math.max(newHeight, 40), 90); // Limit between 40px and 90px

      // Set the new height for the navbar
      navbar.style.height = newHeight + "px";

      // Update the previous scroll position
      previousScrollPos = currentScrollPos;
  });
}

function typeAndDeleteStrings(stringsArray) {
    // Get a reference to the output element where the typing animation will be displayed
    const outputElement = document.getElementById("output"); // Change this to your output element's ID
  
    // Speed settings for typing, deletion, and pauses (in milliseconds)
    const typingSpeed = 100;    // Speed at which characters are typed
    const deletionSpeed = 50;   // Speed at which characters are deleted
    const pauseDuration = 1000; // Duration to pause between animations
  
    let currentIndex = 0; // Keeps track of the current string index being animated
  
    // Function to type a given string on screen
    function typeString(str) {
      let currentCharIndex = 0; // Keeps track of the current character being typed
  
      // Recursive function to type the next character
      function typeNextChar() {
        if (currentCharIndex < str.length) {
          // Add the current character to the output element's content
          outputElement.textContent += str[currentCharIndex];
          currentCharIndex++;
  
          // Schedule the next character typing after 'typingSpeed' milliseconds
          setTimeout(typeNextChar, typingSpeed);
        } else {
          // When the string is fully typed, wait and then start the deletion animation
          setTimeout(deleteString, pauseDuration);
        }
      }
  
      // Start typing the string
      typeNextChar();
    }
  
    // Function to delete the typed string from the output element
    function deleteString() {
      const currentContent = outputElement.textContent;
  
      if (currentContent.length > 0) {
        // Remove the last character from the output element's content
        outputElement.textContent = currentContent.slice(0, -1);
  
        // Schedule the next character deletion after 'deletionSpeed' milliseconds
        setTimeout(deleteString, deletionSpeed);
      } else {
        // When the string is fully deleted, move to the next string if available
        currentIndex++;
  
        if (currentIndex < stringsArray.length) {
          // Wait and then start typing the next string
          setTimeout(() => {
            typeString(stringsArray[currentIndex]);
          }, pauseDuration);
        }
      }
    }
  
    // Start typing the first string in the array
    typeString(stringsArray[currentIndex]);
  }
  
  // Example array of strings to be animated
  const stringsArray = ["develops code", "runs marathons", "sucks dick"];
  
  // Call the function with the array to begin the animation
  typeAndDeleteStrings(stringsArray);