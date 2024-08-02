<section class="intro-section mb-3">
    <div class="home-slider slide-animate owl-carousel owl-theme"
        data-owl-options="{
                    'nav': false,
                    'responsive': {
                        '1440': {
                            'nav': true
                        }
                    }
                }">
                @foreach ($listTop3 as $item)
        <div class="home-slide home-slide-1 banner">
            <img class="slide-bg" src="{{ Storage::url($item->image) }}" alt="slider image"
                width="100" height="575">

            <div class="banner-layer banner-layer-middle banner-layer-left">
                <div class="container-fluid">
                    <div class="appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                        <h2 class="font-weight-light ls-10 text-primary">Discover our Arrivals!</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>View
                                our
                                Dresses</i><i class="icon-right-open-big"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="home-slide home-slide-2 banner">
            <img class="slide-bg" src="{{ asset('images/demoes/demo23/slider/slide-2.jpg') }}" alt="slider image"
                width="1200" height="575">

            <div class="banner-layer banner-layer-middle banner-layer-right w-100">
                <div class="container-fluid">
                    <div class="col-6 offset-6 appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="200">
                        <h2 class="font-weight-light ls-10 text-primary">Trendy Collections!</h2>
                        <a href="demo23-shop.html" class="btn btn-link"><i>View
                                our
                                Specials</i><i class="icon-right-open-big"></i></a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
