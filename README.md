# kitchen-sink

[![GitHub version](https://badge.fury.io/gh/waqastudios%2Finti-kitchen-sink.svg)](https://badge.fury.io/gh/waqastudios%2Finti-kitchen-sink)

An everything-and-the-kitchen-sink theme for the Inti Foundation WordPress parent theme 1.5

## Updated for Foundation 6.4.x and the XY Grid
[Inti Foundation](https://github.com/waqastudios/inti-foundation) is a WordPress parent theme that uses Foundation for Sites 6.4, the most advanced responsive front-end framework in the world. Foundation for Sites 6.4, unlike earlier versions, uses a flexbox based grid system called [XY Grid](http://foundation.zurb.com/sites/docs/xy-grid.html)


## Description
The Kitchen Sink theme is an example child theme for Inti Foundation. This child theme overrides the core Foundation 6 files from the parent theme library, as well as the ´_settings.scss´ file. By replacing the library directory, you can keep your theme's version of Foundation distinct from that of the parent theme, implement your own settings file and define its values, and recompile everything with Gulp will still making use of Inti Foundation's WordPress framework.

## Getting Started
### Gulp
Inti Foundation and its child themes come configured with a Gulp file that will compile your Sass and javascript changes for you with its watch function. (If your workflow doesn’t include Gulp, please review this file to see what library elements need to be compiled into a final CSS file with your own tools).

#### To begin:
 * Modify config.yml file for your setup
 * `npm install`
 * `npm build`
 * `npm default`, a new browser window will open pointing to a BrowserSync server displaying the WordPress installtion (via BrowserSync).

### Overwriting parent theme functions with custom files or by unhooking then hooking new functions
All php code is run from the Inti class in the parent theme. This looks for the individual php files to be include and includes them if found. You can either: 
 * Bypass these parent theme php files with your own with the same name in the same directory structure
 * Include new files, i.e. /framework/shortcodes/child-shortcodes.php and include them in functions.php

From functions.php
> locate_template() will first check the child theme for a file in that location, and if not found, will search the parent theme. Override parent theme files by giving the child theme versions the same name, set a unique name or add a prefix to load them in addition to parent theme files.

### Options
The theme can be configured, and more options can be added as you develop your own theme, with either an Options page or with Customizer in live preview mode. Both methods have been added by default in Inti Foundation so that you can choose which you'd prefer to you for your own options. By default, options that are more to do with global settings have been added to an Options page called "Inti Options" and options that are more to do with visual elements have been added in Customizer. Feel free to modify these as you see fit.

Have a look around and set the options activate elements in the theme. Perhaps the most important area is found in the Customizer and relates to the header area.

### Header / 'Site Banner'
In Inti Foundation we call the header area is made up of two parts. The menu and the 'site banner'. The site banner is a wrapper that is home to a number of elements that can be turned on and off, or customized in the Customizer. Upload a logo, turn on and off the site name and description, etc.

> The inti-kitchen-sink child theme expands on this with a number of template parts that contain variations of the header with different or additional elements or changes in position. Coupled with the numerous hooks before, after and inside each element wrapper, it's easy to change one of the most important parts of the site.

### Menus
The menu will appear in the theme when a menu is created and added to one of the three menu areas that exist by default in the theme. These are the main menu, the mobile menu (which is usually just the same menu) and the footer menu (which is usually single-level)

### Functionality switches
Each part of the theme, from default post types, to menu areas, to template files, to minor functions like the breadcrumps can be switched on and off with WordPress's `add_theme_support()` in functions.php

To make use of Inti Foundation's features as well as its styles and Foundation settings, please refer to the other example theme, <a href="https://github.com/waqastudios/inti-basic-starter">Basic Starter</a>

## 

## Changing Parent Theme functionality from Child Theme
Please visit <a href="http://inti.waqastudios.com/documentation/child-themes/">this link</a> for a guide on how to deactivate and add to the parent theme features and templates in the child theme.

## Documentation
Slowly but surely more complete documentation is being set up at [here](http://inti.waqastudios.com).

## Contributing
Please do leave comments, post new issues and make pull requests. Any form of contribution is welcome. 
You can also get in touch here: _stuart (at) waqastudios.com_