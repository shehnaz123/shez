=== Footer Plugin for Divi ===
Contributors: diviframework, mrkdevelopment, freemius
Donate link: https://www.mrkwp.com
Tags: diviframework, footer
Requires at least: 4.9.8
Tested up to: 5.2.1
Stable tag: 3.3.4
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The plugin allows you to insert a library item as a footer on all your pages / posts and archive when using the Divi Theme from Elegant Themes.

== Description ==

Divi gives the ability to design and save global sections. To use a section as a footer, we would have to include it on all the pages we create manually. What if it automatically injected in all the page? The Divi Global Footer Injector does just that.

This saves a lot of time and also allows you to use the footer on Archive pages and WooCommerce pages.

The premium version allow you to select post types and have more control over when a footer is added or removed from a specific page.

= Special Features =
* Use the Divi Builder to edit your page Footer Layout.
* Easy to use global settings
* Works with custom post-types, archive pages and blog posts
* Can add footer layouts to WooCommerce pages

== Installation ==

To install,

1. Upload `divi-global-footer-injector` archive file to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

=Can you us different footers on different post types?=
Yes, you can. You can add in this method via the Theme Customise OR Appearance -> Customise area of the WordPress CMS.

=Known issues with other plugins?=
*oEmbed Provider â€“ It calls the same hooks used to inject the footer, hence footer is embedded in oEmbeds. Also, it has compatibility issues with Divi Theme.
*Gravity Forms â€“ Member Confirmation page can cause issues with the plugin. To fix it you need custom code.
*WPML â€“ Using the footer for multiple languages does not work currently. We are looking at the possibility of fixing this.
=Can I use a page layout for my Global Footer?=
Yes, you can do that. If you can save something to the Divi Library you can set it in the footer injector plugin.

=Can I still use the default footer widgets with the Divi Global Footer?=
Yes, you can.

=How do I add the Footer Injector to each page?=
Create a Section Layout and save it to your Divi Library.
Go to Divi Global Footer inside your Divi Menu and select your layout from the drop-down.
Further documentation can be found on https://www.mrkwp.com.

=Can I edit the footer with the front end builder?=
The footer injection hook provided from Divi does not work with the front end builder. This means your footer blocks will disappear whilst your edit pages with a footer injected whilst using the front end builder. You can edit library items and the footer with the latest build tools from Divi.

== Screenshots ==
1. Manage the footer settings from the backend of the site under the new Divi GLobal Footer menu item
2. The theme customiser also gains new tools to manage your footers.

== Changelog ==

=3.3.4=
* Changed internal name-spacing to avoid conflict.

=3.3.3=
* fixed admin style url.

=3.3.2=
* Updated branding.

=3.3.1=
June 12, 2019
* Updated readme.txt to be valid.
* Upgraded freemius to version 2.3.0
* Sanitized inputs from footer settings form and single post type's `hide footer` post meta.

=3.3.0=
June 10, 2019
Change for WordPress.org and Premium upgrade features.

=3.2.3=
March 18, 2019
Fix for licensing code check bug

=3.2.2=
January 16, 2019
Fix for meta box name which was clashing with Custom Post Builder's meta box and hence making it to disappear

=3.2.1=
January 8, 2019
Global footer disabled when frontend builder is active.

=3.2.0=
December 27, 2018
Added ability to hide footer on "per page" basis

=3.1.3=
August 16, 2018
Global footer was ignoring line breaks in the footer text. Fixed it

=2.0.3=
January 17, 2017
Added licensing code.

=2.0.1=
January 17, 2017
Initial Release

== Upgrade Notice ==

= 2.0 =
Changed to new namespace.

= 2.0.2 =
Licensing code with activation hook.