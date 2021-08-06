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
      <a href="{{ get_permalink() }}" class="article col-sm-6 col-md-10 offset-md-2 d-md-flex justify-content-between">
        <div class="flecha d-none d-md-block flex-grow-1 flex-shrink-1">
          <i class="fal fa-arrow-right"></i>
        </div>

        <div class="thumb order-md-2 flex-grow-0 flex-shrink-0">
          @if (has_post_thumbnail())
            @thumbnail('large')
          @endif
        </div>

        <div class="cont pr-md-4">
          <h2 class="entry-title my-3">@title</h2>
          @if (has_excerpt())
            <div class="entry-summary">
              @excerpt
            </div>
          @endif
        </div>
      </a>
    @endposts
  </div>
  @include('partials.loader')
</div>



<nav class="nav-links">
  <div class="next-link">
    {!! next_posts_link( 'Older Entries', $query->max_num_pages ) !!}
  </div>
  <div class="previous-link">
    {!! previous_posts_link( 'Newer Entries' )!!}
  </div>
</nav>

@endsection
