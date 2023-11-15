<section class="backend-code-section">
    <h2 class="section-title">MySQL</h2>
    <div>
        <p>
            First of all, we define the <a class="about-link" href="https://github.com/TattieMasher/Grocery-shopper/tree/main/database">database</a>:
        </p>
        <ul>
            <li>Meals: Lists meals with names and descriptions.</li>
            <li>Ingredients: Stores ingredients, to be used within the context of a meal or shopping list item.</li>
            <li>Meal Ingredients Link: Connects meals to their ingredients, with quantities and units.</li>
            <li>Shopping Lists: Holds shopping lists, linked to a specific user.</li>
            <li>Shopping List Items: Contains items on shopping lists, linked to specific ingredients with quantities.</li>
            <li>Users: Stores user details.</li>
        </ul>
    </div>
    <div>
        <img style="width: 100%;" src="/images/projects/groceries/DB-light.png">
    </div>
    <div>
        <p>
            Ingredients are the base unit for the entire applications function. Meals are mapped to these through
            an intermediate table, tracking quantities and the units of these quantities (grams, millilitres, etc.).
        </p>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">REST API (Spring Boot)</h2>
    <div>
        <p>
            My Spring Boot API uses JDK 17, Spring Data JPA, and MySQL connector J to connect to my database and persist objects from it.
        </p>
        <p>
            I've taken a standard Spring approach to effectively model my database, providing an Entity, Controller
            and Repository for each database table. Many of these <a class="about-link" href="https://github.com/TattieMasher/Grocery-shopper/tree/main/grocery-planner-api/src/main/java/com/groceryplanning/groceryplanner/model">entities</a> are defined exactly according to my 
            database definition, using the JsonIgnore annotation where appropriate to avoid cyclical references.
            Relationships between these entities are also modelled through joins, such as:
        </p>
    </div>

    <!-- Entities -->
    <div class="code-block-slider">
        <div>
            <pre><code class="language-java">@Entity
@Table(name = "meals")
public class Meal {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "meal_id")
    private Long id;

    @Column(name = "meal_name")
    private String name;

    @Column(name = "meal_description", columnDefinition = "TEXT", nullable = false)
    private String description;

    @ManyToMany(fetch = FetchType.LAZY)
    @JoinTable(
            name = "meal_ingredients_link",
            joinColumns = @JoinColumn(name = "meal_id"),
            inverseJoinColumns = @JoinColumn(name = "ingredient_id")
    )
    private Set<Ingredient> ingredients;

    @OneToMany(mappedBy = "meal", cascade = CascadeType.ALL, orphanRemoval = true)
    private Set<MealIngredient> mealIngredients = new HashSet<>();</code></pre>
        </div>

        <div>
            <pre><code class="language-java">@Entity
@Table(name = "ingredients")
public class Ingredient {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "ingredient_id")
    private Long ingredientId;

    @Column(name = "ingredient_name")
    private String ingredientName;

    @JsonIgnore
    @OneToMany(mappedBy = "ingredient", cascade = CascadeType.ALL, orphanRemoval = true)
    private Set<MealIngredient> mealIngredients = new HashSet<>();

    @JsonIgnore
    @OneToMany(mappedBy = "ingredient", cascade = CascadeType.ALL, orphanRemoval = true)
    private Set<ShoppingListItem> shoppingListItems = new HashSet<>();</code></pre>
        </div>

        <div>
            <pre><code class="language-java">@Entity
@Table(name = "shopping_lists")
public class ShoppingList {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "shopping_list_id")
    private Long shoppingListId;

    @Column(name = "list_name")
    private String listName;

    @JsonIgnore
    @ManyToOne
    @JoinColumn(name = "user_id")
    private User user;

    @OneToMany(mappedBy = "shoppingList", cascade = {CascadeType.PERSIST, CascadeType.MERGE})
    private List<ShoppingListItem> items = new ArrayList<>();</code></pre>
        </div>

        <div>
            <pre><code class="language-java">@Entity
@Table(name = "shopping_list_items")
public class ShoppingListItem {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "item_id")
    private Long itemId;

    @JsonIgnore
    @ManyToOne
    @JoinColumn(name = "shopping_list_id")
    private ShoppingList shoppingList;

    @ManyToOne
    @JoinColumn(name = "ingredient_id")
    private Ingredient ingredient;

    @Column(name = "item_quantity")
    private BigDecimal itemQuantity;

    @Column(name = "item_quantity_unit")
    private String itemQuantityUnit;</code></pre>
        </div>
    </div>

    <!-- combineItems -->
    <div>
        <p>
            Some additional classes had to be created, such as to model the composite key for the meal-ingredient link table:
        </p>
        <pre><code class="language-java">@Embeddable
public class MealIngredientId implements Serializable {
    @Column(name = "meal_id")
    private Long mealId;

    @Column(name = "ingredient_id")
    private Long ingredientId;</code></pre>

