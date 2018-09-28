=== search-into-subcategories ===
Plugin Name: search-into-subcategories
Plugin URI: http://wordpress.org/plugins/search-into-subcategories/
Description: search-into-subcategories
Author: lion2486
Version: 1.0.2
Author URI: http://codescar.eu 
Contributors: lion2486
Tags: search, subcategories 
Requires at least: 3.0.1
Tested up to: 4.7.2
Stable tag: 1.0.2
Text Domain: search-into-subcategories
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Search-Into-Subcategories plugin allows you to make a select-search shortcode for your own categories.

== Description ==

For Demo go here http://codescar.eu/projects/search-into-subcategories 

Search-Into-Subcategories plugin allows you to make a select-search shortcode for your own categories.

You can use if everywhere you want and make a tree structure for your categories.

[search-into-subcategories]

Arguments you can pass:

	parent_category Default is 0
		You can list only sub categories of the category id you give here. With 0 lists alla categories

	max_depth Default is 2
		How many subcategories (children of the parent_category) to display, at least 1.

	search_input Default is 1
		Display a text input for search. (You can turn it off with 0 value)

	labels Default is <empty string>
		Labels for the inputs. Give them in the order you want with '|' as separator. example: Category1|Category2|Text

	search_text Default is Search
		The text to display in search button.

	hide_empty Default is 1
		Hide categories without content, set to 0 to display all!

	exclude Default is <empty string>
		Category IDs to exclude from listing. Separate them with ','. Example: 6,7,13

    show_date_ranges Default is 0
        Show from/to date ranges to filter publish date. Set it to 1 to use it.

    custom_field Default is null
        List of custom meta-fields to search in (it will create a new input for every meta-field.
        ( Use , as separator, example: field1,meta_key,etc )

    custom_field_labels Default is null
        List for labels in custom meta fields text input. (Use | as separator, example: name1|name2|etc)

    custom_post_types Default is null
        Post type to filter results

    posts_per_page Default is null
        Set result page posts per page

    custom_taxonomy Default is category
        Set custom taxonomy to walk.


Example:
[search-into-subcategories  parent_category=0 max_depth=3 search_input=1 labels=cat1|cat2|cat3|Text search_text=Find
                            hide_empty=0 exclude=7,6 show_date_ranges=1 custom_field=author,my_custom
                            custom_field_labels=Author|Custom custom_post_types=documents posts_per_page=10 custom_taxonomy=my_taxonomy]

== Screenshots ==

1. Search Category Level 1
2. Search Category Level 2
3. Search Category Level 3 & Input

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `Search-into-subcategories-plugin` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the shortcode into your page/post you want.

== Changelog ==

= 1.0.2 =
* Added support for custom taxonomy
* A bug fix for meta-data fields

= 1.0.1 =
* Added placeholder to each input field.

= 1.0.0 =
* Major changes!
* Now you can use multiple instances on a page
* Fixed some JavaScript issues
* Added more search filters (date ranges, meta-field, post_type)

= 0.1.5 =
* Some changes, a problem have to be fixed.

= 0.1.3 =
* A fix for permalink structure

= 0.1.2 = 
* A small hotfix for category listing

= 0.1.1 =
* Javascript file loading only when shortcode used
* A label id fix
* Screenshots name fix

= 0.1 =
* First version