<?php
class Controller_Template extends Kohana_Controller_Template {

    public $template = "templates/default"; 

    public function before()
    {
        parent::before();

        // Configurations : Session, Auth, ...
    }
}
?>