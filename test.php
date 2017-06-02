
<?php

    $a1 = array(
        "name"=>"Alex",
        array(
            "street"=>"Solnechnaya",
            "house"=>10,"flat"=>6
        )
    );

    $a2 = &$a1;
    $a2["name"] = "Dima";

    var_dump($a1);