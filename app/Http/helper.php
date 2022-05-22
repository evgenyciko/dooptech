<?php

function makeImageFromName($name){
    $userImage = '';
    $sortName = '';

    $names = explode(' ',$name);

    foreach ($names as $w) {
      $sortName .= $w[0];
    }

    $userImage = '<div class="name-image bg-primary">'.$sortName.'</div>';
    return $userImage;
}
