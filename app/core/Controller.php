<?php

class Controller extends AbstractController
{	
	public function view($viewfile, $data = array(), $layout)
	{	    
		$viewfile_header = 'header';
		
		$req_uri = $_SERVER['REQUEST_URI'];
		$current_uri = substr($req_uri, strlen(ROOT.'/'.Utils::siteLang()));
		//echo $current_uri;
		$data_header = array('current_uri'=>$current_uri);

		$view =  new View();			
		$head = $view->render($viewfile_header, $data_header);
		$body = $view->render($viewfile, $data);		

		$view->renderLayout($layout, array('body' => $body, 'head' => $head));
		
	}

	public function viewLayoutOff($viewfile, $data = array())
	{
		$view =  new View();		
		$body = $view->render($viewfile, $data);
		$view->renderLayout('empty', array('body' => $body));
	}	

}