        <p>
            Within my shoppingList class, I've defined the below method combineItems(), to provide the main
            application functionalitity. Shopping list items are bundled together and their combined quantities are
            saved to the list's `items` field. It's defined in an object-oriented way, where a shopping list
            is responsible fo its own items ArrayList. This method is called whenever a shopping list is returned,
            so that the user always receives an aggregated list. The comments below explain the exact 
            implementation of this requirement.
        </p>
        <pre><code class="language-java">public void combineItems() {
    // HashMap map items by ingredientId and quantityUnit against ShoppingListItem
    HashMap<String, ShoppingListItem> groupedItems = new HashMap<>();

    // Iterate all current ShoppingListItems
    for (ShoppingListItem item : items) {
        // Create a composite HashMap key made up of current list item's id and quantity unit
        String key = item.getIngredient().getIngredientId() + "_" + item.getItemQuantityUnit();

        // If current item exists with same quantity unit
        if (groupedItems.containsKey(key)) {
            // Get existing item
            ShoppingListItem existingItem = groupedItems.get(key);
            // Sum the quantity of current item with the existent one
            BigDecimal combinedQuantity = existingItem.getItemQuantity().add(item.getItemQuantity());
            // Update existent quantity with sum
            existingItem.setItemQuantity(combinedQuantity);
        } else {
            // Item doesn't exist in the map, add it to it
            groupedItems.put(key, item);
        }
    }

    // Update items list with the combined items
    items = new ArrayList<>(groupedItems.values());
    }</code></pre>
    </div>

    <!-- Create list -->
    <div>
        <p>
            Within my <a class="about-link" href="https://github.com/TattieMasher/Grocery-shopper/tree/main/grocery-planner-api/src/main/java/com/groceryplanning/groceryplanner/controller">controller</a>,
            I've defined a number of useful API end points. Here is the main one, where a list of user-supplied
            JSON ingredients are used to create a new, aggregated shopping list:
        </p>
        <pre><code class="language-java">@PostMapping("/create/{listName}")
    public ResponseEntity<ShoppingList> createShoppingListFromIngredients(
            @PathVariable String listName,
            @RequestBody List<ShoppingListItem> shoppingListItems) {
        // Create a new ShoppingList and set its name
        ShoppingList shoppingList = new ShoppingList();
        shoppingList.setListName(listName);

        // Save the shopping list to the database using the repository
        ShoppingList savedShoppingList = shoppingListRepository.save(shoppingList);

        // Iterate and associate ShoppingListItems with the new ShoppingList
        for (ShoppingListItem item : shoppingListItems) {
            item.setShoppingList(savedShoppingList);
        }

        // Save the updated ShoppingListItem objects
        List<ShoppingListItem> savedItems = shoppingListItemRepository.saveAll(shoppingListItems);

        // Set the list of saved ShoppingListItem objects back to the ShoppingList
        savedShoppingList.setItems(savedItems);

        // Combine the items using the combineItems method
        savedShoppingList.combineItems();

        return ResponseEntity.ok(savedShoppingList);
    }</code></pre>
    </div>
</section>

<section class="backend-code-section">
    <h2 class="section-title">JSON Request/Response</h2>
    <!-- JSON example -->
    <div>
        <p>
            An example of a structured JSON request to this method, with API endpoint `lists/create/New List`, might be:
        </p>
        <pre><code class="language-js">[
    {
        "ingredient": {
            "ingredientId": 2,
            "ingredientName": "Bell Peppers"
        },
        "itemQuantity": 2.00,
        "itemQuantityUnit": "pieces"
    },
    {
        "ingredient": {
            "ingredientId": 2,
            "ingredientName": "Bell Peppers"
        },
        "itemQuantity": 4.00,
        "itemQuantityUnit": "pieces"
    },
    {
        "ingredient": {
            "ingredientId": 1,
            "ingredientName": "Chicken Breast"
        },
        "itemQuantity": 300.00,
        "itemQuantityUnit": "grams"
    },    {
        "ingredient": {
            "ingredientId": 1,
            "ingredientName": "Chicken Breast"
        },
        "itemQuantity": 300.00,
        "itemQuantityUnit": "grams"
    }
]</code></pre>
    </div>

    <!-- JSON return -->
    <div>
        <p>
            Which would return:
        </p>
        <pre><code class="language-js">{
    "shoppingListId": 5,
    "listName": "New List",
    "items": [
        {
            "itemId": 21,
            "ingredient": {
                "ingredientId": 1,
                "ingredientName": "Chicken Breast"
            },
            "itemQuantity": 600.00,
            "itemQuantityUnit": "grams"
        },
        {
            "itemId": 19,
            "ingredient": {
                "ingredientId": 2,
                "ingredientName": "Bell Peppers"
            },
            "itemQuantity": 6.00,
            "itemQuantityUnit": "pieces"
        }
    ]
}</code></pre>
        <p>
            As you can see, the structured JSON gives a combined list of user-supplied ingrdients (in this
            example, 2x 300g Chicken Breast becomes 600g Chicken Breast and 2+4 pieces of Bell Peppers becomes 6 pieces).
            Firstly, supplied ingredients (with their quantities and units) are saved to the database as shopping list items.
            Then, a shopping list is saved, with the new list items added in. The last part of the request path is also used
            to set the list name. A list id is returned also, to allow this list to be retrieved again and edited on the client-side, then re-saved.
        </p>
    </div>
</section>