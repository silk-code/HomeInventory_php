<?php
  $name = "DropMenu";
  $dep_files = array(

  );
  $includeAutoFunction = true;
  $requireObjJS = true;
  $hasCSS = true;

/******************************************************************************/

  $before = 'if(typeof($add)=="undefined")var $add={version:{},auto:{disabled:false}};';
  $after = '$(function(){for(var k in $add.auto){if(typeof($add.auto[k])=="function"){$add.auto[k]();}}});';
  if(!$includeAutoFunction){
    $after = "";
  }

  $partial_file = "src/partials/_Add{$name}.js";
  $partial_min_file = "src/partials/_Add{$name}.min.js";
  $src_file = "src/Add{$name}.js";
  $dist_file = "dist/Add{$name}.js";
  echo "Loading parital file from \"{$partial_file}\"\r\n";
  $partial = file_get_contents($partial_file);
  echo "Buliding source\r\n";
  $src = $before.$partial.$after;
  echo "Writing src file to \"{$src_file}\"\r\n";
  file_put_contents($src_file, $src);
  echo "Loading minified partial file from \"{$partial_min_file}\"\r\n";
  $partial_min = file_get_contents($partial_min_file);
  $deps = [];
  if(count($dep_files) > 0){
    echo "Loading dependencies\r\n";
    for($i=0; $i<count($dep_files); $i++){
      echo "Loading \"{$dep_files[$i]}\"\r\n";
      array_push($deps, file_get_contents($dep_files[$i]));
    }
  }
  if($requireObjJS){
    echo "Loading \"res/Obj.js\"\r\n";
    $objjs = file_get_contents("res/Obj.js");
  }
  echo "Building distribution\r\n";
  $dist = "";
  if($requireObjJS){
    $dist = $objjs;
  }
  $dist .= $before.implode("", $deps).$partial_min.$after;
  echo "Writing distirbution to \"$dist_file\"\r\n";
  file_put_contents($dist_file, $dist);
  if($hasCSS){
    echo "Moving CSS distribution file. \"src/Add{$name}.min.css\" to \"dist/Add{$name}.css\"\r\n";
    rename("src/Add{$name}.min.css", "dist/Add{$name}.css");
  }
  echo "Build Finished";
?>
