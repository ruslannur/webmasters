<?php

class Model
{
	public function getModel($model)
	{
		require_once 'app/models/'.$model.'.php';
		return new $model;
	}
	
}