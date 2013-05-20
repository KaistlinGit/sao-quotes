<?php
class Controller_User extends Controller_Template {

    public function action_index()
    {
        $this->authorize('logged_in');

        $users = Model_User::get_users();
        $this->template->content = View::factory('users/index')
            ->set('users', $users);
    }

	/**
	 * Vue connexion
	 * ACTION: connexion
	 */
	public function action_login() 
	{
        $this->authorize('logged_out');

	    $post = Validation::factory($_POST)
	        ->rule('username', 'not_empty')
	        ->rule('password', 'not_empty');

        /**
         * Action : Redirection vers la page d'inscription
         */
        if($_POST){
            if($_POST['submitForm']=="Inscription"){
                HTTP::redirect('user/register');
            } 
        }   

        $_POST['username']='';

	    if ($_POST AND $post->check())
	    {
	        if (Auth::instance()->login($post['username'], $post['password']) === TRUE){
	            $user = Auth::instance()->get_user();

	            // Actions
                //var_dump($user); 

	            // Redirection
	            HTTP::redirect('user/index');
	        }
            else {
                $error = 'Mauvais identifiants';
            }

	    }

	    $this->template->content = View::factory('users/login')
	        ->bind('values', $_POST)
            ->bind('error', $error);
	}

    /**
     * ACTION: déconnexion
     */
    public function action_logout() 
    {
        $this->authorize('logged_in');

        Auth::instance()->logout();

        HTTP::redirect('user/login');
    }


    /**
     * Vue enregistrement
     * ACTION: enregistrement
     */
    public function action_register() {
        $user = ORM::factory('user');

        /**
         * Action : Redirection vers la page d'inscription
         */
        if($_POST){
            if($_POST['submitForm']=='Se connecter'){
                HTTP::redirect('user/login');
            } 
        }  

        $post = Validation::factory($_POST)
            ->rule('username', 'not_empty')
            ->rule('username', 'Valid::alpha_dash')
            ->rule('username', array($user, 'unique'), array('username', ':value'))
            ->rule('password', 'not_empty')
            ->rule('password_again', 'matches', array(':validation', ':field', 'password'))
            ->rule('email', 'Valid::email')
            ->rule('email', array($user, 'unique'), array('email', ':value'));

        $_POST['username']='';
        $_POST['email']='';

        if ($_POST AND $post->check())
        {
            $user->register($post);

            Auth::instance()->login($post['username'], $post['password']);

            HTTP::redirect('user/index');
        }

        $errors = $post->errors('user');

        $this->template->content = View::factory('users/register')
            ->bind('post', $post)
            ->bind('values', $_POST)
            ->bind('errors', $errors);
    }
}
?>