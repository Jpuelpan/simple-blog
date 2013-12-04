<?php

/**
 * Esquema de la tabla posts
 *
 * id             :integer        not null, primary key
 * title          :varchar(255)   not null
 * body           :text           not null
 * status         :varchar(255)   not null
 * user_id        :integer        not null
 * category_id    :integer        not null
 * created_at     :datetime       not null
 * updated_at     :datetime       not null
 * 
 */
class Post extends Illuminate\Database\Eloquent\Model
{
  #
  # Mass assignment fields
  #
  protected $fillable = array('title', 'body', 'status', 'category_id');

  #
  # Relations
  #
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

  # 
  # Scopes
  # 
  public function scopePublished($query)
  {
    return $query->where('status', 'Publicado');
  }

  public function scopeDraft($query)
  {
    return $query->where('status', 'Borrador');
  }

  public function scopeLatest($query)
  {
    return $query->orderBy('created_at', 'DESC');
  }
}

?>