<?php

class Controller_Page extends Controller {

    public function action_home()
    {
        $this->response->body('home!');
    }

}

?>