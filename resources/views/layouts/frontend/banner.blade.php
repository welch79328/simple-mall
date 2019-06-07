<style>
    .bannerImg {
        width: 100%;
        height: 500px;
    }

    @media (max-width: 480px) {
        .bannerImg {
            height: auto;
        }
    }
</style>
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @forelse($ads as $key => $ad)
            @if($key == 0)
                <div class="item active">
                    <div>
                        <img class="bannerImg" src="{{url(''.$ad->advertisement_image)}}"
                             onclick="adRedirect('{{$ad->advertisement_redirect}}')"
                             onError="this.src='{{url('images/frontend/no-img-02.jpg')}}'">

                    </div>
                </div>
            @else
                <div class="item">
                    <div>
                        <img class="bannerImg" src="{{url(''.$ad->advertisement_image)}}"
                             onclick="adRedirect('{{$ad->advertisement_redirect}}')"
                             onError="this.src='{{url('images/frontend/no-img-02.jpg')}}'">
                    </div>
                </div>
            @endif
        @empty
            <div class="item active">
                <div>
                    <img class="bannerImg" src="{{url('images/frontend/no-img-02.jpg')}}">
                </div>
            </div>
        @endforelse
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!-- The Modal -->
</div>
<!-- //banner -->
<script>
    function adRedirect(url) {
        window.location = url;
    }
</script>