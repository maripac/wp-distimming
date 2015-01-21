<?php
 /**
 *  Plugin Name: App Bootstraping 
 *  Description: This file instantiates two new objects whose properties and methods are defined in the class ContentType and ContentTax. Actions are the hooks that the WordPress core launches at specific points during execution, or when specific events occur. Plugins can specify that one or more of its PHP functions are executed at these points, using the Action API.
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
	    'supports' => ['editor', 'title', 'custom-fields', 'author', 'thumbnail'],
	    'taxonomies' => ['languages']
	], [
	    'singular_name' => "Snippet"
    ]);

	$languages = new WPPlugins\WPExtend\ContentTax('languages', ['post', 'snippets'], [], [
	    'singular_name' => "Language",
	    'plural_name' => "Languages"
    ]);
});