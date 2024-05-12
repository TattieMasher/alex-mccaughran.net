<section class="backend-code-section">
    <h2 class="section-title">Main Application Structure</h2>
    <div>

    </div>
    <div class="code-block-right">
        <p>
            The application is contained within a ChakraProvider, to allow usage of ChakraUI. Within this, there is a main container, holding the boundaries of the app.
            <br><br>Within the project's CSS, this has a set maximum width of 400px, keeping the screen consistent with Tinder's design across different screen sizes.
            <br><br>In this main container, there are three major parts.
            <br><br>Firstly, there is a container to hold the settings and chat buttons, each of which amend a state controlling visibility for these respective modals.
            <br><br>There is then a container to hold a dynamically generated list of Restaurant components, each of which is fed response data from the Google Places APi request. These Restaurant components are styled and managed to appear in a swipeable deck.
            <br><br>Finally, there are the various modals themselves. First of all, there's a match modal which displays "it's a match", over the screen when a restaurant is liked. There is also a modal to open a settings dialog screen and one to open a list of chats with liked restaurants.
        </p>
        <!-- App.jsx -->
        <div>
            <pre><code class="language-jsx">&lt;ChakraProvider&gt;
  &lt;div className="app_container"&gt;
    &lt;MatchModal
      isOpen={isMatchOpen}
      onClose={() =&gt; setIsMatchOpen(false)}
    /&gt;
    &lt;div className="app_icon_container"&gt;
      &lt;IoIosSettings className="app_icon" onClick={() =&gt; setSettingsOpen(true)} /&gt;
      &lt;IoChatbubblesOutline className="app_icon" onClick={() =&gt; setIsChatOpen(true)} /&gt;
    &lt;/div&gt;
    &lt;div className="restaurant_card_container"&gt;
    {restaurants.length &gt; 0 ? (
      restaurants.map((restaurant, index) =&gt; (
        &lt;Restaurant
          key={restaurant.id}
          data={restaurant}
          userLocation={userLocation}
          handleDislike={handleDislike} 
          handleLike={handleLike}
          className={index === currentIndex ? "current" : "next"}
        /&gt;
      ))
    ) : (
      // Render the no more restaurants card
      &lt;Restaurant
        key={noMoreRestaurantsData.id}
        data={noMoreRestaurantsData}
        userLocation={userLocation}
        // no handleDislike or handleLike because this card is not interactable
        className="current"
      /&gt;
    )}
  &lt;/div&gt;
    &lt;SettingsModal 
      isOpen={isSettingsOpen} 
      onClose={() =&gt; setSettingsOpen(false)} 
      searchRadius={searchRadius}
      setSearchRadius={setSearchRadius}
    /&gt;
    &lt;ChatList
      isOpen={isChatOpen}
      onClose={() =&gt; setIsChatOpen(false)}
    /&gt;
  &lt;/div&gt;
&lt;/ChakraProvider&gt;</code></pre>
        </div>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">Restaurant Card Component</h2>
    <!-- restaurant.jsx -->
    <div class="code-block-left">
    <pre><code class="language-jsx">// Extract details from data prop for use in the component
const {
  id,
  displayName: { text: name = 'Restaurant' },
  photos,
  location: { latitude, longitude }
} = data;

// Query the Google Places Photos api, with the current restaurant's id to obtain their registered Google Business photo
const imageUrl = photos.length &gt; 0 && photos[0].name
? `https://places.googleapis.com/v1/${photos[0].name}/media?key=${import.meta.env.VITE_PLACES_API_KEY}&maxWidthPx=900`
: noMoreImage;

// Obtain the distance in miles using the Geolib npm package with the restaurant's lat/lon and the user's
const distance = Math.round(
  convertDistance(getDistance({ latitude: userLocation.latitude, longitude: userLocation.longitude }, { latitude, longitude }), 'mi') * 10) / 10;

