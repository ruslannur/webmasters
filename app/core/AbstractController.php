<?php

abstract class AbstractController
{
	public function model($model)
	{
		return Model::getModel($model);		
	}
	
	public abstract function view($viewfile, $data = array(), $layout);
	
}