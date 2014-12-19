<?php namespace SimpleCms\Tag;

use SimpleCms\Core\BaseModel;

class Page extends BaseModel {

  protected $fillable = [
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

}