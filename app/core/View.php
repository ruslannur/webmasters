<?php

class View 
{
    public $viewsPath = 'app/views/';
    
    public function __construct($viewsPath = null)
    {
        if (!is_null($viewsPath))
            $this->viewsPath = $viewsPath;
    }    

    public function render($viewPath, $vars = array())
    {   
        extract($vars);
        ob_start(null, 0, PHP_OUTPUT_HANDLER_REMOVABLE);
        //ob_start(null, 0, PHP_OUTPUT_HANDLER_STDFLAGS);
        include $this->viewsPath . $viewPath. '.php';
        $txt = ob_get_clean();
        return $txt;
    }     

    public function renderLayout($layout, $vars = array())
    {
        extract($vars);
        ob_start(null, 0, false);
        include $this->viewsPath . $layout. '.php';
        ob_get_clean();
    }

}
