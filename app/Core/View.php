<?php 



class View 
{

    public static function load($view_name, $view_data = [])
    {
        $file = VIEWS.$view_name.'.php';
        if(file_exists($file))
        {
            extract($view_data); // extract the data to be used in the view

            ob_start();
                extract($view_data);
                require_once($file);
            ob_end_flush();
        }
        else 
        {
            echo "this file : " .view_name ."dose not exist ";
        }
    }
}