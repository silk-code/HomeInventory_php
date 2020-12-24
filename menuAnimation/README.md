# AddDropMenu

> 1.0.2

A jQuery plugin to create a simple drop menu.

```html
<div data-addui='dropMenu'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

## How to Use
This is a jQuery plugin built on the [Obj.JS Framework](https://github.com/dustinpoissant/ObjJS). jQuery is not included in the distribution files (located in the `dist` directory), you must first import jQuery (any version) for this plugin to work.
**Obj.js** is included in the distribution, there is no need to include it separately. If you already have `Obj.js` imported you should import `addDropMenu.js` from the `src` which does not include `Obj.js`.

### Create a Drop Menu
Create a `<div>` and give it a `data-addui` attribute with a value of `"dropMenu"`. Put some links within the div that will be the menu items.

```html
<div data-addui='dropMenu'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

![](res/top-left.gif)

### Label
You can change the label on the button using the `data-label` attribute.
By default it is set to `<i class="material-icons">&#xE5C5;</i>`.

```html
<div data-addui='dropMenu' data-label='Menu'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

![](res/label.gif)

### Cover the button
You can decide whether or not you want the menu to cover the button when it is open using the `data-cover` attribute, it can be set to `"true"` or `"false"`, it is `"true"` by default.

```html
<div data-addui='dropMenu' data-cover='false'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

![](res/cover-false.gif)

### Pin position
The menu is "pinned" to the button, you can decide how the menu is pinned using the `data-pin` attribute. The options are:

#### top-left
By default the menu is pinned to the top left of the button.

```html
<div data-addui='dropMenu' data-pin='top-left'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

![](res/top-left.gif)

#### top-right
The menu can be set to open pinned to the `"top-right"` of the button.

```html
<div data-addui='dropMenu' data-pin='top-right'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

![](res/top-right.gif)


#### bottom-left
The menu can be set to open pinned to the `"bottom-left"` of the button.

```html
<div data-addui='dropMenu' data-pin='bottom-left'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

![](res/bottom-left.gif)

#### bottom-right
The menu can be set to open pinned to the `"bottom-right"` of the button.

```html
<div data-addui='dropMenu' data-pin='bottom-right'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```
![](res/bottom-right.gif)

### Width
You can change the width of the menu using the `data-width` attribute.
By default this is set to `"150"`.

```html
<div data-addui='dropMenu' data-width='250'>
  <a href='link-location-1'>Link 1</a>
  <a href='link-location-2'>Link 2</a>
  <a href='link-location-3'>Link 3</a>
</div>
```

![](res/width.gif)

### Advanced Usage
To learn more about how to use this plugin with `JavaScript`, `jQuery` or `Obj.JS` read the [Advanced uage guide](ADVANCED.md)

#License

This software is property of [**Dustin Poissant**](http://github.com/dustinpoissant).

This software is distributed AS-IS with no warranties/guarantees either expressed or implied.

This software is Licensed under [CC BY-NC-SA 3.0 US](https://creativecommons.org/licenses/by-nc-sa/3.0/us/).
