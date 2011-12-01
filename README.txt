UCLA2 Theme
===========

This is the second UCLA drupal theme. It's a zen sub-theme for D6.

Initial install (use sudo if needed)
====================================
- go to your /themes folder
- git clone git@github.com:discoverygarden/ucla2-theme.git (or use the https:// link)
- mv ucla2-theme ucla2

Structure
=========
- the main navigation bar is populated by primary menu items.
- the links and solr search fields are located in the header area. You can use any menu block, but the solr block
has to be the islandora simple search block.

Extra:
======
Included in the theme is an export file for the aggregator view. This is located at /other/views-aggregator-export.txt .
- Enable aggregator and pull the following feed: http://blogs.library.ucla.edu/digitallibraryprogram/feed/ (run cron)
- install and enable views and views slideshow (+singleframe)
- import the view (!important: view name should be "digitallibraryprogram")