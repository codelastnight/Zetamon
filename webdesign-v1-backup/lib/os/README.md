![OverlayScrollbars](https://kingsora.github.io/OverlayScrollbars/img/logo.png)

## OverlayScrollbars

OverlayScrollbars is a javascript scrollbar plugin which hides the native scrollbars and provides custom styleable scrollbars, but keeps the native functionality and feeling.

## Why?

I've created this plugin because I hate ugly and space consuming scrollbars. Similar plugins haven't met my requirements in terms of features, quality, simplicity, license or browser support.

## Goals & Features

 - A simple, powerful and good documented API.
 - High browser compatibility (<b>IE8+</b>, <b>Safari6+</b>, <b>Firefox</b>, <b>Opera</b>, <b>Chrome</b> and <b>Edge</b>).
 - Usage of the most recent technologies to ensure maximum efficiency and performance on newer browsers.
 - Can be used without any dependencies or with jQuery.
 - Automatic update detection - after the initialization you don't have to worry about updating.
 - Extremely powerful scroll method with features like animations, relative coordinates, scrollIntoView and more.
 - Mouse and touch support.
 - Textarea and Body support.
 - Direction RTL support. (with normalization)
 - Simple and effective scrollbar-styling.
 - Sophisticated extension system.
 
## Demo & Documentation

You can find a detailed documentation, demos and theme templates [here](https://kingsora.github.io/OverlayScrollbars).

## Dependencies

**The default version doesn't requires any dependencies!**

If you are using the jQuery dependent version it obviously requires [jQuery](https://jquery.com/) to work.  
It was tested with the jQuery versions: 1.9.1, 2.x, 3.x, and it won't work with jQuery slim.

## Download

#### manually
Download OverlayScrollbars manually from [Releases](https://github.com/KingSora/OverlayScrollbars/releases).

#### cdn
You can also use OverlayScrollbars via a [cdn](https://cdnjs.com/libraries/overlayscrollbars).

#### npm
OverlayScrollbars can be also downloaded from [npm](https://www.npmjs.com/package/overlayscrollbars).

```
npm install overlayscrollbars
```

## Usage

#### HTML

Load your CSS file(s) before the JS file(s), to prevent unexpected bugs.

Include **OverlayScrollbars.css** and **OverlayScrollbars.js** to your HTML file.  

```html
<!-- Plugin CSS -->
<link type="text/css" href="path/to/OverlayScrollbars.css" rel="stylesheet"/>
<!-- Plugin JS -->
<script type="text/javascript" src="path/to/OverlayScrollbars.js"></script>
```

If you are using the jQuery version, include [jQuery](https://jquery.com/) before the plugin and use **jquery.overlayScrollbars.js**

```html
<!-- Plugin CSS -->
<link type="text/css" href="path/to/OverlayScrollbars.css" rel="stylesheet"/>
<!-- jQuery JS -->
<script type="text/javascript" src="path/to/jquery.js"></script>
<!-- Plugin JS -->
<script type="text/javascript" src="path/to/jquery.overlayScrollbars.js"></script>
```

#### Javascript

Initialize the plugin after your document has been fully loaded.

Default initialization:
```js
document.addEventListener("DOMContentLoaded", function() {
        //The first argument are the elements to which the plugin shall be initialized
        //The second argument has to be at least a empty object or a object with your desired options
        OverlayScrollbars(document.querySelectorAll('body'), { });
});
```

jQuery initialization:
```js
$(function() {
	//The passed argument has to be at least a empty object or a object with your desired options
	$('body').overlayScrollbars({ });
});
```

## Options

Due to clarity i can't provide all informations here.  
Take the table below only as a overview of all options.  
[Please read the much more detailed documentation](https://kingsora.github.io/OverlayScrollbars/#!documentation).  


<table>
	<thead>
		<tr>
			<th align="left" colspan="2">option</th>
			<th align="left">type</th>
			<th align="left">default</th>
			<th align="left">description</th>
		</tr>
	</thead>
	<tr>
		<td colspan="2">className</td>
		<td>string / null</td>
		<td><code>"os-theme-dark"</code></td>
		<td>The class name which shall be added to the host element.</td>
	</tr>
	<tr>
		<td colspan="2">resize</td>
		<td>string</td>
		<td><code>"none"</code></td>
		<td>The resize behavior of the host element. This option works exactly like the CSS3 resize property.</td>
	</tr>
	<tr>
		<td colspan="2">sizeAutoCapable</td>
		<td>boolean</td>
		<td><code>true</code></td>
		<td>Indicates whether the host element is capable of "auto" sizes such as: <code>width: auto</code> and <code>height: auto</code>.</td>
	</tr>
	<tr>
		<td colspan="2">clipAlways</td>
		<td>boolean</td>
		<td><code>true</code></td>
		<td>Indicates whether the content shall be clipped always.</td>
	</tr>
	<tr>
		<td colspan="2">normalizeRTL</td>
		<td>boolean</td>
		<td><code>true</code></td>
		<td>Indicates whether RTL scrolling shall be normalized.</td>
	</tr>
	<tr>
		<td colspan="2">paddingAbsolute</td>
		<td>boolean</td>
		<td><code>false</code></td>
		<td>Indicates whether the padding for the content shall be absolute.</td>
	</tr>
	<tr>
		<td colspan="2">autoUpdate</td>
		<td>boolean / null</td>
		<td><code>null</code></td>
		<td>Indicates whether the plugin instance shall be updated continuously within a update loop.</td>
	</tr>
	<tr>
		<td colspan="2">autoUpdateInterval</td>
		<td>number</td>
		<td><code>33</code></td>
		<td>The interval in milliseconds in which a auto update shall be performed for this instance.</td>
	</tr>
	<tr>
		<th align="left" colspan="5">nativeScrollbarsOverlaid : {</th>
	</tr>
	<tr>
		<td></td>
		<td>showNativeScrollbars</td>
		<td>boolean</td>
		<td><code>false</code></td>
		<td>Indicates whether the native overlaid scrollbars shall be visible.</td>
	</tr>
	<tr>
		<td></td>
		<td>initialize</td>
		<td>boolean</td>
		<td><code>true</code></td>
		<td>
			Indicates whether the plugin shall be initialized even if the native scrollbars are overlaid.<br>
			If you initialize the plugin on the body element, I recommend to set this option to false.
		</td>
	</tr>
	<tr>
		<th align="left" colspan="5">}</th>
	</tr>
	<tr>
		<th align="left" colspan="5">overflowBehavior : {</th>
	</tr>
	<tr>
		<td></td>
		<td>x</td>
		<td>string</td>
		<td><code>"scroll"</code></td>
		<td>The overflow behavior for the x (horizontal) axis.</td>
	</tr>
	<tr>
		<td></td>
		<td>y</td>
		<td>string</td>
		<td><code>"scroll"</code></td>
		<td>The overflow behavior for the y (vertical) axis.</td>
	</tr>
	<tr>
		<th align="left" colspan="5">}</th>
	</tr>
	<tr>
		<th align="left" colspan="5">scrollbars : {</th>
	</tr>
	<tr>
		<td></td>
		<td>visibility</td>
		<td>string</td>
		<td><code>"auto"</code></td>
		<td>The basic visibility of the scrollbars.</td>
	</tr>
	<tr>
		<td></td>
		<td>autoHide</td>
		<td>string</td>
		<td><code>"never"</code></td>
		<td>The possibility to hide visible scrollbars automatically after a certain action.</td>
	</tr>
	<tr>
		<td></td>
		<td>autoHideDelay</td>
		<td>number</td>
		<td><code>800</code></td>
		<td>The delay in milliseconds before the scrollbars gets hidden automatically.</td>
	</tr>
	<tr>
		<td></td>
		<td>dragScrolling</td>
		<td>boolean</td>
		<td><code>true</code></td>
		<td>Defines whether the scrollbar-handle supports drag scrolling.</td>
	</tr>
	<tr>
		<td></td>
		<td>clickScrolling</td>
		<td>boolean</td>
		<td><code>false</code></td>
		<td>Defines whether the scrollbar-track supports click scrolling.</td>
	</tr>
	<tr>
		<td></td>
		<td>touchSupport</td>
		<td>boolean</td>
		<td><code>true</code></td>
		<td>Indicates whether the scrollbar reacts to touch events.</td>
	</tr>
	<tr>
		<th align="left" colspan="5">}</th>
	</tr>
	<tr>
		<th align="left" colspan="5">textarea : {</th>
	</tr>
	<tr>
		<td></td>
		<td>dynWidth</td>
		<td>boolean</td>
		<td><code>false</code></td>
		<td>Indiactes whether the textarea width will be dynamic (content dependent).</td>
	</tr>
	<tr>
		<td></td>
		<td>dynHeight</td>
		<td>boolean</td>
		<td><code>false</code></td>
		<td>Indiactes whether the textarea height will be dynamic (content dependent).</td>
	</tr>
	<tr>
		<th align="left" colspan="5">}</th>
	</tr>
	<tr>
		<th align="left" colspan="5">callbacks : {</th>
	</tr>
	<tr>
		<td></td>
		<td>onInitialized</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the plugin was initialized. It takes no arguments.</td>
	</tr>
	<tr>
		<td></td>
		<td>onInitializationWithdrawn</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the initialization of the plugin was aborted due to the option <code>nativeScrollbarsOverlaid : { initialize : false }</code>. It takes no arguments.</td>
	</tr>
	<tr>
		<td></td>
		<td>onDestroyed</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the plugin was destryoed. It takes no arguments.</td>
	</tr>
	<tr>
		<td></td>
		<td>onScrollStart</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the user starts scrolling. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onScroll</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after every scroll. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onScrollStop</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the user stops scrolling. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onOverflowChanged</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the overflow has changed. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onOverflowAmountChanged</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the overflow amount has changed. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onDirectionChanged</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the direction has changed. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onContentSizeChanged</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the content size has changed. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onHostSizeChanged</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the host size or host padding has changed. It takes one argument.</td>
	</tr>
	<tr>
		<td></td>
		<td>onUpdated</td>
		<td>function / null</td>
		<td><code>null</code></td>
		<td>Gets fired after the host size has changed. It takes one argument.</td>
	</tr>
	<tr>
		<th align="left" colspan="5">}</th>
	</tr>
</table>

## Methods

Click on the method name to open a more detailed documentation.

#### Instance methods:

<table>
	<thead>
		<tr>
			<th align="left">name</th>
			<th align="left">description</th>
		</tr>
	</thead>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-options" target="_blank">.options()</a></b></td>
		<td>Returns or sets the options of the instance.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//get options
var options = instance.options();
//set options
instance.options({ className : null });</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-update" target="_blank">.update()</a></b></td>
		<td>Updates the instance.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//soft update
instance.update();
//hard update
instance.update(true);</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-sleep" target="_blank">.sleep()</a></b></td>
		<td>Disables every observation of the DOM and puts the instance to "sleep". This behavior can be reset by calling the <code>update()</code> method.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//put the instance to sleep
instance.sleep();</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-scroll" target="_blank">.scroll()</a></b></td>
		<td>Returns the scroll information or sets the scroll position.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//get scroll information
var scrollInfo = instance.scroll();

//scroll 50px on both axis
instance.scroll(50);

//add 10px to the scroll offset of each axis
instance.scroll({ x : "+=10", y : "+=10" });

//scroll to 50% on both axis with a duration of 1000ms
instance.scroll({ x : "50%", y : "50%" }, 1000);


//scroll to the passed element with a duration of 1000ms
instance.scroll($(selector), 1000);</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-scrollstop" target="_blank">.scrollStop()</a></b></td>
		<td>Stops the current scroll-animation.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//scroll-animation duration is 10 seconds
instance.scroll({ y : "100%" }, 10000);
//abort the 10 seconds scroll-animation immediately
instance.scrollStop();
//scroll-animation duration is 1 second
instance.scroll({ y : "100%" }, 1000);</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-getelements" target="_blank">.getElements()</a></b></td>
		<td>Returns all relevant elements.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//get the element to which the plugin was applied
var pluginTarget = instance.getElements().target;</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-getstate" target="_blank">.getState()</a></b></td>
		<td>Returns a object which describes the current state of this instance.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//get the state of the plugin instance
var pluginState = instance.getState();</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-destroy" target="_blank">.destroy()</a></b></td>
		<td>Destroys and disposes the current instance and removes all added elements form the DOM.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//destroy the instance
instance.destroy();</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-ext" target="_blank">.ext()</a></b></td>
		<td>Returns the instance of a certain extension of the current plugin instance.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//get the instance of the extension "myExtension"
var extensionInstance = instance.ext("myExtension");</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-addext" target="_blank">.addExt()</a></b></td>
		<td>Adds a extension to the current instance.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//add the registered extension "myExtension" to the plugin instance
var extensionInstance = instance.addExt("myExtension");</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/method-removeext" target="_blank">.removeExt()</a></b></td>
		<td>Removes a extension from the current instance.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//add the registered extension "myExtension" to the plugin instance
instance.addExt("myExtension");

//remove the added extension "myExtension" from the plugin instance
instance.removeExt("myExtension");</pre>
		</td>
	</tr>
</table>

#### Global methods:

<table>
	<thead>
		<tr>
			<th align="left">name</th>
			<th align="left">description</th>
		</tr>
	</thead>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/gmethod-defaultoptions" target="_blank">OverlayScrollbars.defaultOptions()</a></b></td>
		<td>Returns or Sets the default options for each new plugin initialization.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//get the current defaultOptions
var defaultOptions = OverlayScrollbars.defaultOptions();
//set new default options
OverlayScrollbars.defaultOptions({
	className : "my-custom-class",
	resize    : "both"
});</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/gmethod-globals" target="_blank">OverlayScrollbars.globals()</a></b></td>
		<td>Returns a plain object which contains global information about the plugin and each instance of it.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//get the global information
var globals = OverlayScrollbars.globals();</pre>
		</td>
	</tr>
	<tr>
		<td><b><a href="https://kingsora.github.io/OverlayScrollbars/#!documentation/gmethod-extension" target="_blank">OverlayScrollbars.extension()</a></b></td>
		<td>Registers, Unregisters or returns extensions.</td>
	</tr>
	<tr>
		<td colspan="2">
			example(s):<br> 
			<pre lang="js">
//register a dummy extension with the name "myExtension"
OverlayScrollbars.extension("myExtension", function() { return { }; });
//unregister the extension with the name "myExtension"
OverlayScrollbars.extension("myExtension", null);
//get the extension-object with the name "myExtension"
var registeredExtension = OverlayScrollbars.extension("myExtension");
//get all registered extension-objects
var extensionObjects = OverlayScrollbars.extension();</pre>
		</td>
	</tr>
</table>

## Future Plans

 - Minimize the code as much as possible.
 - Frequent updates in terms of bugsfixes and enhancements.

## License

MIT 
