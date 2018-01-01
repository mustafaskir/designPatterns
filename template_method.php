<?php

/**
 * We use this pattern in case dublicate classes with unique data
 * so Turke & Veggie Classes has many same methods execpt AddTurker & AddVeggie
 * we use template pattern to duplicate same method in duplicate class ,i name it Sub
 * it has an abstract method which will be unique for each class can put unique data :)
 */
require_once './Templat_Method_Pattern/sub.php';
require_once './Templat_Method_Pattern/TurkeySub.php';
require_once './Templat_Method_Pattern/veggieSub.php';

(new TurkeySub())->make();