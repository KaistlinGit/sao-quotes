<?php
class Controller_User extends Controller_Template {

    public function action_index()
    {
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
	    $post = Validation::factory($_POST)
	        ->rule('username', 'not_empty')
	        ->rule('password', 'not_empty');


	    if ($_POST AND $post->check())
	    {
	        if (Auth::instance()->login($post['username'], $post['password']) === TRUE)
	        {
	            $user = Auth::instance()->get_user();

	            // Actions

	            // Redirection
	            HTTP::redirect('user/index');
	        }
	    }

	    $this->template->content = View::factory('users/login')
	        ->bind('values', $_POST);
	}
    public function action_register() {
        $user = ORM::factory('user');

        $post = Validation::factory($_POST)
            ->rule('username', 'not_empty')
            ->rule('username', 'Valid::alpha_dash')
            ->rule('username', array($user, 'unique'), array('username', ':value'))
            ->rule('password', 'not_empty')
            ->rule('password_again', 'matches', array(':validation', ':field', 'password'))
            ->rule('email', 'Valid::email')
            ->rule('email', array($user, 'unique'), array('email', ':value'));

        $_POST['username']="test";
        $_POST['email']="test@mail.com";

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