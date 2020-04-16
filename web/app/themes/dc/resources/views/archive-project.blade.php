@extends('layouts.app')

@section('content')
  @include('partials.page-header')

<div id="accordionProjects" class="accordion infinite-scroll-container">
  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile
</div>

@include('partials.loader')

  {!! get_the_posts_navigation() !!}
@endsection
