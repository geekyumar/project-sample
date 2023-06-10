<?php

function get_config($key)
{
    $cred = file_get_contents($_SERVER['DOCUMENT_ROOT'].'../config.json');
    $data = json_decode($cred, true);
    if(isset($data[$key]))
    {
        return $data[$key];
    }
}

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT']."/____templates/$name.html";
}

