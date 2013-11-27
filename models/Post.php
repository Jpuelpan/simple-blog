<?php

/**
 * Esquema de la tabla posts
 *
 * id             :integer        not null, primary key
 * title          :varchar(255)   not null
 * body           :text           not null
 * status         :varchar(255)   not null
 * permalink      :varchar(600)   not null, unique
 * user_id        :integer        not null
 * category_id    :integer        not null
 * created_at     :datetime       not null
 * updated_at     :datetime       not null
 * 
 */
class Post extends Illuminate\Database\Eloquent\Model
{
  public function user()
  {
    return $this->belongsTo('User');
  }

  public function category()
  {
    return $this->belongsTo('Category');
  }

  public function comments()
  {
    return $this->hasMany('Comment');
  }
}

?>