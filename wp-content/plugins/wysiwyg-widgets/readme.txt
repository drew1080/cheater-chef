=== Plugin Name ===
Contributors: DvanKooten
Donate link: http://dannyvankooten.com/donate/
Tags: visual,tinymce,fckeditor,widget,widgets,rich text,wysiwyg,image widget,visual editor,html
Requires at least: 3.1
Tested up to: 3.7
Stable tag: 2.2.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Edit widget content using the default WordPress visual editor and media uploading functionality. Create widgets like you would create posts or pages.

== Description ==

= WYSIWYG Widgets or rich text widgets =

This plugin adds so called Widget Blocks to your website which you can easily show in a widget area. You can create or edit the widget blocks just like you would edit any post or page, with all the default WordPress editing functions enabled. This has the huge benefit that you can use the visual editor to format your text, so you don't have to write any HTML anymore. You can even use media uploading to insert images etc. into your widget content.

**Features:**

* Create beautiful widgets without writing any HTML
* Easily insert media into your widget content
* Add headers, lists, blockquotes and other HTML elements to your widgets using the WordPress visual editor
* Use WP Links dialog to easily link to any of your pages or posts from a widget
* Use shortcodes inside your widgets

**More information**

* [WYSIWYG Widgets](http://dannyvankooten.com/wordpress-plugins/wysiwyg-widgets/)
* Check out more [WordPress plugins](http://dannyvankooten.com/wordpress-plugins/) by the same author
* You should follow [@DannyvanKooten](http://twitter.com/dannyvankooten) on Twitter.
* [Thank Danny for this plugin by donating $10, $20 or $50.](http://dannyvankooten.com/donate/)

== Installation ==

1. Upload the contents of wysiwyg-widgets.zip to your plugins directory.
1. Activate the plugin
1. Create a Widget Block by going to *Widget Blocks > Add New*
1. Go to *Appearance > Widgets*, drag the WYSIWYG Widget to one of your widget areas and select which Widget Block to display.
1. *(Optional)* Go to the front-end of your website and enjoy your beautiful widget.

== Frequently Asked Questions ==

= What does this plugin do? =
This plugin creates a custom post type called "Widget Blocks" so you can create widget content just like you would create posts or pages. You can show these "Widget Blocks" by dragging a "WYSIWYG Widget" widget to one of your widget areas and selecting which widget block to display inside it.

= Where do I create a Widget Block? =
The plugin adds a menu to the *Pages* menu item. Just go to *Pages > Widget Blocks* and start creating beautiful widgets.

= What does WYSIWYG mean? =
What You See Is What You Get

= Can I switch between 'Visual' and 'HTML' mode with this plugin? =
Yes, all the default options that you are used to from the post editor are available for the widget editor.

= Will this plugin help me create widgets with images and links =
Yes.

= Is this plugin free? =
Yes, totally. Donations are appreciated though!

== Screenshots ==

1. Overview of created Widget Blocks
2. Edit the content of a WYSIWYG Widget just like you are used to edit posts.
3. Drag the WYSIWYG Widget to one of your widget areas and select the Widget Block to show.

== Changelog ==
= 2.2.6 - October 30, 2013 =
* Fixed: Show title checkbox now defaults to a checked state.

= 2.2.5 - October 26, 2013 =
* Added checkbox option to widget to hide the title.

= 2.2.4 - October 21, 2013 =
* Moved menu item back to its own menu item
* Widget title now defaults to the title of the selected Widget Block
* Some textual improvements

= 2.2.3 - October 16, 2013 =
* Moved menu item to pages to prevent capability problems
* Removed WP SEO meta box from edit widget block screen

= 2.2.2 =
* Improved: UI improvements, cleaned up admin area.
* Improved: Minor code improvement

= 2.2.1 =
* Improved: small code improvements
* Improved: changed menu position 

= 2.2 =
* Fixed: shortcodes were not processed in v2.1.

= 2.1 =
* Fixed: Social sharing buttons showing up after widget content.

= 2.0.1 =
* Added: meta box in WYSIWYG Widget editor screen.
* Added: debug messages for logged in administrators on frontend when no WYSIWYG Widget OR an invalid WYSIWYG Widget is selected.
* Added: title is now optional for even more control. If empty, it won't be shown. You are now no longer required to use the heading tag which is set in the widget options since you can use a (any) heading in your post.

= 2.0 =
* Total rewrite WITHOUT backwards compatibility. Please back-up your existing WYSIWYG Widgets' content before updating, you'll need to recreate them. Don't drag them to "deactivated widgets", just copy & paste the HTML content somewhere.

= 1.2 =
* Updated the plugin for WP 3.3. Broke backwards compatibility (on purpose), so when running WP 3.2.x and below: stick with [version 1.1.1](http://downloads.wordpress.org/plugin/wysiwyg-widgets.zip).

= 1.1.2 =
* Temporary fix for WP 3.3+

= 1.1.1 =
* Fixed problem with link dialog reloading page upon submit

= 1.1 =
* Changed the way WYSIWYG Widget works, no more overlay, just a WYSIWYG editor in your widget form.
* Fixed full-screen mode
* Fixed link dialog for WP versions below 3.2
* Fixed strange browser compatibility bug
* Fixed inconstistent working
* Added the ability to use shortcodes in WYSIWYG Widget's text

= 1.0.7 =
* Fixed small bug that broke the WP link dialog for WP versions older then 3.2
* Fixed issue with lists and weird non-breaking spaces
* Added compatibility with Dean's FCKEditor for Wordpress plugin
* Improved JS

**NOTE**: In this version some things were changed regarding the auto-paragraphing. This is now being handled by TinyMCE instead of WordPress, so when updating please run trough your widgets to correct this. :) 

= 1.0.6 =
* Added backwards compatibility for WP installs below version 3.2 Sorry for the quick push!

= 1.0.5 =
* Fixed issue for WP3.2 installs, wp_tiny_mce_preload_dialogs is no valid callback. Function got renamed.

= 1.0.4 =
* Cleaned up code
* Improved loading of TinyMCE
* Fixed issue with RTL installs

= 1.0.3 =
* Bugfix: Hided the #wp-link block, was appearing in footer on widgets.php page.
* Improvement: Removed buttons added by external plugins, most likely causing issues. (eg Jetpack)
* Improvement: Increase textarea size after opening WYSIWYG overlay.
* Improvement: Use 'escape' key to close WYSIWYG editor overlay without saving changes.

= 1.0.2 =
* Bugfix: Fixed undefined index in dvk-plugin-admin.php
* Bugfix: Removed `esc_textarea` which caused TinyMCE to break
* Improvement: Minor CSS and JS improvements, 'Send to widget' button is now always visible
* Improvement: Added a widget description
* Improvement: Now using the correct way to set widget form width and height

= 1.0.1 =
* Bugfix: Fixed the default title, it's now an empty string. ('')

= 1.0 = 
* Initial release

== Upgrade Notice ==

= 2.0  =
No backwards compatibility, please back-up your existing widgets before upgrading!