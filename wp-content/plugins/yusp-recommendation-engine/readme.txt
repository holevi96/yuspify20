=== Yuspify Recommendation Engine ===
Contributors: gravityinc
Tags: yusp, recommendation, engine, yuspify, woocommerce, ecommerce, personalization
Requires at least: 4.0
Tested up to: 4.9
Stable tag: 1.3.13
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin connects your store to the Yuspify Recommendation Engine.

== Description ==

**Are you serious about personalization?** You deserve better for your WooCommerce store than a simple similar product & accessories module.

Yuspify is the Ecommerce plugin version of Yusp, Netflix award winning, machine learning powered personalization engine, that has never lost a single A/B test against competitors. Yuspify helps you **increase your eCommerce revenues up to 15%** with product recommendations. This plugin establishes a connection between your WooCommerce store and the Yuspify recommendation engine, therefore it only works if you already have an account (more information about the pricing <a href="https://www.yuspify.com/pricing?utm_source=woocommerce&utm_medium=referral&utm_campaign=woocommerce_plugin">here</a>).

Download and get started today with <a href="https://account.yusp.com/checkout/?utm_source=woocommerce&utm_medium=referral&utm_campaign=woocommerce_plugin">30 days free</a> – no credit card required!

= What does this plugin do? =

Yuspify Recommendation Engine plugin connects your WooCommerce store with a Yusp account. Yuspify is a product of global personalization provider Gravity R&D. Gravity operates recommender solutions on five continents in twenty countries and serves over 35 billion recommendations a month, resulting in a monthly $40M in extra revenues for their clients.

The plugin synchronizes the user and product catalogs on your site with your Yuspify database and records user event data on your site through a Javascript tracking code.

The system uses this information to provide fine-tuned, personalized recommendations on your website, so you can get the most value out of your traffic by providing your visitors with a relevant and pleasant user experience - either on your **home, product, category or cart page.**

Yuspify automatically builds up item connections, so you can utilize cross sell and upsell offers, frequently bought and viewed together products.

You can set up custom designed recommender boxes on your site and choose from a set of predefined logics on the Yuspify Dashboard interface.

== Getting Started ==

1. Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation, or install the plugin directly through the WordPress plugins screen.<br>
2. Activate the plugin through the 'Plugins' screen in WordPress.<br>
3. Register for an account at <a href="https://account.yusp.com/checkout/?utm_source=woocommerce&utm_medium=referral&utm_campaign=woocommerce_plugin">https://account.yusp.com</a> - All new registrants get a 30 day free trial. You can check out our prices <a href="https://www.yuspify.com/pricing?utm_source=woocommerce&utm_medium=referral&utm_campaign=woocommerce_plugin">here.</a> <br>


== Installation ==

To set up the Yuspify recommendation engine on your website, you’ll first need to:

1, Install and activate the Yuspify plugin on your Wordpress site<br>
2, Register for an account at https://account.yusp.com - All new registrants get a 30 day free trial.<br>

After you’re done with these initial step, here’s how you can set up the plugin on your site:

1, Log into your Yuspify Dashboard with the credentials you receive in your confirmation email.<br>
2, When presented with the initial installation screen, choose “Woocommerce Installation” from the available options.<br>
3, As a first step, you’ll need to copy and paste the URL of one of your product pages into the input field.<br>
4, When you’re done, navigate to Settings -> Yuspify Recommendation Engine on your Wordpress site and paste the Client ID, Servlet URL and Password from the installation guide into the appropriate fields on the Wordpress interface. <br>
5, Your store’s product and user catalog will now get synchronized with your account. <br>
6, When you’re finished, you’ll be presented with another guide which will walk you through the process of setting up and inserting your first Yuspify recommendation box. <br>

== Screenshots ==

1. The Yuspify Recommendation Engine WooComerce Guide.
2. Yuspify Recommendation Engine Dashboard.
3. Example of Yuspify recommendation box.

== Changelog ==

= 1.0 =
* Add all tracking functions.

= 1.0.1 =
* Add compatibility to WordPress 4.8 version and update yusp logo

= 1.1.1 =
* Add SKU attribute to product

= 1.1.2 =
* Optimize memory usage in product synchronization

= 1.2.0 =
* Add XML generating

= 1.3.0 =
* Add switcher to enable User and Product synchronization
* Fix in order page the unit price

= 1.3.1 =
* Send buy events only, when it's a new order

= 1.3.2 =
* Fix itemInCart meta tag

= 1.3.3 =
* Fix Feed generation
* Add compatibility to WordPress 4.9 version

= 1.3.4 =
* Add nullcheck to synchronization events

= 1.3.5 =
* Fix product variations sync

= 1.3.6 =
* Fix product type management

= 1.3.7 =
* Add Composite Product compatibility

= 1.3.8 =
* Add Available synchronization

= 1.3.9 =
* Update Manage recommendations link

= 1.3.10 =
* Fix add Product synchronization error

= 1.3.11 =
* Fix category path in product synchronization

= 1.3.12 =
* Add logger and fix product import synchronization
* Rename Yusp to Yuspify

= 1.3.13 =
* Fix add_to_cart itemId
* Add null check to login event