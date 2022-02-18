<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    private $name;
    private $email;
    private $img_url;
    private $password;

    protected $fillable = [
        'name',
        'email',
        'password',
        'github_id',
        'auth_type',
        'img_url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setUser(string $name, string $email, string $path)
    {
        $this->setName($name);
        if(!$this->setEmail($email)){
            return false;
        }
        $this->setImg_url($path);
        return true;
    }


    public function getFirstUser()
    {
        $first = User::first();
        return $first;
    }


    /**
     * Get the attributes that are mass assignable.
     *
     * @return  string[]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the attributes that are mass assignable.
     *
     * @param  string[]  $name  The attributes that are mass assignable.
     *
     * @return  self
     */
    private function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    private function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    private function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of img_url
     */
    public function getImg_url()
    {
        return $this->img_url;
    }

    /**
     * Set the value of img_url
     *
     * @return  self
     */
    private function setImg_url($img_url)
    {
        $this->img_url = $img_url;

        return $this;
    }
}
