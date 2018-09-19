<?php

namespace project\controllers;

if(!defined('PROJECT_ACCESS'))exit('ACCESS DENIED');


class Controller
{
	private $_variables;
    
    public function __construct()
	{
		$this->_variables = array();
	}
/*=====================================================================================*/    
    public function loadHelper($titleHelper)
	{
		$pathCoreHelper = 'core/helpers/'.$titleHelper.'.php';
		$pathAppHelper = 'application/helpers/'.$titleHelper.'.php';
        
        if(file_exists($pathCoreHelper))
        {
            require_once($pathCoreHelper);
            return true;
        }
        elseif(file_exists($pathAppHelper))
        {
            require_once($pathAppHelper);
            return true;
        }
        
        return false;
	}
/*=====================================================================================*/    
    public function loadModel($titleModel, $aliasModel)
	{
		$titleModule = $this->titleModule();
        
        $pathModel = '';
        
        if($titleModule !== false)
        {
            $pathModel = 'application/modules/'.$titleModule.'/models/'.$titleModel.'.php';
            $titleModelInst = '\\project\\'.$titleModule.'\\models\\'.$titleModel;
            if(file_exists($pathModel))
            {
                require_once($pathModel);
                
                $this->$aliasModel = new $titleModelInst();
                return true;
            }
        }
                
        $pathModel = 'application/models/'.$titleModel.'.php';
        $titleModelInst = '\\project\\models\\'.$titleModel;
        if(file_exists($pathModel))
        {
            require_once($pathModel);
            
            $this->$aliasModel = new $titleModelInst();
            return true;
        }
        
        return false;
	}
/*=====================================================================================*/    
    public function loadLibrary($titleLibrary, $aliasLibrary)
	{
		$pathCoreLibrary = 'core/libraries/'.$titleLibrary.'.php';
		$pathAppLibrary = 'application/libraries/'.$titleLibrary.'.php';
        
        if(file_exists($pathCoreLibrary))
        {
            require_once($pathCoreLibrary);
            $titleLibrary = '\\project\\libraries\\'.$titleLibrary.'.php';
            $aliasLibrary = new $titleLibrary();
            return true;
        }
        elseif(file_exists($pathAppLibrary))
        {
            require_once($pathAppLibrary);
            $titleLibrary = '\\project\\libraries\\'.$titleLibrary.'.php';
            $aliasLibrary = new $titleLibrary();
            return true;
        }
        
        return false;
	}
/*=====================================================================================*/    
	public function data($titleVariable, $valueVariable)
	{
		$this->_variables[] = array(
            'title' => $titleVariable,
            'value' => $valueVariable,
        );
	}
/*=====================================================================================*/    
    public function display($titleView)
	{
		$titleModule = $this->titleModule();
        
        for($i=0; $i<count($this->_variables); $i++)
        {
            ${$this->_variables[$i]['title']} = $this->_variables[$i]['value'];
        }
        
        if($titleModule !== false)
        {
            $pathView = 'application/modules/'.$titleModule.'/views/'.$titleView.'.php';
            if(file_exists($pathView))
            {
                require_once($pathView);
                return true;
            }
        }
        
        $pathView = 'application/views/'.$titleView.'.php';
        if(file_exists($pathView))
        {
            require_once($pathView);
            return true;
        }
        
        return false;
	}
/*=====================================================================================*/    
    public function titleModule()
	{
		return false;
	}
}

?>