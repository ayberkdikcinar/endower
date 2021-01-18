<?php

if(!function_exists('GetImageUrl')){
  function GetImageUrl($image, $name=-1){

    if($name==-1)
      $name=rand(100000,999999);

    $extension=$image->getClientOriginalExtension();

    $imagename="$name.$extension";

    $image->move(public_path('uploads'), $imagename);
    
    return 'uploads/'.$imagename;
  }
}


if(!function_exists('LikeBuilder')){
  function likeBuilder($query, $attr, $val) {
    return $query->orWhere($attr, 'LIKE', '%'.$val.'%');
  }
}

?>