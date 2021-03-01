<!-- start section portfolio -->
<div id="portfolio" class="text-left paddsection">

  <div class="container">
    <div class="section-title text-center">
      <h2>Portfolio</h2>
    </div>
  </div>

  <div class="container">
    <div class="journal-block">
      <div class="row">

        @foreach ($projects as $item)
        <div class="col-lg-4 col-md-6">
          <div class="journal-info">
            <div class="journal-txt">
              <h4>{{ $item->title }}</h4>
              <p class="separator">{!! $item->description !!}</p>
            </div>

          </div>
        </div>
        @endforeach
         
      </div>
    </div>
  </div>

</div>
<!-- End section journal -->
