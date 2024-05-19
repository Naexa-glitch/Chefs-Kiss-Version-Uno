<?php

    namespace Medoo;
    require "Medoo.php";

    if(!isset($database)){

        $database = new Medoo([

            'type' => 'mysql',
            'host' => 'localhost',
            'data' => 'chefskiss',
            'username' => 'root',
            'password' => ''

        ]);

    }

>?