<?php
class PageController{

	private $current_page;
	private $pages1 = array( 1002 => "Login"
							,1 => "MyWork"
							,2 => "IdeaContribution"
							,3 => "CareerGoals"
							,4 => "Rewards"
							,5 => "MyAccount"
							,1000 => "Register"
							,1001 => "AboutCommunify"
							,2000 => "PageNotFound");
	
	private $page_object;
    private $pages;
    private $request;
	
	public function __construct()
	{
	    foreach ($this->pages1 as $page_id => $page_name)
	    {
	        $page = new Page();
	        $page->setId($page_id);
	        $page->setName($page_name); 
	        $this->pages[$page_id] = $page;       
	    } 
	}
	
	public function setCurrentPageId($page_id)
	{
		if (array_key_exists($page_id, $this->pages))
		{
			$this->current_page = $this->pages[$page_id];
		}
		else
		{
			$this->current_page = $this->pages[2000];	
		}
	}
	/**
	 * @return Page
	 */
	public function getCurrentPage()
	{
		return $this->current_page;
	}
	
	public function executeActions()
	{
		$page_id = $this->getCurrentPage()->getId();
		if (key_exists($page_id, $this->pages))
		{
			$page_name = $this->pages[$page_id]->getName();
			
			include_once '../pages/'.$page_name.'/'.$page_name.'.php';
			
			$this->page_object = new $page_name;
			$this->page_object->setPageId($page_id);
			$this->page_object->setPageName($page_name);
			
			$this->request = new Request();
			$this->request->setGetParameters(Core::getGetParameters());
			$this->request->setPostParameters(Core::getPostParameters());
			$this->page_object->setRequest($this->request);
			
			if (Core::getGetParameter("action"))
			{
				$method = Core::getGetParameter("action");
				$method = "execute".Core::String2UpperCase($method);
				if (method_exists($this->page_object,$method))
				{
					$parameters = array_merge(CORE::getGetParameters(),CORE::getPostParameters());
					$this->page_object->$method($parameters);	
				}
				else 
				{
					return "Action not found!";	
				}
			}
			else
			{
				if (method_exists($this->page_object,"executeDefault"))
				{	
					$this->page_object->executeDefault($parameters);	
				}
			}	
		}
	}
	
	public function renderPage()
	{
	    $page_id = $this->getCurrentPage()->getId();
	    if (key_exists($page_id, $this->pages))
	    {
	        $this->page_object->renderPage();
	    }    
	}
}