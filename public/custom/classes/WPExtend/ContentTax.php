<?php

namespace WPPlugins\WPExtend;


/*
* Plugin Name: ContentTax
* Plugin URI: https://codex.wordpress.org/Function_Reference/register_taxonomy
* Description: Do not activate this plugin.
* Author: Maripac
* Version: 1.0
* Author URI: http://maripac.me/
*/


/**-----------------------------------------------------------------------------------------*/
//  Usage of Register Custom Taxonomy 
//  Source URL: http://codex.wordpress.org/Function_Reference/register_taxonomy#Usage
/**-----------------------------------------------------------------------------------------*/

//  Use the init action to call this function. Calling it outside of an action can lead to troubles. 
//  register_taxonomy( $taxonomy, $object_type, $args );


//  Source File: register_taxonomy() is located in wp-includes/taxonomy.php.
//  Source URL: https://core.trac.wordpress.org/browser/tags/4.1/src/wp-includes/taxonomy.php#L0
/**
 * register_taxonomy( 'post_tag', 'post', array(
 *		'hierarchical' => false,
 *		'query_var' => 'tag',
 *		'rewrite' => $rewrite['post_tag'],
 *		'public' => true,
 *		'show_ui' => true,
 *		'show_admin_column' => true,
 *		'_builtin' => true,
 *	 ) 
 * );
 */

/**-------------------------------------------------------------*/
//           1. In order to create a custom Taxonomy
//                  add it to the init action.
/**-------------------------------------------------------------*/
/** _____________________________________________________________
 * | add_action('init', function () {                            |
 * |                                                             |
 * | });                                                         |
 * |_____________________________________________________________|
 */


/**-------------------------------------------------------------*/
//          2. Call the register taxonomy function that 
//                 is provided by Wordpress's core. 
/**-------------------------------------------------------------*/
/** _____________________________________________________________ 
 * | add_action('init', function () {                            |
 * |                                                             |
 * |    register_taxonomy( 'languages', $object_type, $args );   |
 * |                                                             |
 * | });                                                         |
 * |_____________________________________________________________|
 */

/**-----------------------------------------------------------------------------------------*/
//  3. Example of Register Custom Taxonomy 'writer' for a custom post type 'book'
//  Source URL: http://codex.wordpress.org/Function_Reference/register_taxonomy#Example
/**-----------------------------------------------------------------------------------------*/
//
// 	add_action('init', function () {
// 	$labels [
// 		'name'                       => _x( 'Writers', 'taxonomy general name' ),
// 		'singular_name'              => _x( 'Writer', 'taxonomy singular name' ),
// 		'search_items'               => __( 'Search Writers' ),
// 		'popular_items'              => __( 'Popular Writers' ),
// 		'all_items'                  => __( 'All Writers' ),
// 		'parent_item'                => null,
// 		'parent_item_colon'          => null,
// 		'edit_item'                  => __( 'Edit Writer' ),
// 		'update_item'                => __( 'Update Writer' ),
// 		'add_new_item'               => __( 'Add New Writer' ),
// 		'new_item_name'              => __( 'New Writer Name' ),
// 		'separate_items_with_commas' => __( 'Separate writers with commas' ),
// 		'add_or_remove_items'        => __( 'Add or remove writers' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used writers' ),
// 		'not_found'                  => __( 'No writers found.' ),
// 		'menu_name'                  => __( 'Writers' ),
// 	];
//
// 	$args [
// 		'hierarchical'          => false,
// 		'labels'                => $labels,
// 		'show_ui'               => true,
// 		'show_admin_column'     => true,
// 		'update_count_callback' => '_update_post_term_count',
// 		'query_var'             => true,
// 		'rewrite'               => array( 'slug' => 'writer' ),
// 	];
//
// 	register_taxonomy( 'writer', 'book', $args );
// });



/** How to avoid having to write all this code, */
/** Imagine we need to create 30 different      */
/** taxonomies for our site. It wouldn't make a */
/** lot of sense to write down so much code     */ 
/** for each of the 30 taxonomies.              */

/** The solution is to pass it a singular and a */
/** plural noun so that we don't have to pass   */
/** all the previous combinations of labels     */
/** every content type we want to create. For   */
/** this kind of automation, the best approach  */
/** is to define a Content Taxonomy Class.      */


// Before going into class terminology we must understand the difference 
// between instantiate and initialize Vs. define and declare.

// What is a variable?

/**-------------------------------------------------------------------*/
//   (i) The syntax to declare a variable
/**-------------------------------------------------------------------*/
/**
 *  __________________________________________________________________ 
 * |                                                                  |
 * | var $newVariable;                                                |
 * |__________________________________________________________________|
 */

