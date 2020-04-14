<div class="row py-3">
  <div class="col-12 page-load-status d-flex justify-content-center">
    <div class="infinite-scroll-request">
      <p>{{ __('Loading', 'sage') }}</p>
    </div>
    <p class="infinite-scroll-last">{{ __('End of content', 'sage') }}</p>
    <p class="infinite-scroll-error">{{ __('There is no more pages to load', 'sage') }}</p>
  </div>

  <div class="col-12 button-container d-none d-flex justify-content-center">
    <button class="view-more-button boton">{{ __('Load more', 'sage') }}</button>
  </div>
</div>
