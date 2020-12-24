# Add Drop Menu Advanced Usage

## JavaScript
You can turn any `<div>` containing links into a Drop Menu using JavaScript by calling the `$add.DropMenu` method.

The method takes two arguments, the first is the selector for the element you will be creating the drop menu from, the second argument is an object with it's settings.

**HTML**
```html
  <div id='myMenu'>
    <a href='link-location-1'>Link 1</a>
    <a href='link-location-2'>Link 2</a>
    <a href='link-location-3'>Link 3</a>
  </div>
```

**JavaScript** (after DOM ready)
```javascript
$add.DropMenu("#myMenu", {
  label: "Menu",
  width: 250,
  cover: true
})
```

## jQuery
You can turn any `<div>` containing links into a Drop Menu using jQuery by calling the `addDropMenu` jQuery plugin method.

Select the element you will be creating the drop menu from. The only argument is an object with it's settings.

**HTML**

```html
  <div id='myMenu'>
    <a href='link-location-1'>Link 1</a>
    <a href='link-location-2'>Link 2</a>
    <a href='link-location-3'>Link 3</a>
  </div>
```

**jQuery** (after DOM ready)

```javascript
$("#myMenu").addDropMenu({
  label: "Menu",
  width: 250,
  cover: true
})
```

## Obj.JS
If you are familiar with the [**Obj.JS**  framework](https://github.com/addui/ObjJS), a prototype has been created at `$add.DropMenu.obj` which you can instantiate.
It takes 3 arguments, the first is the "label", the second is a jQuery object containing the menu items (links) and the third is the settings object.

**Obj.JS**

```javascript
  var $links = $();
  $links = $links.add("<a href='link-location-1'>Link 1</a>");
  $links = $links.add("<a href='link-location-2'>Link 2</a>");
  $links = $links.add("<a href='link-location-3'>Link 3</a>");
  var myDropMenu = new $add.DropMenu.obj("Menu Label", $links, {
    width: 250,
    cover: true
  });
  myDropMenu.render("body");
```

## Styling

The CSS of this plugin is compiled from Sass (scss). If you wish to customize the style of the plugin you can choose to write your own styles that overwrite the styles of the plugin using `!important` tags, or you can modify the sass and recompile, you should modify the partial located at `src/partials/_addDropMenu.scss`.


## Themes
You can easily change the theme from "light" to "dark by uncommenting line 3 of `src/addDropMenu.scss` and recompiling the sass.
