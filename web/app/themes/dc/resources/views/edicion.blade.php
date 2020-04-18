{{--
  Template Name: Edición
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile


@query([
  'post_type' => 'project',
  'posts_per_page' => 10,
  'paged' =>  get_query_var( 'paged' ),
  'tax_query' => [
    [
      'taxonomy' => 'project_format',
      'field'    => 'slug',
      'terms'    => ['edition', 'edicion'],
    ]
  ]
])

<div class="container-fluid">
  <div class="row infinite-scroll-container">
    @posts
      <a href="{{ get_permalink() }}" class="article col-sm-6 col-md-4 col-lg-3">
        @if (has_post_thumbnail())
          <div class="thumb">
            @thumbnail('large')
          </div>
        @endif
        <h2 class="entry-title my-3">@title</h2>
      </a>
    @endposts
  </div>
</div>

@include('partials.loader')

<nav class="nav-links">
  <div class="next-link">
    {!! next_posts_link( 'Older Entries', $query->max_num_pages ) !!}
  </div>
  <div class="previous-link">
    {!! previous_posts_link( 'Newer Entries' )!!}
  </div>
</nav>

@endsection
