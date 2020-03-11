### HEAD

### 1.0.0 (January 7, 2016)

### 1.0.1 (January 11, 2016)

### 1.0.2 (January 20, 2016)

### 1.0.3 (February 13, 2016)

### 1.0.4 (February 25, 2016)

### 1.0.5 (March 3, 2016)

### 1.0.6 (March 6, 2016)

### 1.0.7 (March 23, 2016)

### 1.0.8 (March 23, 2016)

### 1.0.9 (April 28, 2016)

### 1.0.10 (May 4, 2016)

### 1.0.11 (May 21, 2016)

### 1.0.12 (Jul 22, 2016)

### 1.0.13 (Aug 9, 2016)
- [#1](https://github.com/waqastudios/inti-foundation/pull/1) Removed stray PHP short tag in a FPB (Front Page Block), replaced with complete <?php. (@joffcrabtree)
- Fixed typo for a field label in Inti Options
- Added do_shortcode() to the personal bio FPB (Front Page Block) that's likely to contain shortcodes

### 1.0.14 (Dec 12, 2016)
- Updated Foundation for Sites to 6.2.4
- Updated Font Awesome to 4.7.0
- Switched Off Canvas to right hand side by default
- Added animate.css by default
- Added template for front page block of 'page'
- Added the ability to add Google Fonts to the child theme faster
- Minor bugs

### 1.1.0 (Dec 21, 2016)
#### Note: This child theme now needs Inti Foundation 1.3.0+
- Happy Holidays!
- Upgraded to Foundation for Sites 6.3.0, with support for new off-canvas
- Combined _off-canvas and _top-bar into _navigation.scss
- Fixed bug with remove_action priorities in child-content-header.php and child-content-footer.php
- Added some default styles for opt-in forms
- Completely revised the way headers are added. Hopefully for the better especially where quick theme builds are concerned [24569f895a640de0a7b6a9e80574e61afba011c6]
- Added new slide-hero header format, includes F6 sticky functionality
- Added and included smooth-scroll for internal page linking
- Fixed bug with carousel overflows in two front page blocks
- Added scroll-to-top button that appears when you start to scroll down, can be turned off with a switch in functions.php
- [#4](https://github.com/waqastudios/inti-foundation/issues/4) Added LiveReload by default, as requested by @pablopaul

### 1.1.1 (Dec 26, 2016)
- Few styles added to slide-hero header for quirks that appear in some situations
- LiveReload forced to work after CSS files are generated from SCSS

### 1.1.2 (Apr 15, 2017)
- Upgraded to Foundation for Sites 6.3.1

### 1.1.3 (Jun 20, 2017)
- Added widget to display testimonials in sidebars
- Improved translations in es_ES after a bit of a cleanup
- Renamed all references to "Featured In/Brands", which is a post type, template, carousel for displaying logos of magazines, partners etc to "Logos"

### 1.2.0 (Jun 25, 2017)
#### Note: This child theme now recommends Inti Foundation 1.4.0+
- Updated site-headers - class names for different header types moved to outermost containers, Zurb's sticky added by default, new option from parent them for miniature logo for mobile and for sticky navigation logos taken into account, improved modern hero template
- Improved Zurb accordion defaults styles for easier theming

### 1.2.1 (Jul 11, 2017)
- Small bug fix on modern hero header

### 1.3.0 (July 12, 2017)
- Updated for Foundation 6.4.1
- All template files updated for XY Grid
- Completely reworked gulp file and build process
- Vendor files come from and are managed by npm

### 1.3.1 (July 23, 2017)
- Minor bug fixes 

### 1.3.2 (December 13, 2017)
- Switched from animate.css to animatewithsass

### 1.4.0 (Apr 19, 2018)
– Updated Foundation for Sites to 6.4.3
- Transitioned from grid-padding to grid-margin layouts as per (https://github.com/zurb/foundation-sites/pull/10371)

### 1.4.1 (Jun 1, 2018)
- Added basic tool for GDPR cookie compliance. Allows overall setting and removing of cookies by the visitor, for the site owner to categorize cookie-setting JS into one of three (or more) types and the visitor to allow/disallow each cookie category individually.

### 1.5.0 (Mar 13, 2018)
– Updated Foundation for Sites to 6.5.3
- Upgraded to FontAwesome 5
- Bug fixes for PHP 7.2
- Tweaks for image captions
- Fixed bug that changes focus on Cookie Manager link
- [#9](https://github.com/waqastudios/inti-foundation/pull/9) Fix npm gulp dependency, since there is no longer a 4.0 branch of gulpjs

### 1.6.0 (Mar 11, 2020)
- Updated Foundation for Sites to 6.6.1