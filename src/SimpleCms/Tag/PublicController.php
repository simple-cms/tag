<?php namespace SimpleCms\Tag;

use SimpleCms\Core\BaseController;
use View;

class PublicController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var Simple\tag\RepositoryInterface
   */
  protected $tag;

  /**
   * Set up the class
   *
   * @param Simple\tag\RepositoryInterface $posts
   *
   * @return void
   */
  public function __construct(RepositoryInterface $tag)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->tag = $tag;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return View::make('tag::Public/Show', [
      'metaTitle' => 'slug tag title',
      'metaDesciption' => 'slug tag description',
      'tag' => $this->tag->getFirstBy('slug', $slug)
    ]);
  }

}