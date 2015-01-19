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

/** ________________________________________*/
/** _________________________________________
 * |										 |
 * | Creating a custom Taxonomy              |
 * | Add it to the init action 		         |
 * |_________________________________________|
 */

/** _________________________________________
 * | add_action('init', function () {        |
 * |                                         |
 * | });                                     |
 * |_________________________________________|
 */

/** ____________________________________________________________*/
/** ____________________________________________________________
 * | Call the register taxonomy function 						|
 * | which is provided by Wordpress's core 					    |           
 * |____________________________________________________________|
 */

/** ____________________________________________________________ 
 * | add_action('init', function () {							|
 * |															|
 * |    register_taxonomy( 'languages', $object_type, $args ); 	|
 * |															|
 * | });														|
 * |____________________________________________________________|
 */

/** ________________________________________*/
/**-------------------------------------------------------------*/
/**             Call the register taxonomy function             */
/**             which is provided by Wordpress's core           */
/**  ___________________________________________________________*/
// 	| 
//  | add_action('init', function () {
// 	|
//  |   register_taxonomy( 'languages', $object_type, $args );
//	| 
// 	| });
/** |___________________________________________________________*/
/**-------------------------------------------------------------*/

/**-----------------------------------------------------------------------------------------*/
//       Register Custom Taxonomy Example of 'writer' taxonomy for a custom post type 'book'
/**-----------------------------------------------------------------------------------------*/
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
//

/**
 *  register_taxonomy( 'post_tag', 'post', array(
 *  'hierarchical' => false,
 *  'query_var' => 'tag',
 *  'rewrite' => $rewrite['post_tag'],
 *  'public' => true,
 *  'show_ui' => true,
 *  'show_admin_column' => true,
 *  '_builtin' => true,
 *  ) );
 *  <?php register_taxonomy( $taxonomy, $object_type, $args ); ?>
 *
 *
 *
 */




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

class ContentTax {


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
	// $taxonomy, $object_type, $args

	public $taxonomy;
	public $object_type = [];
	public $args = [];
	public $labels = [];
	

	/**
	 * Creates a new ContentTax Class
	 * @param string $taxonomy
	 * @param array $object_type
	 * @param array $args
	 * @param array $labels
	 */

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
