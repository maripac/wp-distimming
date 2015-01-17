<?php

/*
* Plugin Name: ContentType Plugin Explained
* Plugin URI: http://codex.wordpress.org/Function_Reference/register_post_type
* Description: Do not activate this plugin.
* Author: Maripac
* Version: 1.0
* Author URI: http://maripac.me/
*/


/** Creating a custom post type     */
/** Add it to the init action       */
/**  _______________________________________*/
// 	| 
//  | add_action('init', function () {
// 	|
//  | });
//	|
// 	|
// 	|
/** |_______________________________________*/
/**-----------------------------------------*/

/** Call the register post type function    */
/** which is provided by Wordpress's core   */
/**  _______________________________________*/
// 	| 
//  | add_action('init', function () {
// 	| 	register_post_type('quote', $options);
//  | 
//	| 
// 	| });
// 	|
/** |_______________________________________*/
/**-----------------------------------------*/

/** Give it a name. In this case 'quote'.   */
/** The option's array can be defined       */
/** previously so we can reference the      */
/** parameter from inside the function      */
/** just with the variable name $options    */
/**  _______________________________________*/
// 	| 
//  | add_action('init', function () {
// 	| 	$labels = [
// 	|		'name'                       => 'Quotes',
// 	|		'singular_name'              => 'Quote',
//	|		'add_new'                    => 'Add New',
//	|		'add_new_item'               => 'Add New Quote',
//	|		'edit_item'					 => 'Edit Quote',
//	|		'new_item'					 => 'New Quote',
//	|		'all_items'					 => 'All Quotes',
//	|		'view_item'					 => 'View Quote',
//	|		'search_items'				 => 'Search Quotes',
// 	|		'not_found'        			 => 'Not found',
// 	|		'not_found_in_trash'         => 'No quotes found in trash',
// 	|		'parent_item_colon'          => '',
// 	|		'menu_name'                  => 'Quotes'
//  | 	
//  |   ];
// 	| 	$options = [
// 	|		'labels'                     => $labels,
//	|		'public'			         => true,
//	|		'publicly_queryable'         => true,
// 	|		'show_ui'                    => true,
// 	|		'show_in_menu'               => true,
// 	|		'query_var'                  => true,
// 	|		'rewrite'      				 => ['slug' => 'quote'],
//	|		'capability_type'      		 => 'post',
// 	|		'has_archive'	             => true,
// 	|		'hierarchical'  	         => false,
// 	|		'menu_position'          	 => null,
// 	|		'supports'              	 => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'],
//  | 	
//  |   ];
//	|   register_post_type('quote', $options);
// 	| });
// 	|
/** |_______________________________________*/
/**-----------------------------------------*/



/** Very much the same would be good for    */
/** creating custom taxonomies.             */
/**-----------------------------------------*/
// Register Custom Taxonomy
/**-----------------------------------------*/
// function book_publisher_taxonomy() {
// 	$labels = array(
// 		'name'                       => _x( 'Publishers', 'Taxonomy General Name', 'text_domain' ),
// 		'singular_name'              => _x( 'Publisher', 'Taxonomy Singular Name', 'text_domain' ),
// 		'menu_name'                  => __( 'Publisher', 'text_domain' ),
// 		'all_items'                  => __( 'All Publishers', 'text_domain' ),
// 		'parent_item'                => __( 'Parent Publisher', 'text_domain' ),
// 		'parent_item_colon'          => __( 'Parent Publisher:', 'text_domain' ),
// 		'new_item_name'              => __( 'New Publisher Name', 'text_domain' ),
// 		'add_new_item'               => __( 'Add New Publisher', 'text_domain' ),
// 		'edit_item'                  => __( 'Edit Publisher', 'text_domain' ),
// 		'update_item'                => __( 'Update Publisher', 'text_domain' ),
// 		'separate_items_with_commas' => __( 'Separate publishers with commas', 'text_domain' ),
// 		'search_items'               => __( 'Search Publishers', 'text_domain' ),
// 		'add_or_remove_items'        => __( 'Add or remove publishers', 'text_domain' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used publishers', 'text_domain' ),
// 		'not_found'                  => __( 'Not Found', 'text_domain' ),
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 	);
//	register_taxonomy( 'publisher', array( 'post', ' quote' ), $args );	
//}
/** Hook into the 'init' action */
/** add_action( 'init', 'book_publisher_taxonomy', 0 ); */
/**-----------------------------------------------------*/



/** How to avoid having to write all this code, */
/** which uses the same word over and over?     */
/** Imagine we need to create 30 different      */
/** post types for our site. It wouldn't make a */
/** lot of sense to write down so much code     */ 
/** for each of the 30 post types               */

/** The solution is to pass it a singular and a */
/** plural noun so that we don't have to pass   */
/** all the previous combinations of labels     */
/** every content type we want to create. For   */
/** this kind of automation, the best approach  */
/** is to define a Content Type Class.          */
//
// A class, for example, is like a blueprint for a house. It defines the shape of the house on paper, with
// relationships between the different parts of the house clearly defined and planned out, even though the
// house doesn’t exist.
//
// The syntax to create a class
/**  _______________________________________*/
// 	|
//  | class MyClass
// 	| {
//  |  	// Class properties and methods go here
//	|
// 	|  }
/** |_______________________________________*/
/**-----------------------------------------*/
//
// An object, then, is like the actual house built according to that blueprint. The data stored in the
// object is like the wood, wires, and concrete that compose the house: without being assembled according
// to the blueprint, it’s just a pile of stuff. However, when it all comes together, it becomes an organized,
// useful house.
//
// After creating the class, a new class can be instantiated and stored in a variable 
// using the 'new' keyword:
/**  _______________________________________*/
// 	|
//  | $obj = new MyClass;
// 	|
//  | //To see the contents of the class, use var_dump():
// 	| var_dump($obj);
// 	|
/** |_______________________________________*/
/**-----------------------------------------*/


