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
    <video style="display: block; margin: 0px auto;" controls>
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
            There are two main screens, MealList & ShoppingList. As explained above, using these fulfills the two main 
            functional requirements of this app. Within App.js, these are conditionally rendered, based on the current context
            of the app's usage (where showMealList is set). The MealList is displayed by default.
        </p>
    </div>

    <!-- MealList.js -->
    <div>
        <p>
            Within MealList.js, the default initial view of the application, meals are displayed. This defaults to empty since 
            no meals have yet been added, of course. Meals are dynamically rendered, as &lt;ul&gt; list items from the userSelectedMeals state array (defined in App.js).
            Each meal is retreived from my database through my Spring REST API. The mealId returned from these API calls is used as 
            a key within this dynamic meal. Meal items can be edited from dynamically generated buttons, either deleting them from userSelectedMeals or populating the meal editor 
            with the meal's details to allow it to be overwritten in userSelectedMeals. The quantity of each meal can also be incremeneted and decremeneted with buttons. 
            Once the user has added all the meals they want, they can then generate their shopping list.
        </p>
        <pre><code class="language-jsx">        &lt;ul className="meal-list"&gt;
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
    <div>
        <p>
            When adding a list to userSelectedMeals, a search modal is opened and an API call is made to search through all 
            existing meals in the database. The user also gets the option to create a brand new meal. If an existing meal is selected, 
            the details of the is populated into a set of various states for the fields of a meal, such as mealName, and the modal is populated 
            with these fields. The details of this can then be edited before being saved. If a new meal is being created, these states are set 
            to null and the modal's inputs are blank. A list of ingredients is dynamically rendered, based on either the details of the existing 
            meal or from the user's input into the ingredient addition fields. These are displayed with a custom JSX component I created, with a 
            deletion button.
        </p>
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
    </div>

    <!-- ShoppingList.js TODO: SET MAX HEIGHT AND ALLOW SCROLLING -->
    <div>
        <p>
            Finally, once a user has selected all the meals they wish to eat, they can generate a shopping list. 
            Choosing to do so, conditionally un-renders the meal list and renders ShoppingList.js (below). Within this,
            there are two unordered lists. One of which dynamically generates each of the agregated ingredients and quantities returned from the 
            API call to generate a shopping list. Each of these shopping list items contains a button to delete themselves and a checkbox. 
            When this is checked, the list item is removed from the main list and is added to the inactiveItems array state. The second list on 
            this page dynamically renders these inactiveItems. The idea here is that users can tick these aggregated items off as they shop for 
            them. Additional, non-meal-linked-items can also be added to this page using a button at the bottom. This loads a modal, similar to 
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
    <h2 class="section-title">Description of this aspect coming soon...</h2>
</section>