=== SEO Themes Core ===
Contributors: seothemes
Tags: genesis
Donate link: https://seothemes.com
Requires at least: 5.2.3
Tested up to: 5.2.3
Requires PHP: 5.6
Stable tag: trunk
License: GPL-2.0-or-later
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Core functionality plugin for SEO Themes Genesis child themes.

== Description ==

SEO Themes Core will be shown in the list of recommended plugins when you activate any one of our themes and run through the Genesis [One Click Theme Setup](https://studiopress.github.io/genesis/theme-setup/) process.

Upon activation, this plugin works out which theme is currently active and provides the specific functionality for that theme. Some of that functionality includes:

- Customizer settings
- Handy shortcodes
- Hero section
- Widget areas
- WooCommerce compatibility
- Shared CSS and JS
- Repositioning of Genesis hooks
- Useful helper functions
- Loading Google Fonts

This plugin was created as a way to keep your child themes up to date with the latest features, security fixes and bug fixes. By shifting the majority of code out of the child theme and into a plugin, we are able to provide automatic updates without overwriting customizations made to your child theme.

== Installation ==
1. Go to Plugins > Add New.
2. Type in the name of the WordPress Plugin or descriptive keyword, author, or tag in Search Plugins box or click a tag link below the screen.
3. Find the WordPress Plugin you wish to install.
4. Click Details for more information about the Plugin and instructions you may wish to print or save to help setup the Plugin.
5. Click Install Now to install the WordPress Plugin.
6. The resulting installation screen will list the installation as successful or note any problems during the install.
7. If successful, click Activate Plugin to activate it, or Return to Plugin Installer for further actions.

== Frequently Asked Questions ==

= How can I override plugin functionality? =
Everything in this plugin is a hook, you can add/remove/modify them the same way as any other hook.

One thing worth noting is that this plugin uses namespaces to avoid naming conflicts. This means that the namespace needs to be included in the name of the function to modify. For example:

`remove_filter( 'get_custom_logo', '\SeoThemes\Engine\Structure\custom_logo_size' );`

The namespace can be found at the top of each file in the plugin.

== Changelog ==

= 1.0.0 =
* Initial release.
