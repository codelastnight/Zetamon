# what is this

![GitHub (pre-)release](https://img.shields.io/github/release/dottechnopath/SaintsRoboticsSite/all.svg)

This repo contains source code for the rewritten website for interlake saints robotics (https://www.saintsrobotics.com)

The rewrite aims to use modern web development by creating a responsive, fast, and a website functional on all devices.

example page can be accessed here :

https://dottechnopath.github.io/Zetamon/home.html

website is now live and can be accessed at https://www.saintsrobotics.com


# how 2 develop

1. Create a local wordress server enviroment. I found [this tutorial](https://www.themeum.com/install-wordpress-localhost/) to be really simple and easy, but you can totally use whatever you want. 
2. Clone this repo into the `wp-content/themes/` folder under the wordpress installation directory.
3. Start the server and open ur favorite code editor. 

This theme utalizes [SCSS](https://sass-lang.com/), a css precompiler. In order to start messing with the css, you need to have both npm and sass installed. 

4. run `npm run sass` in a new terminal inside the repo directory. This is a script shortcut that will tell the SASS program to automatically compile the SASS files in `source_scss` into `css`.


# update/changelog type thing
![GitHub (pre-)release](https://img.shields.io/github/release/dottechnopath/SaintsRoboticsSite/all.svg)

 What works?
 - Home page has a landing page, and is editable
 - Menu, animation js, header is functional
 - mobile version not broken yet
 - pages and posts will render given a links 
 - you can now see multiple posts

 
 
 Issues :
 - optimizations:
   - literally dies on shitty connections
  
   - lags on slow machines
 - calandar is janky as fu
 - gutenburg images are not pretty
 - no members list view that is pretty
 - no post search
 - no way to sort posts
 - edge and firefox broken again
 


