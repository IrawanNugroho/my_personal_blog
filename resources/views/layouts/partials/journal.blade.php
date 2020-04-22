<!-- start section journal -->
<div id="journal" class="text-left paddsection">

  <div class="container">
    <div class="section-title text-center">
      <h2>coming soon</h2>
    </div>
  </div>

  <div class="container">
    <div class="journal-block">
      <div class="row">

        @foreach ($list_article as $item)
        <div class="col-lg-4 col-md-6">
          <div class="journal-info">

          <a href="{{ route('frontend.show', $item->slug) }}"><img src="{{ asset('folio/images/blog-post-1.jpg') }}" class="img-responsive" alt="img"></a>

            <div class="journal-txt">

              <h4><a href="{{ route('frontend.show', $item->slug) }}">{{ $item->title }}</a></h4>
              <p class="separator">{{ $item->excerpt }}</p>

            </div>

          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</div>
<!-- End section journal -->
