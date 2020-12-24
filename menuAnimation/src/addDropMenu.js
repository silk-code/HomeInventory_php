if(typeof($add)=="undefined")var $add={version:{},auto:{disabled:false}};(function($){
  $add.version.DropMenu = "1.0.2";
  $add.DropMenu = function(selector, settings){
    var objs = $(selector).map(function(i, el){
      var $el = $(el);
      var S = $.extend({}, $el.data(), settings);
      var obj = new $add.DropMenu.obj(S.label, $el.children(), S);
      obj.render($el, "replace");
      return obj;
    });
    return (objs.length==0)?null:(objs.length==1)?objs[0]:objs;
  };
  $add.DropMenu.obj = Obj.create(function(label, $items, settings){
    this.defSettings({
      pin: "top-left",
      cover: true,
      width: 150
    });
    this.defMember("label", '<i class="material-icons">&#xE5C5;</i>');
    this.defMember("$items", $());
    this.renderer = function(){
      var $dropMenu = $("<div class='addui-dropMenu'></div>");
      var $btn = $("<div class='addui-dropMenu-btn'>"+this._label+"</div>").appendTo($dropMenu);
      var $menu = $("<div class='addui-dropMenu-menu'></div>").appendTo($dropMenu);
      $menu.css("width", this._settings.width);
      this._$items.addClass("addui-dropMenu-item").appendTo($menu);
      $btn.on("click", function(e){
        var openedBefore = $menu.hasClass("addui-dropMenu-open");
        $menu.toggleClass("addui-dropMenu-open");
        if(!openedBefore){
          setTimeout(function(){
            $(window).one("click", function(){
              $menu.removeClass("addui-dropMenu-open");
            });
          }, 301);
        }
      });
      $dropMenu.addClass("addui-dropMenu-pin-"+this._settings.pin).addClass("addui-dropMenu-cover-"+this._settings.cover);
      return $dropMenu;
    };
    this.init = function(label, $items, settings){
      if(label)
        this.label = label;
      if($items)
        this.$items = $items;
      if(settings)
        this.settings = settings;
    };
    this.init.apply(this, arguments);
  });
  $.fn.addDropMenu = function(settings){
    $add.DropMenu(this, settings);
  };
  $add.auto.DropMenu = function(){
    if(!$add.auto.disabled){
      $("[data-addui=DropMenu], [data-addui=dropMenu], [data-addui=dropmenu]").addDropMenu();
    }
  }
})(jQuery);
$(function(){for(var k in $add.auto){if(typeof($add.auto[k])=="function"){$add.auto[k]();}}});