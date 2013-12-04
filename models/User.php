<?php

/**
 * Esquema de la tabla users
 *
 * id             :integer        not null, primary key
 * name           :varchar(255)   not null
 * last_name      :varchar(255)   not null
 * email          :varchar(255)   not null
 * password       :varchar(255)   not null
 * created_at     :datetime       not null
 * updated_at     :datetime       not null
 * 
 */
class User extends Illuminate\Database\Eloquent\Model
{
  public function posts()
  {
    return $this->hasMany('Post');
  }

  public function full_name()
  {
    return $this->name . ' ' . $this->last_name;
  }

  #
  # Static functions
  #
  public static function auth($email, $password)
  {
    return User::whereRaw('password = ? AND email = ?', array($password, $email))->first();
  }
}

?>