return (
  // Wrapped in React-Spring container, to allow dragging animation and interaction
  &lt;animated.div className={`restaurant_card ${className}`} {...bind()} style={{ x }}&gt;
    {dragDirection === 'right' && &lt;IoMdHeart className="like_icon_overlay" /&gt;} 
    {dragDirection === 'left' && &lt;IoClose className="dislike_icon_overlay" /&gt;}
    &lt;img className="restaurant_pic" src={imageUrl} alt={name} onDragStart={e =&gt; e.preventDefault()} /&gt;
    &lt;div className="restaurant_card_header_container"&gt;
      &lt;h2&gt;{name}&lt;/h2&gt;
      &lt;h4&gt;{distance} miles&lt;/h4&gt;
    &lt;/div&gt;
    &lt;div className="restaurant_card_icon_container"&gt;
      &lt;IoClose className="restaurant_icon dislike_icon" onClick={() =&gt; handleDislike(id)} /&gt;
      &lt;IoMdHeart className="restaurant_icon like_icon" onClick={() =&gt; handleLike(id)} /&gt;
    &lt;/div&gt;
  &lt;/animated.div&gt;
);</code></pre>
        <p>
            Here we see some of the code making up a Restaurant card component. This is taken from the fiel's default export.
            <br><br>The user's location and the restaurant's API data is first passed as props. This API data is then extracted to be used. 
            <br><br>The restaurant's photo id is passed as a parameter to a Google Places Photos API request, obtaining the main Google Business photo URL for the restaurant.
            <br><br>The npm Geolib package is then used to get the distance between the user and restaurant. This defaults to meteres, which I then convert to miles.
            <br><br>Finally, now that all the required data has been retrieved and calculated, the card can be rednered. This is wrapped in a React-Spring animated div, which allows the card to be dragged, like in Tinder.
            <br><br>An image is added to the card, pointing to the restaurant's main Google Business photo url. The restaurant's name and distance to the user is displayed.
            <br><br>When the card is dragged right or left, either a "♥" or "X" is overlaid with partial opacity, to indicate the user's current action on the card, either liking or disliking.
            <br><br>There are also two buttons to achieve this like/dislike function.
        </p>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">Chat List Component</h2>
        <!-- chatListModal.jsx -->
    <div class="code-block-right">
        <div>
            <p>
                When the user clicks the chats button on the main application screen, a modal containing a list of active chats is opened.
                <br><br>Upon loading this modal, a function is run to load existing chats from localStorage if any exist. If they don't, all that's rendered is a message to say that there are no active chats.
                <br><br>If there are chats saved, these are rendered in a stylised list, with onClick listeners.
                <br><br>The current chat to be viewed, is managed via a state (`selectedChat`). When this state is filled, by clicking one of the listed chats, a new full screen Modal is opened on top to display the details of this chat.
            </p>
        </div>
        <pre><code class="language-jsx">useEffect(() =&gt; {
    const loadChats = () =&gt; {
      // Obtain the chats from localStorage, if any exist
      const chatData = JSON.parse(localStorage.getItem('chats')) || {};
      // Set the chats state to the localStage data
      setChats(Object.entries(chatData).filter(([_, data]) =&gt; data.liked));
    };

    // Run the above when the modal is opened.
    if (isOpen) {
      loadChats();
    }
  }, [isOpen]);

  const openChat = (id) =&gt; {
    setSelectedChat(id);
  };

  // Clear the state managing the currently viewed chat
  const handleModalClose = () =&gt; {
    setSelectedChat(null);
    onClose();
  };

  // When a chat is selected, render a ChatDetail modal with the associated chat object passed as a prop
  if (selectedChat) {
    return &lt;ChatDetail chatId={selectedChat} onClose={() =&gt; setSelectedChat(null)} /&gt;;
  }

  return (
    &lt;Modal size="full" isOpen={isOpen} onClose={handleModalClose}&gt;
      &lt;ModalOverlay /&gt;
      &lt;ModalContent&gt;
        &lt;ModalHeader&gt;Chats&lt;/ModalHeader&gt;
        &lt;ModalCloseButton /&gt;
        &lt;ModalBody&gt;
          &lt;List spacing={3}&gt;
            {chats.length &gt; 0 ? chats.map(([id, chat]) =&gt; (
              &lt;ListItem borderRadius={10}
                padding={2}
                bg="gray.100"
                key={id}
                onClick={() =&gt; openChat(id)} cursor="pointer"&gt;
                &lt;strong&gt;{chat.name}&lt;/strong&gt;
              &lt;/ListItem&gt;
            )) : &lt;p&gt;No active chats&lt;/p&gt;}
          &lt;/List&gt;
        &lt;/ModalBody&gt;
      &lt;/ModalContent&gt;
    &lt;/Modal&gt;
  );</code></pre>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">Individual Chat Modal</h2>
        <!-- Dynamic chat generation -->
    <div class="code-block-left">
        <pre><code class="language-jsx">// Parse the chat messages as HTML, to allow for the &lt;a&gt; tag on the address
