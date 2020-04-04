@extends('layouts.app')

@section('content')

<section class="hero d-flex">
@if ($hero_tipo == 'video')
  <div class="plyr__video-embed w-100" id="player">
    <iframe
        src="https://player.vimeo.com/video/@option('hero_video')?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=1&amp;gesture=media&amp;autoplay=true"
        allowfullscreen
        allowtransparency
        allow="autoplay"
    ></iframe>
  </div>
@endif
</section>

@endsection
