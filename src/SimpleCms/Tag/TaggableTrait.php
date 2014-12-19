<?php namespace SimpleCmms\Tag;

trait TaggableTrait {

  public function media()
  {
    return $this->morphToMany('Wfuk\Media\Models\Media', 'media_attachment')->withPivot('rank')->orderBy('rank', 'asc')->withTimestamps();
  }

}