@extends('core::Public/Base')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>{{ $page->title }}</h2>
      <p><small>Posted on {{ $page->created_at }}
        @if ($page->updated_at != '0000-00-00 00:00:00')
        (last updated at {{ $page->updated_at }})
        @endif
      </small></p>
      <blockquote>{{ $page->excerpt }}</blockquote>
      {!! $page->content !!}
    </div>
  </div>
</div>
@stop