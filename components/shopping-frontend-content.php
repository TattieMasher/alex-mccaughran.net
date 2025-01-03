<section class="frontend-code-section">
    <h2 class="section-title">User Journey</h2>
    <p>
        The application first loads into the screen where meals will soon be loaded. Users can 
        click a button to add a meal, which opens a <a class="about-link" href="https://react.semantic-ui.com/modules/modal/">Semantic UI Dimmer Modal</a> 
        containing a search box.
    </p>
    <p> 
        Existing meals can be searched, selected and edited, or a new meal can be created.
        As described in my back-end contents, meals are defined as a having a name/description and 
        a collection of ingredients— each with a quantitiy and unit of quantity. If selecting an existing meal, the details 
        for it are populated into another dimmer modal (or a blank modal is rendered if no meal is selected) and the meal in question can be added to the list.
    </p>
    <video style="display: block; max-width: 90vw; margin: 0px auto;" controls>
        <source src="/images/projects/groceries/Screencast.mp4" type="video/mp4">
        Your browser does not support this video.
    </video>
    <p>
        Using this method, a list of meals containing their consituent ingredients can be created. From this list 
        screen, individual meals can be edited or deleted from the overall list.
    </p>
    <p>
        Finally, after this, users can generate the full list of required ingredients. A list of each ingredient and their combined quantities are rendered, with 
        checkboxes on each item to allow the user to tick items off as they shop. When ticked, these items are greyed out and added to a seperate list at the bottom
        of the screen.
    </p>
    <p> 
        Users can also add another, non-meal linked shopping item— with a quantity and unit. The meal list can be returned to, if users wish to add a 
        new list and combine its ingredient contents into the existing shopping list.
    </p>
</section>

<section class="frontend-code-section">
    <h2 class="section-title">React</h2>
</section>

<section class="frontend-code-section">
    <h3 class="section-title">UI</h3>

    <!-- App.js -->
    <div class="code-block">
    <pre><code class="language-jsx">&lt;div className="App"&gt;
  {showMealList ? ( // Conditional rendering based on showMealList state
  &lt;MealList
    shoppingList={shoppingList}
    setShoppingList={setShoppingList}
    toggleShowMealList={toggleShowMealList}
    userSelectedMeals={userSelectedMeals}
    setUserSelectedMeals={setUserSelectedMeals}
  /&gt;
  ) : (
  &lt;ShoppingList
    shoppingList={shoppingList}
    toggleShowMealList={toggleShowMealList}
    setShoppingList={setShoppingList}
  /&gt;
  )}
&lt;/div&gt;</code></pre>
        <p>
            All of the app's components are conditionally rendered based on the managed states which are toggled. 
            There are two main screens, MealList & ShoppingList. <br><br>
            As explained above, using these fulfills the two main 
            functional requirements of this app. Within App.js, these are conditionally rendered, based on the current context
            of the app's usage (where showMealList is set). The MealList is displayed by default.
        </p>
    </div>

    <!-- MealList.js -->
    <div class="code-block-right">
        <p>
            Within MealList.js, the default initial view of the application, meals are displayed. This defaults to empty since 
            no meals have yet been added, of course. <br><br>
            Meals are dynamically rendered as &lt;ul&gt; list items from the userSelectedMeals state array (defined in App.js).
            Each meal is retreived from my database through my Spring REST API. The mealId returned from these API calls is used as 
            a key within this dynamic meal list.<br><br>
            Meal items can be edited from dynamically generated buttons, either deleting them from userSelectedMeals or populating the meal editor 
            with the meal's details to allow it to be overwritten in userSelectedMeals. The quantity of each meal can also be incremeneted and decremeneted with buttons. <br><br>
            Once the user has added all the meals they want, they can then generate their shopping list.
        </p>
