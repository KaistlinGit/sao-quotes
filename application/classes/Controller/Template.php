<?php
class Controller_Template extends Kohana_Controller_Template {

    public $template = "templates/default"; 

    public function before()
    {
        parent::before();

        // Configurations : Session, Auth, ...
    }

    public function authorize($status) 
    {
    	$user = Auth::instance()->get_user();
    	
    	if ($status == 'logged_in' AND ! $user) 
   		{
    		HTTP::redirect('user/login');
    	}
    	
    	if ($status == 'logged_out' AND $user) 
   		{
   			if(Request::detect_uri()!="/user/login"){
   				HTTP::redirect('user/login');
   			}
    	}
    	
    	/*if ($status == 'admin' AND $user AND $user->logged_in('admin') === FALSE)
    	{
    		$this->request->redirect('about#/changelog');
    	}*/
    }
}
?>