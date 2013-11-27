<?php

/**
 * Esquema de la tabla categories
 *
 * id             :integer        not null, primary key
 * name           :varchar(255)   not null
 * description    :text           not null
 * created_at     :datetime       not null
 * updated_at     :datetime       not null
 * 
 */
class Category extends Illuminate\Database\Eloquent\Model
{
  public function posts()
  {
    return $this->hasMany('Post');
  }
}

?>