<pre><code class="language-jsx">&lt;ul className="meal-list"&gt;
  {userSelectedMeals.map((meal) =&gt; (
&lt;li key={meal.id} className="meal-item"&gt;
  &lt;div className="meal-actions"&gt;
  &lt;Button
icon
className="edit-button"
onClick={() =&gt; incrementMealQuantity(meal)} // Call increment function
  &gt;
&lt;Icon name="plus" /&gt;
  &lt;/Button&gt;
  &lt;Button
icon
className="edit-button"
onClick={() =&gt; decrementMealQuantity(meal)} // Call decrement function
  &gt;
&lt;Icon name="minus" /&gt;
  &lt;/Button&gt;
  &lt;/div&gt;
  &lt;div&gt;
&lt;h3&gt;{meal.mealQuantity || 1}&lt;/h3&gt; {/* Display mealQuantity, if it exists. If not, show 1. */}
  &lt;/div&gt;
  &lt;div className="meal-details"&gt;
&lt;div&gt;
  &lt;h3&gt;{meal.name}&lt;/h3&gt;
  &lt;p&gt;{meal.description}&lt;/p&gt;
&lt;/div&gt;
  &lt;/div&gt;
  &lt;div className="meal-actions"&gt;
&lt;Button
  icon
  className="edit-button"
  onClick={() =&gt; editMeal(meal)}
&gt;
  &lt;Icon name="pencil" /&gt;
&lt;/Button&gt;
&lt;Button
  icon
  className="delete-button"
  onClick={() =&gt; handleDeleteMeal(meal.id)}
&gt;
  &lt;Icon name="trash" /&gt;
&lt;/Button&gt;
  &lt;/div&gt;
&lt;/li&gt;
  ))}
