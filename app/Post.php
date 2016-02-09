<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $dates = ['published_at'];
  protected $fillable = ['slug', 'title', 'content', 'published_at'];

  /**
   * set the title attribute and slugify it
   * @param string $value
   * @return void
   */
  public function setTitleAttribute($value)
  {
    $this->attributes['title'] = $value;

    if (!$this->exists) {
      $this->attributes['slug'] = str_slug($value);
    }
  }
}
