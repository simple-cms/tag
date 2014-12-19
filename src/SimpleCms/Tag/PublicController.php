<?php namespace SimpleCms\Tag;

use SimpleCms\Core\BaseController;
use View;

class PublicController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var Simple\Page\RepositoryInterface
   */
  protected $page;

  /**
   * Set up the class
   *
   * @param Simple\Page\RepositoryInterface $posts
   *
   * @return void
   */
  public function __construct(RepositoryInterface $page)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->page = $page;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return View::make('page::Public/Show', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'page' => $this->page->getFirstBy('slug', $slug)
    ]);
  }

}