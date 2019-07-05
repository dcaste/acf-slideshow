# acf-slideshow
This is a basic example of a Gutenberg slideshow block to be used in Wordress using Advanced Custom Fields ( https://www.advancedcustomfields.com ) and slick.js ( http://kenwheeler.github.io )

This code is meant to be used as an example for developers on how to create blocks for the Gutenberg editor using the Advanced Custom Fields plugin. It is not a full developed plugin.

This code uses slick.js for the slideshow animations but another slideshow plugin can be used.
# Instructions
* Advanced Custom Fields Pro must be installed and slick.js slideshow must be included in your theme. Instructions are found in ( http://kenwheeler.github.io )
* Copy acf-slideshow.php in your theme or plugin folder. This is the block code that will render the HTML.
* Copy the code found in functions.php in your theme's functions.php or plugin. This code will register the slideshow block in Gutenberg.
* Copy the slideshow settings found in index.js in your theme's js file.
* Copy the acf-json folder in your theme's folder. This file contains the custom fields to be used in the slideshow block. If you already have a acf-json folder just copy de .json file inside it. If you plan to modify these fields, remember to sync the fields in the ACF backend first so the custom fields found in the .json are added to the WordPress database.