&lt;/ul&gt;</code></pre>
    </div>

    <!-- NewMealModal.js TODO: SET MAX HEIGHT AND ALLOW SCROLLING -->
    <div class="code-block">
        <pre><code class="language-jsx">
        &lt;Modal.Header&gt;
          &lt;div style={{ textAlign: 'center' }}&gt;
            &lt;Header&gt;Add Meal&lt;/Header&gt;
          &lt;/div&gt;
          &lt;Label className="meal-details-label"&gt;Meal Name:&lt;/Label&gt;
          &lt;Input
            className="meal-details-input"
            value={mealName}
            onChange={(e) =&gt; setMealName(e.target.value)}
          /&gt;
          &lt;Label className="meal-details-label"&gt;Meal Description:&lt;/Label&gt;
          &lt;Input
            className="meal-details-input"
            value={mealDescription}
            onChange={(e) =&gt; setMealDescription(e.target.value)}
          /&gt;
        &lt;/Modal.Header&gt;
        &lt;Modal.Content&gt;
          &lt;Modal.Description&gt;
            &lt;Header&gt;Ingredients&lt;/Header&gt;
            &lt;List divided relaxed&gt;
              {ingredients.map((ingredient, index) =&gt; (
                &lt;IngredientItem
                  key={index}
                  ingredient={ingredient}
                  onRemove={(ingredientToRemove) =&gt; {
                    const updatedIngredients = ingredients.filter(
                      (ing) =&gt; ing !== ingredientToRemove
                    );
                    setIngredients(updatedIngredients);
                  }}
                /&gt;
              ))}
            &lt;/List&gt;
            &lt;div className="ingredient-adder"&gt;
              &lt;Label className="ingredient-details-label"&gt;Ingredient Name:&lt;/Label&gt;
              &lt;Input
                placeholder="Enter ingredient name..."
                value={selectedIngredient}
                onChange={(e) =&gt; setSelectedIngredient(e.target.value)}
              /&gt;
              &lt;Label className="ingredient-details-label"&gt;Quantity:&lt;/Label&gt;
              &lt;Input
                type="number"
                min="1"
                value={quantity}
                onChange={(e) =&gt; setQuantity(e.target.value)}
              /&gt;
              &lt;Label className="ingredient-details-label"&gt;Quantity Unit:&lt;/Label&gt;
              &lt;Dropdown
                placeholder="Select unit..."
                fluid
                selection
                options={quantityUnitOptions.map((unit) =&gt; ({
                  key: unit,
                  text: unit,
                  value: unit,
                }))}
                value={quantityUnit}
                onChange={(e, { value }) =&gt; setQuantityUnit(value)}
              /&gt;
              &lt;div className="control-buttons"&gt;
                &lt;Button color="green" onClick={addIngredient}&gt;
                  &lt;Icon name="plus" /&gt; Add Ingredient
                &lt;/Button&gt;
                &lt;Button color="teal" onClick={handleSaveMealClick}&gt;
                  &lt;Icon name="check" /&gt; Save meal to list
                &lt;/Button&gt;
                {showErrorLabel && (
                  &lt;Label color="red" pointing="above" className="error-label"&gt;
                    Please add a meal name, description and ingredients before saving.
                  &lt;/Label&gt;
                )}
                &lt;Button color="red" onClick={onClose}&gt;
                  &lt;Icon name="remove" /&gt; Cancel
                &lt;/Button&gt;
              &lt;/div&gt;
            &lt;/div&gt;
          &lt;/Modal.Description&gt;
        &lt;/Modal.Content&gt;</code></pre>
        <p>
            When adding a list to userSelectedMeals, a search modal is opened and an API call is made to search through all 
            existing meals in the database. The user also gets the option to create a brand new meal. <br><br>
            If an existing meal is selected, the details of this is populated into a set of various states for the fields of a meal, such as mealName, and this modal here is populated 
            with these fields. The details of this can then be edited before being saved. <br><br>
            If a new meal is being created, these states are set to null and the modal's inputs are blank. A list of ingredients is dynamically rendered, based on either the details of the existing 
            meal or from the user's input into the ingredient addition fields. These are displayed with a custom JSX component I created, with a deletion button.
        </p>
    </div>

    <!-- ShoppingList.js TODO: SET MAX HEIGHT AND ALLOW SCROLLING -->
    <div class="code-block">
        <p>
            Finally, once a user has selected all the meals they wish to eat, they can generate a shopping list. <br><br>
            Choosing to do so, conditionally un-renders the meal list and renders ShoppingList.js (below).<br><br>
            Within this, there are two unordered lists. One is empty and the other dynamically generates each of the aggregated ingredients and quantities returned from the 
            API call to generate a shopping list. <br><br>
            Each of these shopping list items contains a button to delete themselves and a checkbox. When this is checked, the list item is removed from the main list and is added to the inactiveItems array state.<br><br>
            The second list on this page dynamically renders these inactiveItems, greyed out. The idea here is that users can tick these aggregated items off as they shop for 
            them. <br><br>
            Additional, non-meal-linked-items can also be added to this page using a button at the bottom. This loads a modal, similar to 
            adding a meal to userSelectedMeals, containing just the ingredient fields.
        </p>
        <pre><code class="language-jsx">    &lt;div className="shopping-list-container"&gt;
      &lt;h1&gt;Shopping List&lt;/h1&gt;
      &lt;p&gt;id: {shoppingList.shoppingListId}&lt;/p&gt;
      &lt;List divided relaxed className="shopping-list"&gt;
        {shoppingList.items.map((item, index) =&gt; (
          &lt;ShoppingListItem
            key={index}
            item={item}
            onRemove={() =&gt; removeItem(item)}
            onToggle={() =&gt; toggleItem(item)}
            inactiveItems={inactiveItems}
          /&gt;
        ))}
      &lt;/List&gt;
      {/* Render the inactiveItems list similarly */}
      &lt;List divided relaxed className="shopping-list-inactive"&gt;
        {inactiveItems.items.map((item, index) =&gt; (
          &lt;ShoppingListItem
            key={index}
            item={item}
            onRemove={() =&gt; removeItem(item)}
            onToggle={() =&gt; toggleItem(item)}
            inactiveItems={inactiveItems}
          /&gt;
        ))}
      &lt;/List&gt;
      &lt;NewListItem 
        shoppingList={shoppingList}
        setShoppingList={setShoppingList}/&gt;
      &lt;Button className="add-button shopping-button"
        onClick={toggleShowMealList}&gt;Go back to Meals&lt;/Button&gt;
    &lt;/div&gt;</code></pre>
    </div>
</section>

