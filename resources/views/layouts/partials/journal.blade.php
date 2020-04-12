<!-- start section journal -->
<div id="journal" class="text-left paddsection">

  <div class="container">
    <div class="section-title text-center">
      <h2>journal</h2>
    </div>
  </div>

  <div class="container">
    <div class="journal-block">
      <div class="row">

        @foreach ($list_article as $item)
        <div class="col-lg-4 col-md-6">
          <div class="journal-info">

            <a href="blog-single.html"><img src="{{ asset('folio/images/blog-post-1.jpg') }}" class="img-responsive" alt="img"></a>

            <div class="journal-txt">

              <h4><a href="blog-single.html">{{ $item->title }}</a></h4>
              <p class="separator">{{ $item->excerpt }}</p>

            </div>

          </div>
        </div>
        @endforeach

        {{-- <div class="col-lg-4 col-md-6">
          <div class="journal-info">

            <a href="blog-single.html"><img src="{{ asset('folio/images/blog-post-2.jpg') }}" class="img-responsive" alt="img"></a>

            <div class="journal-txt">

              <h4><a href="#blog-single.html">WE'RE GONA MAKE DREAMS COMES</a></h4>
              <p class="separator">To an English person, it will seem like simplified English
              </p>

            </div>

          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="journal-info">

            <a href="blog-single.html"><img src="{{ asset('folio/images/blog-post-3.jpg') }}" class="img-responsive" alt="img"></a>

            <div class="journal-txt">

              <h4><a href="blog-single.html">NEW LIFE CIVILIZATIONS TO BOLDLY</a></h4>
              <p class="separator">To an English person, it will seem like simplified English
              </p>

            </div>

          </div>
        </div> --}}

      </div>
    </div>
  </div>

</div>
<!-- End section journal -->
