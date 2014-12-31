@extends('core::Admin/Base')

@section('content')
<aside class="right-side">
  <section class="content-header">
    <h1>
      {{ Lang::get('tag::tag.plural') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ Lang::get('core::core.dashboard') }}</a></li>
      <li><a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('tag::tagURL') .'.index') }}">{{ Lang::get('tag::tag.plural') }}</a></li>
      <li class="active">{{ Lang::get('tag::tag.singular') }} {{ Lang::get('core::core.list') }}</li>
    </ol>
  </section>

  <section class="content">

    @include('core::Admin/Partials/FlashMessages')

    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li><a href="#help" data-toggle="tab">{{ Lang::get('core::core.help') }}</a></li>
            <li class="active"><a href="#basic" data-toggle="tab">{{ Lang::get('tag::tag.plural') }}</a></li>
            <li class="pull-left header"><i class="fa fa-tags"></i> {{ Lang::get('tag::tag.singular') }} {{ Lang::get('core::core.list') }}</li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              {{ Lang::get('core::core.actions') }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route(Config::get('core::adminURL') .'.'. Config::get('tag::tagURL') .'.create') }}"><i class="fa fa-pencil-square-o"></i> {{ Lang::get('core::core.create') }} {{ Lang::get('tag::tag.singular') }}</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="basic">
              <table id="tags" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>{{ Lang::get('core::core.title') }}</th>
                    <th>{{ Lang::get('tag::tag.parent') }}</th>
                    <th>{{ Lang::get('core::core.status') }}</th>
                    <th>{{ Lang::get('core::core.updated') }}</th>
                    <th>{{ Lang::get('core::core.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($tags))
                  @foreach($tags as $tag)
                  <tr>
                    <td><a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('tag::tagURL') .'.edit', [$tag->id]) }}">{{ $tag->title }}</a></td>
                    @if($tag->parent)
                    <td><a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('tag::tagURL') .'.edit', [$tag->parent->id]) }}">{{ $tag->parent->title }}</a></td>
                    @else
                    <td>{{ Lang::get('core::core.none') }}</td>
                    @endif
                    @if($tag->hidden == 1)
                    <td><span class="badge bg-red">{{ Lang::get('core::core.hidden') }}</span></td>
                    @else
                    <td><span class="badge bg-green">{{ Lang::get('core::core.visible') }}</span></td>
                    @endif
                    <td>{{ $tag->updated_at->diffForHumans() }}</td>
                    <td>
                    {!! Form::open(['route' => [Config::get('core::adminURL') .'.'. Config::get('tag::tagURL') .'.destroy', $tag->id], 'method' => 'delete', 'class' => '']) !!}
                      <div class="btn-group">
                        <a href="{{ route(Config::get('core::adminURL') .'.'. Config::get('tag::tagURL') .'.edit', [$tag->id]) }}" class="btn btn-info">{{ Lang::get('core::core.edit') }}</a>
                        <a href="{{ route('tag.show', [$tag->slug]) }}" class="btn btn-success" target="_blank">{{ Lang::get('core::core.preview') }}</a>
                        {!! Form::submit(Lang::get('core::core.destroy'), ['class' => 'btn btn-danger']) !!}
                      </div>
                    {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="4">{!! Lang::get('core::core.missing', ['model' => Lang::get('tag::tag.plural'), 'link' => link_to_route(Config::get('core::adminURL') .'.'. Config::get('tag::tagURL') .'.create', 'click here')]) !!}
                  </tr>
                @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th>{{ Lang::get('core::core.title') }}</th>
                    <th>{{ Lang::get('tag::tag.parent') }}</th>
                    <th>{{ Lang::get('core::core.status') }}</th>
                    <th>{{ Lang::get('core::core.updated') }}</th>
                    <th>{{ Lang::get('core::core.actions') }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="tab-pane" id="help">
              The European languages are members of the same family. Their separate existence is a myth.
              For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
              in their grammar, their pronunciation and their most common words. Everyone realizes why a
              new common language would be desirable: one could refuse to pay expensive translators. To
              achieve this, it would be necessary to have uniform grammar, pronunciation and more common
              words. If several languages coalesce, the grammar of the resulting language is more simple
              and regular than that of the individual languages.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</aside>
@stop