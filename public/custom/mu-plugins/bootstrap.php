<?php
 /**
 *  Plugin Name: App Bootstraping 
 *  Description: This file instantiates two new objects whose properties and methods are defined in the class ContentType.
 *  Author: Maripac
 *  Version: 1.0
 *  
 */

add_action('plugins_loaded', function () {
	$quotes = new WPPlugins\WPExtend\ContentType('quotes', [
		'supports' => ['editor', 'title', 'revisions', 'custom-fields', 'thumbnail'],
	    'taxonomies' => ['languages']
	], [
	    'singular_name' => "Quote"
    ]);

	$snippets = new WPPlugins\WPExtend\ContentType('snippets', [
	    'supports' => array('editor', 'title', 'custom-fields', 'author', 'thumbnail'),
	    'taxonomies' => array('languages')
	], [
	    'singular_name' => "Snippet"
    ]);

	$pet_post_lang = new WPPlugins\WPExtend\ContentTax('languages', ['post', 'snippets'], [], [
	    'singular_name' => "Language",
	    'plural_name' => "Languages"
    ]);
});

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
/** $quicknotes = new ContentType('quicknote', [], ['plural_name' => 'Quick Notes', 'singular_name' => 'Quick Note']); */