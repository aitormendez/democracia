@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="container-fluid">
      <div class="row">
        <div class="caja alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      </div>
    </div>
  @endif

  <div class="infinite-scroll-container py-4">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile
  </div>

  <div class="container-fluid">
    @include('partials.loader')
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
