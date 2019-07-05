# acf-slideshow
This is a basic example of a Gutenberg slideshow block to be used in Wordress using Advanced Custom Fields ( https://www.advancedcustomfields.com ) and slick.js ( http://kenwheeler.github.io )

This code is meant to be used as an example for developers on how to use ACF to create blocks for the Gutenberg editor. Its not a full developed plugin.
# Instructions
* Advanced Custom Fields Pro must be installed and slick.js slideshow must be included in your theme. Instructions are found in ( http://kenwheeler.github.io )
* Copy acf-slideshow.php in your theme or plugin folder. This is the block code that will render the HTML.
* Copy the code found in functions.php in your theme's functions.php or plugin. This code will register the slideshow block in Gutenberg.
* Copy the slideshow settings found in index.js in your theme's js file.
* Copy the acf-json folder in your theme's folder. If you already have a acf-json folder just copy de .json file inside it. This file contains the custom fields to be used in the block. If you plan to modify this fields, remember to sync the fields in the ACF backend.