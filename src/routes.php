<?php

Route::resource('tag', 'SimpleCms\Tag\PublicController', ['only' => ['index', 'show']]);

Route::group(['prefix' => 'control'], function()
{
  Route::resource('tag', 'SimpleCms\Tag\AdminController');
});