/**-------------------------------------------------------------------*/
//  (ii) The syntax to initialise a variable
/**-------------------------------------------------------------------*/
/**
 *  ___________________________________________________________________
 * |                                                                   |
 * | $newVariable = "This is intialisation";                           |
 * |___________________________________________________________________|
 */

/**--------------------------------------------------------------------*/
//  (iii) Declare and initialise a variable
/**--------------------------------------------------------------------*/
/**
 *  ____________________________________________________________________ 
 * |                                                                   |
 * | var $intialisedVar = "This var is declared and intialised";       |
 * |___________________________________________________________________|
 */

// What is a class?
//
// A class, is a mould or blueprint. It works as a prototype that defines both the aspects
// as well as the relationships between those aspects that must distinguish those items created 
// as instances of that class. Therefore a class doesn't exist by itself as an object.

/**--------------------------------------------------------*/
//       1. The syntax to define a Class
/**--------------------------------------------------------*/
/** 
 *  ________________________________________________________
 * |                                                        |
 * | class MyClass                                          |
 * | {                                                      |
 * | 	// Class properties and methods go here             |
 * | }                                                      |
 * |________________________________________________________|
 */

// What are properties?
//
// Class member variables are called "properties". 
//
// Though class properties do not need an initial value, sometimes 
// variable after the declaration of a variable it might be initialised 
// which means that a value can be asigned.

// You may also see them referred to using different terms such as
// "attributes" or "fields", but we will use "properties". They are
// declared by using one of the keywords public, protected, or  
// private, followed by a variable declaration. 
// 
// What is the visibility of a property?
// Class members declared with the keyword
// 1. "private" may only be accessed by the class that defines the member.
// 2. "protected" may be accessed by class itself, by inherited classes and by parent classes.
// 3. "public" may be accessed everywhere.

/**--------------------------------------------------------*/
//      2. Defining the Class Properties
/**--------------------------------------------------------*/
/**
 *  ________________________________________________________
 * | class MyClass                                          |
 * | {                                                      |
 * |	public $prop1 = "I'm a class property!";            |
 * | }                                                      |
 * |________________________________________________________|
 */

// What is an object?
// An object is created according to a class. You instantiate an object from a class. 
// therefore you create an instance of the class. In code: $obj = new SomeClass();   
// After creating the class, a new object can be instantiated and stored in a variable 
// using the 'new' keyword:

/** 
 *  ________________________________________________________
 * |                                                        |
 * | class MyClass                                          | 
 * | {                                                      |
 * | 	// Class properties and methods go here             |
 * | }                                                      |
 * | $obj = new MyClass();                                  |
 * | //To see the contents of the class, use var_dump():    |
 * | var_dump($obj);                                        |
 * |________________________________________________________|
 */

/** Defining Class Properties */
// To add data to a class, properties, or class-specific variables, are used. These work exactly like regular
// variables, except they’re bound to the object and therefore can only be accessed using the object.
//
// To read this property and output it to the browser, 
// reference the object from which to read and the property to be read: 
// echo $obj->prop1; 

/**
 *  _____________________________________________________
 * | class MyClass                                       |
 * | {                                                   |
 * |	public $prop1 = "I'm a class property!";         |
 * | }                                                   |
 * | $obj = new MyClass;                                 |
 * | echo $obj->prop1;                                   |
 * |_____________________________________________________|
 */

// LET'S GO!
class ContentTax {
/** 
 *  ____________________________________________
 * |                                            |
 * | class MyClass                              |
 * | {                                          |
 * | 	// Class properties and methods go here |
 * | }                                          |
 * |____________________________________________|
 */


	// Defining Class Properties 

	public $taxonomy;
	public $object_type = [];
	public $args = [];
	public $labels = [];

	// In order to register_taxonomy('languages', $object_type, $args); 
	// we need to pass at least the taxonomy name, an array containing  
	// the post types that the taxonomy will support and the $args array.
	// The $args array, takes an aditional $labels array.
	// $taxonomy, $object_type, $args
	/**
	 *  _____________________________________________________
	 * | class MyClass                                       |
	 * | {                                                   |
	 * |	public $prop1 = "I'm a class property!";         |
	 * | }                                                   |
	 * |_____________________________________________________|
	 */

	/**
	 * Creates a new ContentTax Class
	 * @param string $taxonomy
	 * @param array $object_type
	 * @param array $args
	 * @param array $labels
	 */