<section class="frontend-code-section">
    <h3 class="section-title">API Calls</h3>

    <!-- Search all meals -->
    <div>
      <p>
        All of my requests to my Spring API are made using the asychnronous `fetch()` API. Most basically, all meal ids, names and descriptions are returned with this:
      </p>

      <div class="code-block">
        <pre><code class="language-jsx">useEffect(() => {
  // Fetch meals from API
  fetch('https://grocery.alexs-apis.xyz/meals/allmeals')
    .then((response) => response.json())
    .then((data) => setMeals(data))
    .catch((error) => console.error('Error fetching meals:', error));
}, [modalOpen]);</code></pre>
        <p>
          This is called from within my meal search modal, allowing for the dynamic searching of all existing meals using a Semantic UI searchbox.
        </p>
      </div>
    </div>

    <!-- Save meal -->
    <div class="code-block-right">
      <p>
        And here we see the main API call of the whole application, supplying one of two endpoints with structured JSON representing either a new list of 
        ingredients and quantities (deconstructed meals) or an existing one.<br><br>
        If there is an existing list (identified by a non-null shoppingListId), the function updates it with the aggregated ingredients and quantities from the selected meals. This is done by sending a PUT request to the API endpoint with the updated list details.<br><br>
        In cases where no list exists, the function creates a new one by aggregating ingredients from the selected meals and sending a POST request to the API. The quantities of ingredients are adjusted based on the number of meal entries.<br><br>
        When the JSON request is created, each meal in `userSelectedMeals` is iterated and the meal's mealQuanity value (defaults to 1) is extracted and each ingredient is multipled by the mealQuantity value.<br><br>
        In essence, meals are multiplied on, and supplied from, the client side to my REST API. This then returns the aggregated list of ingredients and quantities from the user's meals.
      </p>

        <pre><code class="language-jsx">const generateShoppingList = async () => {
  console.log('Shopping List ID:', shoppingList.shoppingListId);
  console.log('List: ', shoppingList);
  if (userSelectedMeals.length > 0) {
    if (shoppingList.shoppingListId != null) {
      // Updating an existing list
      const requestBody = userSelectedMeals.flatMap((meal) =>
        meal.ingredients.map((ingredient) => ({
          ingredient: {
            ingredientId: ingredient.ingredientId,
            ingredientName: ingredient.ingredientName,
          },
          itemQuantity: ingredient.quantity * (meal.mealQuantity || 1), // multiply the ingredient amount by how many entries of that meal there are, or 1, if no copies
          itemQuantityUnit: ingredient.quantityUnit,
        }))
      );
    
      console.log('Updating shopping list with: ', requestBody);
  
      try {
        const response = await fetch(`https://grocery.alexs-apis.xyz/lists/update/${shoppingList.shoppingListId}`, {
          method: 'PUT', 
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(requestBody),
        });        
    
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
    
        const responseData = await response.json();
        console.log('Shopping list updated:', responseData);
    
        // Update shopping list in the master container
        setShoppingList(responseData);
    
        toggleShowMealList();
      } catch (error) {
        console.error('Error updating shopping list:', error);
      }
    } else {
      // Creating a new list
      let requestBody = userSelectedMeals.flatMap((meal) =>
        meal.ingredients.map((ingredient) => ({
          ingredient: {
            ingredientId: ingredient.ingredientId,
            ingredientName: ingredient.ingredientName,
          },
          itemQuantity: ingredient.quantity * (meal.mealQuantity || 1), // multiply the ingredient amount by how many entries of that meal there are, or 1, if no copies
          itemQuantityUnit: ingredient.quantityUnit,
        }))
      );

      console.log('Creating shopping list with: ', requestBody);

      try {
        const response = await fetch('https://grocery.alexs-apis.xyz/lists/create', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(requestBody),
        });

        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }

        const responseData = await response.json();
        console.log('Shopping list created:', responseData);

        // Update shopping list in the master container
        setShoppingList(responseData);

        toggleShowMealList();
      } catch (error) {
        console.error('Error creating shopping list:', error);
      }
    }
  } else {
    // If saving a meal without the required fields filled
    setShowErrorLabel(true); // Show the error label
    setTimeout(() => {
      setShowErrorLabel(false); // Hide the error label after 2.5 seconds
    }, 2500);
    console.error('Add meals before trying to generate a list');
  }
};</code></pre>
    </div>
</section>