/** Defining Class Properties */
//  To add data to a class, properties, or class-specific variables, are used. These work exactly like regular
//  variables, except they’re bound to the object and therefore can only be accessed using the object.
//
//	The keyword public determines the visibility of the property.
// 	Next, the property is named using standard variable syntax, and a value is assigned (though class properties do not need an initial value).
/**  _______________________________________*/
// 	| class MyClass
//  | {
// 	|		public $prop1 = "I'm a class property!";
//  | }
//	| $obj = new MyClass;
// 	| var_dump($obj);
// 	|
/** |_______________________________________*/
/**-----------------------------------------*/
//
//	To read this property and output it to the browser, 
//	reference the object from which to read and the property to be read: 
/** echo $obj->prop1; */
/**  _______________________________________*/
// 	| class MyClass
//  | {
// 	|		public $prop1 = "I'm a class property!";
//  | }
//	| $obj = new MyClass;
//	| echo $obj->prop1;
/** |_______________________________________*/
/**-----------------------------------------*/
/**-----------------------------------------*/


/**-----------------------------------------*/
/**-----------------------------------------*/
// LET'S GO!
// The syntax to create a class
/**  _______________________________________*/
// 	|
//  | class MyClass
// 	| {
//  |  	// Class properties and methods go here
// 	|  }
/** |_______________________________________*/
/**-----------------------------------------*/

class ContentType {

	// Defining Class Properties 
	//  _______________________________________
	// 	| class MyClass
	//  | {
	// 	|		public $prop1 = "I'm a class property!";
	//  | }
	//  |_______________________________________
	// In order to register_post_type('quote', $options) 
	// we need to pass at least the custom post type name, and the options array.
	// The $options array, takes an aditional $labels array.

	public $type;
	public $options = [];
	public $labels = [];

	//  Using Constructors and Destructors
	//  ----------------------------------
	//	When an object is instantiated, it’s often desirable to set a few things right off the bat. To handle this,
	//	PHP provides the magic method __construct(), which is called automatically whenever a new object is
	//	created.
	//	For the purpose of illustrating the concept of constructors, add a constructor to MyClass that will
	//	output a message whenever a new instance of the class is created:
	//  _______________________________________
	// 	| class MyClass
	//  | {
	// 	|		public $prop1 = "I'm a class property!";
	//	|
	//  | 		public function __construct() {
	//	| 			echo 'The class "', __CLASS__, '" was initiated!<br />';
	//	| 		}
	//	| }
	//	| // Create a new object
	//	| $obj = new MyClass;
	//  |_______________________________________
	// In order to register_post_type('quote', $options) 
	// we need to pass at least the custom post type name, and the options array.
	// The $options array, takes an aditional $labels array.

	public function __construct($type, $options = [], $labels = []) {
		// OOP allows objects to reference themselves using $this. When working within a method,
		// use $this in the same way you would use the object name outside the class.
		$this->type = $type;

		$default_options = [
			'public' => true,
			'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments']
		];
		$required_labels = [
			'singular_name' => ucwords($this->type),
			'plural_name' => ucwords($this->type)
		];

		$this->options = $options + $default_options;
		$this->labels = $labels + $required_labels;
		// Now we have made the modifications needed on the Class Properties, 
		// But the $labels property has not been placed back in the $options array

		$this->options['labels'] = $this->labels + $this->default_labels();


		// add an action. Instead of passing a function inline, 
		// we are going to use a different kind of callable, that passes an object and a string that points to a method.
		add_action( 'init', array($this, "register"));
	}

	public function register() {
		register_post_type($this->type, $this->options);
	}
	public function default_labels() {
		return [
			'name'                       => $this->labels['plural_name'],
            'singular_name'              => $this->labels['singular_name'],
            'add_new'                    => 'Add New ' . $this->labels['singular_name'],
            'add_new_item'               => 'Add New ' . $this->labels['singular_name'],
            'edit_item'					 => 'Edit ' . $this->labels['singular_name'],
            'new_item'					 => 'New ' . $this->labels['singular_name'],
            'all_items'					 => 'All ' . $this->labels['plural_name'],
            'view_item'					 => 'View ' . $this->labels['singular_name'],
            'search_items'				 => 'Search ' . $this->labels['plural_name'],
            'not_found'        			 => 'No matching ' . strtolower($this->labels['plural_name']) . ' found',
            'not_found_in_trash'         => 'No ' . strtolower($this->labels['plural_name']) . ' found in Trash',
            'parent_item_colon'          => 'Parent ' . $this->labels['singular_name'],
            'menu_name'                  => $this->labels['plural_name']
		];
	}
	
}

// After creating the class, a new class can be instantiated and stored in a variable 
// using the 'new' keyword:
/**  _______________________________________*/
// 	|
//  | $obj = new MyClass;
// 	|
//  | //To see the contents of the class, use var_dump():
// 	| var_dump($obj);
// 	|
/** |_______________________________________*/
/**-----------------------------------------*/


$quicknotes = new ContentType('quicknote', [], ['plural_name' => 'Quick Notes', 'singular_name' => 'Quick Note']);


