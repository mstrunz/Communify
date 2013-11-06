<?php
class Request{
    private $get_parameter;
    private $post_parameter;
    
    
    public function setGetParameters($get_parameter)
    {
        $this->get_parameter = $get_parameter;
    }
    public function getGetParameters()
    {
        return $this->get_parameter;
    }
    public function setPostParameters($post_parameter)
    {
        $this->post_parameter = $post_parameter;
    }
    public function getPostParameters()
    {
        return $this->post_parameter;
    }
    
    public function getParameter($parameter_name)
    {
        $parameters = array_merge($this->getGetParameters(),$this->getPostParameters());
        return $parameters[$parameter_name];
    }
    public function getGetParameter($parameter_name)
    {
        return $this->get_parameter[$parameter_name];   
    }
    public function getPostParameter($parameter_name)
    {
        return $this->post_parameter[$parameter_name];   
    }
    
    
}

?>