<?php
class PageTemplate
{
	private $page_title;
	private $page_name;
	private $page_id;
	private $request;
	
	
	public function setRequest($request)
	{
	    $this->request = $request;
	}
	/**
	 * 
	 * Enter description here ...
	 * @return Request
	 */
	public function getRequest()
	{
	    return $this->request;
	}
	public function setPageId($page_id)
	{
	    $this->page_id = $page_id;
	}
	public function getPageId()
	{
	    return $this->page_id;
	}
	
	protected function setPageTitle($page_title)
	{
		$this->page_title = $page_title;
	}
	public function getPageName()
	{
	    return $this->page_name;    
	}
	public function setPageName($page_name)
	{
	    $this->page_name = $page_name;    
	}
	
	
    public function renderPage()
	{
		$page_id = $this->getPageId();
		$page_name = $this->getPageName();
		$sub = Core::String2UpperCase(Core::getGetParameter("sub"));
		
	    if ($sub!="")
		{
		    include_once '../pages/'.$page_name.'/lib/'.$sub.'Html.php';     
		}
		else 
		{
		    include_once '../pages/'.$page_name.'/lib/'.$page_name.'Html.php';        
		}
		
		//return $this->page_object->render($parameters = array_merge(CORE::getGetParameters(),CORE::getPostParameters()));
		
		//return "404 Page not found!";
	}
	
}