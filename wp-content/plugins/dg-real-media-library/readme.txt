=== Document Gallery for Real Media Library ===
Contributors: mguenter
Tags: media library folders, folders, media categories, media folders, media category, media folder, rml, media library, real media library, files, media, organize, document, gallery, documents, thumbnails
Stable tag: trunk
Requires at least: 4.0
Tested up to: 4.9
License: GPLv2

Simply create a document gallery from a media library folder. (Real Media Library extension).

== Description ==

This plugin needs version > 4.3.2 of the [Document Gallery](https://wordpress.org/plugins/document-gallery/) plugin.

Watch the following video for a brief demonstration of [Document Gallery](https://wordpress.org/plugins/document-gallery/) in action:
[youtube http://www.youtube.com/watch?v=Xb7RVzfeUUg]

Just install this plugin and you will be able to use the following shortcode: <code>[dg id=-1 rml_folder=28]</code>. The rml_folder attribute is the ID of the folder.

How do you get the folder ID? Simply use the Real Media Library shortcode generator (visual editor toolbar) and select your folder. Then generate the shortcode and have a look at the <code>fid</code> attribute which represents your folder id.

This plugin is an extension for the [WP Real Media Library](https://codecanyon.net/item/wordpress-real-media-library-media-categories-folders/13155134) plugin that allows you to create folders in media library.
This plugin needs version >= 3.0 of the WP Real Media Library plugin.

== Installation ==

1. Goto your wordpress backend
2. Navigate to Plugins > Add new
3. Search for "Document Gallery for Real Media Library"
4. "Install"

== Frequently Asked Questions ==
 
= Why are folders grayed out in the RML shortcode generator dialog?  =
 
The Real Media Library shortcode generator does not allow all folders after installation. This is an extra option you must set in Settings > Media "Allow all folders for folder gallery".

== Changelog ==

= 1.0.0 =
* Initial Release.