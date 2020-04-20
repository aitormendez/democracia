<div class="row py-3 bg-b">
  <div class="col-12 page-load-status d-flex justify-content-center">
    <div class="infinite-scroll-request" style="display: none">
      <p>{{ __('Loading', 'sage') }}</p>
    </div>
    <p class="infinite-scroll-last" style="display: none">{{ __('End of content', 'sage') }}</p>
    <p class="infinite-scroll-error" style="display: none">{{ __('There is no more pages to load', 'sage') }}</p>
  </div>

  <div class="col-12 button-container d-none justify-content-center">
    <button class="view-more-button boton">{{ __('Load more', 'sage') }}</button>
  </div>
</div>