	/** -----------------------------------------------------------------*/
	//                Using Constructors and Destructors
	/** -----------------------------------------------------------------*/
	/**------------------------------------------------------------------*/
	// When an object is instantiated, it’s often desirable to set a few 
	// things right off the bat. To handle this, PHP provides the magic 
	// __construct(), method which is called automatically whenever a new
	// object is created.
	//
	// For the purpose of illustrating the concept of constructors, add
	// a constructor to MyClass that will output a message whenever a new
	// instance of the class is created:
	/**------------------------------------------------------------------*/

	/**
	 *  _________________________________________________________________
	 * | class MyClass                                                   |
	 * | {                                                               |
	 * |    public $prop1 = "I'm a class property!";                     |
	 * |    public function __construct() {                              |
	 * |        echo 'The class "', __CLASS__, '" was initiated!<br />'; | 
	 * |    }                                                            |
	 * | }                                                               |
	 * | // Create a new object                                          | 
	 * | $obj = new MyClass;                                             |
	 * |_________________________________________________________________|
	 */



	public function __construct($taxonomy, $object_type = [], $args = [], $labels = []) {
		// OOP allows objects to reference themselves using $this. When working within a method,
		// use $this in the same way you would use the object name outside the class.
		$this->taxonomy = $taxonomy;

		$default_args = [
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'update_count_callback' => '_update_post_term_count',
		 	'query_var'  => true,
 			'rewrite'   => ['slug' => $this->taxonomy]
		];
		$required_labels = [
			'singular_name' => ucwords($this->taxonomy),
			'plural_name' => ucwords($this->taxonomy)
		];
		$default_object_type = [
			$this->object_type
		];


		$this->object_type = $object_type + $default_object_type;
		$this->args = $args + $default_args;
		$this->labels = $labels + $required_labels;
		// Now we have made the modifications needed on the Class Properties, 
		// But the $labels property has not been placed back in the $options array

		$this->args['labels'] = $this->labels + $this->default_labels();


		// add an action. Instead of passing a function inline, 
		// we are going to use a different kind of callable, that passes an object and a string that points to a method.
		add_action( 'init', array($this, "register"));
	}

	public function register() {
		register_taxonomy($this->taxonomy, $this->object_type, $this->args);
	}
	public function default_labels() {
	return [

		'name'                   => _x( $this->labels['plural_name'], 'taxonomy general name' ),
		'singular_name'          => _x( $this->labels['singular_name'], 'taxonomy singular name' ),
		'search_items'           => __( 'Search ' . $this->labels['plural_name'] ),
		'popular_items'          => __( 'Popular ' . $this->labels['plural_name'] ),
		'all_items'              => __( 'All ' . $this->labels['plural_name'] ),
		'parent_item'            => null,
		'parent_item_colon'      => null,
		'edit_item'              => __( 'Edit ' . $this->labels['singular_name'] ),
		'update_item'            => __( 'Update ' . $this->labels['singular_name'] ),
		'add_new_item'           => __( 'Add New ' . $this->labels['singular_name'] ),
		'new_item_name'          => __( 'New ' . $this->labels['singular_name'] ),
		'separate_items_with_commas' => __( 'Separate ' . strtolower($this->labels['plural_name']) . ' commas' ),
		'add_or_remove_items'        => __( 'Add or remove ' . $this->labels['plural_name'] ),
		'choose_from_most_used'      => __( 'Choose from the most used ' . strtolower($this->labels['plural_name']) ),
		'not_found'                  => __( 'No ' . strtolower($this->labels['plural_name']) . ' found' ),
		'menu_name'                  => __( $this->labels['plural_name'] )
	];
	}	
}


/**----------------------------------------------------------------*/
//         Now. After creating the class, a new class can be 
//  instantiated and stored in a variable using the 'new' keyword:
/**----------------------------------------------------------------*/
/**
 *  _________________________________________________________________
 * | class MyClass                                                   |
 * | {                                                               |
 * |    public $prop1 = "I'm a class property!";                     |
 * | }                                                               |
 * | $obj = new MyClass;                                             |
 * |_________________________________________________________________|
 */

/**----------------------------------------------------------------*/
// class-specific variables, work exactly like regular variables,  
// except they’re bound to the object and therefore can only be  
// accessed using the object. To read this property and output 
// it to the browser, reference the object from which to read   
// the property:
//
// echo $obj->prop1; 
/**----------------------------------------------------------------*/

/**
 *  ________________________________________________________________
 * | class MyClass                                                  |
 * | {                                                              |
 * |	public $prop1 = "I'm a class property!";                    |
 * | }                                                              |
 * | $obj = new MyClass;                                            |
 * | echo $obj->prop1;                                              |
 * |________________________________________________________________|
 */
