<section class="backend-code-section">
    <h2 class="section-title">Initial API Request</h2>
    <div>

    </div>
    <div class="code-block-left-2">
        <p>
            The first step in my application's journey is to make a call to the Google Places Nearby Search API. This is done as soon as the user's location is available, retreiving all nearby restaurants.
            <br><br>The default API call FoodFinder makes is structured as follows.
        </p>
        <!-- Initial Nearby Search API Call -->
        <div>
            <pre><code class="language-json">// https://places.googleapis.com/v1/places:searchNearby
// Headers:
// X-Goog-Api-Key: API_KEY_HERE
// X-Goog-FieldMask: places.id,places.formattedAddress,places.location
{
  "includedTypes": ["restaurant"],
  "locationRestriction": {
    "circle": {
      "center": {
        "latitude": 55.6267425, // Obtained from navigator.geolocation.getCurrentPosition
        "longitude": -4.4999585 // Obtained from navigator.geolocation.getCurrentPosition
        },
      "radius": 3218 // Default radius of 2 miles (in metres)
    }
  }
}</code></pre>
        </div>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">API Response & Handling</h2>
    <!-- Nearby Search Response -->
    <div>
        <p>
            The API call returns a response containing an array of objects containing the fields specified in the "X-Goog-FieldMask" header.
            <br><br>Some of these fields have been omitted for brevity, but you can get a feel for the response as a whole and how it can be traversed below.
        </p>
    </div>

    <!-- Entities -->
    <div class="code-block-full">
        <div>
            <pre><code class="language-java">0: Object { 
    id: "ChIJY6QkQn0yiEgRTv_NC5saSHk", nationalPhoneNumber: "01563 550936", formattedAddress: "2 Bellfield Interchange, Services, Kilmarnock KA1 5LQ, UK",
    displayName: Object { text: "McDonald's", languageCode: "en" },
    formattedAddress: "2 Bellfield Interchange, Services, Kilmarnock KA1 5LQ, UK",
    googleMapsUri: "https://maps.google.com/?cid=8739264330132750158",
    location: Object { latitude: 55.597344, longitude: -4.4725594 },
    nationalPhoneNumber: "01563 550936",
    photos: Array(10) [ {…}, {…}, {…}, … ],
    rating: 3.9,
    regularOpeningHours: Object { openNow: true, periods: (7) […], weekdayDescriptions: {
        0: "Monday: 5:00 am – 12:00 am",
        1: "Tuesday: 5:00 am – 12:00 am",
        2: "Wednesday: 5:00 am – 12:00 am",
        3: "Thursday: 5:00 am – 12:00 am",
        4: "Friday: 5:00 am – 12:00 am",
        5: "Saturday: 5:00 am – 12:00 am",
        6: "Sunday: 5:00 am – 12:00 am"
    }
}
1: Object { id: "ChIJQ6jykpMyiEgRptnZnZepyLo", nationalPhoneNumber: "01563 573000", formattedAddress: "3 Armour St, Kilmarnock KA1 3HT, UK", … }
2: Object { id: "ChIJG3yob7UyiEgRTR3tkmDvaMQ", nationalPhoneNumber: "0333 003 1747", formattedAddress: "Moorfield Roundabout, Kilmarnock KA1 2RS, UK", … }</code></pre>
        </div>
    </div>

    <!-- Restaurant filtering -->
    <div class="code-block-right">
        <p>
            After retrieving the nearby restaurant data, we check for restaurants which have already been liked or disliked and then filter the response data to remove these.
            <br><br>The filtered list is then added to the main state from which restaurants are displayed and interacted with.
        </p>
        <pre><code class="language-jsx">const likesDislikes = getLikesDislikes(); // Retrieve the current likes/dislikes from localStorage
const filteredRestaurants = response.data.places.filter(place => !(place.id in likesDislikes)); // Filter out likes/dislikes from the response data

setRestaurants(filteredRestaurants); // Assign the filtered results to the main restaurants state</code></pre>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">User Interactions</h2>
        <!-- Handling likes/dislikes -->
    <div class="code-block-left">
        <pre><code class="language-jsx">const getLikesDislikes = () => JSON.parse(localStorage.getItem('likesDislikes')) || {}; // Retrieve liked/disliekd restaurants from localStorage
const updateLikesDislikes = (id, like) => { // Take a restaurants id field and like status, then update the localStorage record for this restaurant
  const current = getLikesDislikes();
  const updated = { ...current, [id]: like };
  localStorage.setItem('likesDislikes', JSON.stringify(updated));
};

const handleInteraction = (id, liked) => {
    updateLikesDislikes(id, liked); // Update the localStorage item with the supplied data
  
    setRestaurants(currentRestaurants => { // Set the current available restaurants to the only those without likes/dislikes
      const updatedRestaurants = currentRestaurants.filter(restaurant => restaurant.id !== id); 
      return updatedRestaurants;
    });
  };
  
  const handleDislike = id => {
    handleInteraction(id, false); // Set the current restaurant to "disliked" in localStorage
  };
  
  const handleLike = id => {
    const restaurantData = restaurants.find(r => r.id === id); // Return the current restaurant's data object
    if (restaurantData) { 
      handleInteraction(id, true); // Set the current restaurant to "liked" localStorage
      initialiseChat(id, restaurantData); // Creates and initialises chat items in localStorage, to be rendered later
      setIsMatchOpen(true); // Writes "it's a match" on screen for a set period of time
    }
  };</code></pre>
        <div>
            <p>
                When restaurants are rendered, the following paths may (in essence) be taken:
                <ol>
                    <li style="margin: 20px 0px">The restaurant is disliked
                        <ol>
                            <li>The restaurant id is simply passed to `handleInteraction`, with false, recording in localStorage that this restaurant has been disliked, filtering it out from future renders.</li>
                        </ol>
                    </li>
                    <li style="margin: 20px 0px">The restaurant is liked
                        <ol>
                            <li>All of the restaurant's data is retrieved</li>
                            <li>The restaurant id is, again, passed to `handleInteraction` but this time with true, to show that this restaurant has been liked.</li>
                            <li>This data is passed to the helper function which creates a dynamic chat (more on that later).</li>
                        </ol>
                    </li>
                </ol>
            </p>
        </div>
    </div>

    <div class="code-block-left-2">
        <div>
            <p>
                Likes/dislikes can be initiated by swiping right/left (respectively), or via buttons on each restaurant card, just like on Tinder! The swiping is implemented using `<a class="about-link" href="https://react-spring.dev/docs/getting-started">react-spring</a>`, as below.
                <br><br>There are thresholds of 5% horizontal distance before either a "♥" or "X" is overlaid and a threshold of 15% after letting go for like/dislike to be called.
            </p>
        </div>
        <pre><code class="language-jsx">const bind = useDrag(({ down, movement: [mx], direction: [xDir], distance }) => {
    // Update the drag direction immediately upon moving, and maintain it unless the drag ends
    if (down && distance > window.innerWidth * 0.05) {
      if (dragDirection === null || distance > window.innerWidth * 0.15) {
        setDragDirection(xDir > 0 ? 'right' : 'left');
      }
    } else if (!down) {
      setDragDirection(null); // Reset the drag direction when the drag ends
    }

    // Use the dynamic dragging threshold
    if (down && distance > window.innerWidth * threshold) {
      if (xDir < 0) handleDislike(data.id); // To left
      else if (xDir > 0) handleLike(data.id); // To right
    }

    set({ x: down ? mx : 0 });
  });</code></pre>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">Dynamic Chat Generation</h2>
        <!-- Dynamic chat generation -->
    <div class="code-block-left">
        <pre><code class="language-jsx">const greetings = ["Hey", "Hello", "Hi"];

switch (restaurantData.priceLevel) {
    case "PRICE_LEVEL_INEXPENSIVE":
      pricePhrase = [
        "I'm cheap and easy.",
        ...
      ];
      break;
    case "PRICE_LEVEL_MODERATE":
      pricePhrase = [
        "let's have a good time, but not break the bank!",
        ...
      ];
      break;
    case "PRICE_LEVEL_EXPENSIVE":
      pricePhrase = [
        "I'm high class and worth every penny!",
        ...
      ];
      break;
    case "PRICE_LEVEL_VERY_EXPENSIVE":
      pricePhrase = [
        "if you can't afford me, don't even try!",
        ...
      ];
      break;
    default:
      pricePhrase = ["you hungry??"]; // When no price info is available from Google api

const ratingPhrase = [
  "On a good day, I'm easily a",
  ...
]</code></pre>
        <p>
            Now we come to the especially fun part of the app, the dynamic chat generation! Messages received follow a strict general structure, but the consituent components of this structure are chosen at random based on certain parameters with the liked restaurant's fields.
            <br><br>To showcase this feature, here are some of those message components here, in the order they are used to be generate messages.
        </p>
    </div>



    <div class="code-block-full">
        <p>These various message components are then structured into an array of objects, `messages` containing a `text` field and `timestamp`, which is simply the datetime when the message was generated.
            <br><br>These objects are then saved in localStorage within the restaurant id as the key. This means that messages are persistent across sessions.
        </p>
        <pre><code class="language-jsx">const messages = [
    { text: `${getRandomItem(greetings)}, ${getRandomItem(pricePhrase)}. ${getRandomItem(ratingPhrase)} ${restaurantData.rating * 2}/10.`, timestamp: new Date().toISOString() },
    { text: `I'm at <a href="${encodeURI(restaurantData.googleMapsUri)}" target="_blank">${restaurantData.formattedAddress}</a>. ${getRandomItem(visitingPhrase)}`, timestamp: new Date().toISOString() },
    { text: `Or give me a call on ${restaurantData.nationalPhoneNumber}. You can reach me...`, timestamp: new Date().toISOString() },
    { text: generateAvailability(restaurantData), timestamp: new Date().toISOString() }</code></pre>
    </div>

    <p>Examples of these message objects generated include:</p>
    <div class="code-block-slider">
        <div>
            <div class="code-block-right">
                <div>
                    <p>For a restaurant with...</p>
                    <ul>
                        <li>Low prices</li>
                        <li>3.5/5 rating</li>
                        <li>An address of "123 MadeUp Street, Town, T0 0WN"</li>
                        <li>A google maps uri of "https://maps.google.com/?cid=123"</li>
                        <li>A Phone number of 01234 567890</li>
                        <li>Availability 9am to 5pm daily</li>
                    </ul>
                </div>
                <pre><code class="language-jsx">{ text: "Hey, I'm cheaper than the rest! On a good day, I'm easily a 7/10.", timestamp: 11/05/2024, 22:32:41 }
{ text: "I'm at &lt;a href="https://maps.google.com/?cid=123">123 MadeUp Street, Town, T0 0WN&gt;. Come visit me!", timestamp: 11/05/2024, 22:32:41 }
{ text: `Or give me a call on 01234 567890. You can reach me...`, timestamp: 11/05/2024, 22:32:41 }
{ text: "Monday: 9:00 am – 5:00 pm",
    "Tuesday: 9:00 am – 5:00 pm",
    "Wednesday: 9:00 am – 5:00 pm",
    "Thursday: 9:00 am – 5:00 pm",
    "Friday: 9:00 am – 5:00 pm",
    "Saturday: 9:00 am – 5:00 pm",
    "Sunday: 9:00 am – 5:00 pm"}, timestamp: 11/05/2024, 22:32:41 }
                </code></pre>
            </div>
        </div>
        <div>
            <div class="code-block-right">
                <div>
                    <p>For a restaurant with...</p>
                        <ul>
                            <li>High prices.</li>
                            <li>4.75/5 rating</li>
                            <li>An address of "01 Fancy Street, City, C1 1TY"</li>
                            <li>A google maps uri of "https://maps.google.com/?cid=456"</li>
                            <li>A Phone number of 04321 098765</li>
                            <li>Daily availability from 5am to midnight</li>
                        </ul>
                </div>
                <pre><code class="language-jsx">{ text: "Helo, if you can't afford me, don't even try! If I had to rate myself, I'm definitely 9/10.", timestamp: 11/05/2024, 22:32:41 }
{ text: "I'm at &lt;a href="https://maps.google.com/?cid=456">01 Fancy Street, City, C1 1TY&gt;. Come visit me!", timestamp: 11/05/2024, 22:32:41 }
{ text: `Or give me a call on 04321 098765. You can reach me...`, timestamp: 11/05/2024, 22:32:41 }
{ text: "Monday: 5:00 am – 12:00 am",
    "Tuesday: 5:00 am – 12:00 am",
    "Wednesday: 5:00 am – 12:00 am",
    "Thursday: 5:00 am – 12:00 am",
    "Friday: 5:00 am – 12:00 am",
    "Saturday: 5:00 am – 12:00 am",
    "Sunday: 5:00 am – 12:00 am"}, timestamp: 11/05/2024, 22:32:41 }</code></pre>
            </div>
        </div>
    </div>
</section>