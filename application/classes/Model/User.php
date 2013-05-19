<?php
class Model_User extends Model_Auth_User {
	/**
	 * Règles par défaut du modèle supprimées
	 */
	public function rules()
	{
	    return array();
	}

    public static function get_users()
    {
        return ORM::factory('user')->find_all();
    }

	/**
	 * Actions qui terminent la connexion d'un membre
	 *
	 * @return void
	 */
	public function complete_login()
	{
	    if ($this->_loaded)
	    {
	        // Actions
	    }
	}
	public function register($post)
	{
	    $this->username     = $post['username'];
	    $this->password     = $post['password'];
	    $this->email        = $post['email'];
	    $this->save();
	}
}
?>