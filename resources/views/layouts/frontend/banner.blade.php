<style>
    @foreach($ads as $key => $ad)
    @if($key == 0)
    .carousel .item{   
        background:-webkit-linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat;
        background:-moz-linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat;
        background:-ms-linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat; 
        background:linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat;
        background-size: cover;	
        background-position: center;
    }
    @else
    .carousel .item.item{{$key+1}}{   
        background:-webkit-linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat;
        background:-moz-linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat;
        background:-ms-linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat; 
        background:linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url(/{{$ad->advertisement_image}}), url({{$errorImgUrl}}) no-repeat;
        background-size: cover;	
        background-position: center;
    }   
    @endif
    @endforeach
</style>
<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($ads as $key => $ad)
        @if($key == 0)
        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
        @else
        <li data-target="#myCarousel" data-slide-to="{{$key}}" class=""></li>
        @endif
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($ads as $key => $ad)
        @if($key == 0)
        <div class="item active"> 
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        @else
        <div class="item item{{$key+1}}"> 
            <div class="container">
                <div class="carousel-caption">
                </div>
            </div>
        </div>
        @endif
        @endforeach
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