<?php

class Controller_Page extends Controller_Template  {


    public function action_home()
    {
	    $this->template->content = View::factory('pages/home')
	    	->bind('u', $u);
    }

}

?>