<?php

/**
 * Esquema de la tabla comments
 *
 * id             :integer        not null, primary key
 * name           :varchar(255)   not null
 * email          :varchar(255)   not null
 * body           :text           not null
 * post_id        :integer        not null
 * created_at     :datetime       not null
 * updated_at     :datetime       not null
 * 
 */
class Comment extends Illuminate\Database\Eloquent\Model
{
  public function post()
  {
    return $this->belongsTo('Post');
  }
}

?>