function createMarkup(htmlContent) {
  return { __html: htmlContent };
}

function ChatDetail({ chatId, onClose }) {
  const [chat, setChat] = useState(null);

  // Get the selected chat's messages
  useEffect(() =&gt; {
    const chats = JSON.parse(localStorage.getItem('chats')) || {};
    setChat(chats[chatId]);
  }, [chatId]);

  return (
    &lt;Modal size="full" isOpen={true} onClose={onClose}&gt;
      &lt;ModalOverlay /&gt;
      &lt;ModalContent&gt;
        &lt;ModalHeader&gt;{chat?.name || "Chat"}&lt;/ModalHeader&gt;
        &lt;ModalCloseButton /&gt;
        &lt;ModalBody&gt;
          {chat?.messages.map((msg, index) =&gt; (
            &lt;Box key={index} bg="gray.100" p={3} my={2} borderRadius="md"&gt;
              &lt;Text dangerouslySetInnerHTML={createMarkup(msg.text)}&gt;&lt;/Text&gt;
              &lt;Text fontSize="sm" color="gray.600"&gt;{msg.timestamp}&lt;/Text&gt;
            &lt;/Box&gt;
          ))}
        &lt;/ModalBody&gt;
      &lt;/ModalContent&gt;
    &lt;/Modal&gt;
  );
}</code></pre>
        <p>
            Finally, the fun messages from local liked restaurants are displayed. To do so, this component retrieves the messages from localStorage, parsing them as HTML to ensure the Google Maps link is displayed and functions properly.
            <br><br>Each message is iterated and displayed as a ChakraUI stylised box, to mimic that of typical chat UIs.
        </p>
    </div>



    <section class="backend-code-section">
    <h2 class="section-title">Settings Modal</h2>
    <!-- settingsModal.jsx -->
    <div class="code-block-left-2">
        <p>
            Finally, there is the settings modal. This provides the user with the option to amend their search radius, increasing the radius value sent to the Google Places Nearby Search API.
            <br><br>This modal manages the search radius as it chagnes locally, before saving it to localStorage upon user request. 
            <br><br>The user is also able to clear all localStorage data within this modal, including chats, liked/disliked restaurants and chats with liked restaurants.
            <br><br>Changes to this page trigger a page reload, to search for restaurants again.
        </p>
        <pre><code class="language-jsx">// Save the search radius state and reload the page, to search again
const handleSave = () =&gt; {
  setSearchRadius(localRadius);
  onClose();
  window.location.reload();
};

// Update the radius state as it changes
const handleRadiusChange = (value) =&gt; {
  setLocalRadius(value);
};

// Clear local stroage, log it and reload the page, to search again
const handleDeletion = () =&gt; {
  localStorage.clear();
  console.log("Deleted all localStorage data");
  window.location.reload();
}

return (
  &lt;&gt;
    &lt;Modal isOpen={isOpen} onClose={onClose} isCentered&gt;
      &lt;ModalOverlay /&gt;
      &lt;ModalContent&gt;
        &lt;ModalHeader&gt;Settings&lt;/ModalHeader&gt;
        &lt;ModalCloseButton /&gt;
        &lt;ModalBody&gt;
          &lt;FormControl&gt;
            &lt;FormLabel&gt;Search radius&lt;/FormLabel&gt;
            &lt;NumberInput defaultValue={searchRadius} min={1} max={30} value={localRadius} onChange={handleRadiusChange}&gt;
            &lt;NumberInputField /&gt;
            &lt;NumberInputStepper&gt;
              &lt;NumberIncrementStepper /&gt;
              &lt;NumberDecrementStepper /&gt;
            &lt;/NumberInputStepper&gt;
          &lt;/NumberInput&gt;
          &lt;FormHelperText&gt;Distance in miles&lt;/FormHelperText&gt;
          &lt;/FormControl&gt;
        &lt;/ModalBody&gt;
        &lt;ModalFooter display="flex" justifyContent="space-between"&gt;
          &lt;Button colorScheme="red" onClick={handleDeletion}&gt;
            Delete data
          &lt;/Button&gt;
          &lt;Button colorScheme="blue" mr={3} onClick={handleSave}&gt;
            Save
          &lt;/Button&gt;
        &lt;/ModalFooter&gt;
      &lt;/ModalContent&gt;
    &lt;/Modal&gt;
  &lt;/&gt;
);</code></pre>
    </div>
</section>
</section>