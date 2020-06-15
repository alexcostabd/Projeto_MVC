<?php
    function __autoload($class_name)
    {
        include_once 'helpers/class.' . $class_name . '.mvc.php';
    }
?>