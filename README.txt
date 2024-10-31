=== Plugin Name ===
Print Basic Facts
Contributors: paranoia1906
Tags: Diagnostics, Tools, Troubleshooting, wp-config reader, File count, .htaccess
Requires at least: 4.8.3
Tested up to: 4.9.5
Requires PHP: 5.6
Stable tag: 1.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Print Basic Facts will display valuable, time saving, information for a WordPress site. Optimize your troubleshooting efforts with this lightweight application. Please send feedback or bugs to anthony@ledesma.tech.

== Description ==

Time saving diagnostic tool valuable for any investigation.  View wp-config,  htaccess, file count and total size of the WordPress installation.  

== Installation ==

Steps to install WordPress - Print Basic Facts plugin:

1. Download the 'print-basic-facts.zip' file to local computer.
2. Login as an administrator on a WordPress website.
3. From the plugins menu, click 'Add New' button, then 'Upload Plugin', after that click 'Choose File'.
4. From here locate 'print-basic-facts.zip' file and install.
5. Activate the plugin through the 'Plugins' menu in WordPress.

Plugin menu is accessible under Dashboard navigation menu item 'Tools' > 'Print Basic Facts'.

== Frequently Asked Questions ==

= Is this compatible on all hosting providers? =

Not at this time. What lacks is supporting viewing of web.config files for Windows hosting environments.

= Are there any additional functionalities you plan to add? =

I have plans to develop features to create replicas of files and database settings on command. This would enable a website technician to more quickly backup important content before making changes.

== Changelog ==

= 1.3.1 =
* Latest update revealed lack of hook check for plugin on other pages. 
* Hook check now added.

= 1.3 =
* Moved Basic Facts page to Dashboard > Tools > Print Basic Facts.
* Shift toward functional programming method.
* Improvements to code maintainability.
* Settings API integration development work placed on hold.

= 1.2 =
* Added handling of undefined constant errors when certain constants are not used within an installation.
* Corrected a few more spelling mistakes and adjusted some code to be more readable.

= 1.1 =
* Corrected a few spelling mistakes and added additional wordbreak css to help with smaller display text overlap.

= 1.0 =
* Original release. Features include:
* Viewing file contents on hosting environment including file count size and contents of wp-config.php and .htaccess
* Execute phpinfo() function to compare software requirements with actual settings.
* Display database specified information to assist with issue diagnosis.
* Click-to-copy text fields rendered by the plugin.

== Upgrade Notice ==

= 1.3.1 =
* Patch for proper style and JS hooks.

= 1.3 =
* Update is tested with WP version 4.9.5
* Basic Facts page is moved to Dashboard > Tools > Print Basic Facts.
* Update improves general code functionality and maintainability.

= 1.2 =
* Update will remove undefined errors caused by certain website configurations.

= 1.1 =
* This update improves user experience. Corrected a few spelling mistakes and added additional wordbreak css to help with smaller display text overlap.