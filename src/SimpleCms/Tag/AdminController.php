<?php namespace SimpleCms\Tag;

use SimpleCms\Core\BaseController;
use Input;
use Redirect;

class AdminController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var SimpleCms\Tag\RepositoryInterface
   */
  protected $page;

  /**
   * Set up the class
   *
   * @param SimpleCms\Tag\RepositoryInterface $tag
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
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('tag::Admin/Index', [
      'pages' => $this->tag->all(['parent'])
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('tag::Admin/Form', [
      'pages' => $this->tag->getSelectArray()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreateRequest $request)
  {
    $tag = $this->tag->store($request->all());

    return Redirect::route('control.tag.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully created '. $request->title .'!'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($id)
  {
    return view('tag::Admin/Form', [
      'tag' => $this->tag->getById($id),
      'pages' => $this->tag->getSelectArray()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update(UpdateRequest $request)
  {
    $tag = $this->tag->update($request->route->parameter('tag'), $request->all());

    return Redirect::route('control.tag.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully updated '. $request->title .'!'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return Response
   */
  public function destroy($id)
  {
    $tag = $this->tag->destroy($id);

    if ($tag)
    {
      return Redirect::route('control.tag.index')->with([
        'flash-type' => 'success',
        'flash-message' => 'Page successfully deleted!'
      ]);
    }

    return Redirect::route('control.tag.index')->with([
      'flash-type' => 'error',
      'flash-message' => 'Failed to delete tag!'
    ]);
  }

}