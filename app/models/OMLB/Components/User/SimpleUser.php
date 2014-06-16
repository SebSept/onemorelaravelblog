<?php
/**
 * User (admin)
 * 
 * @licence MIT  http://choosealicense.com/licenses/mit/
 * @author sebastienmonterisi@yahoo.fr
 * @package onemorelaravelblog
 */

namespace OMLB\Components\User;

use Illuminate\Auth\UserInterface;

/**
 * SimpleUser
 */
class SimpleUser implements UserInterface
{

    /**
     * User password, hashed
     * @var string 
     */
    private $password;

    /**
     * User id / user name
     * @var string 
     */
    private $id;

    public function __construct()
    {
        $this->password = \Config::get('blog.password');
        $this->id = \Config::get('blog.user');
        
        if($this->password == '') {
            throw new Exception('Admin password not set');
        }
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        
    }

    public function getRememberTokenName()
    {
        return null;
    }

}
