{{--  <div class="container-fluid">  --}}
    <div class="row mt-3">
        <div class="col-md-12 col-lg-12 col-sm-12">
            @if($ads->isEmpty())
                <h4 class="text-center">No ads yet.</h4>
            @else
                @if($type == 'banners')
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner">
                        @foreach($ads as $ad)
                            <div class="carousel-item {{ $loop->first? ' active': '' }} {{ $loop->last? ' last': '' }}">
                                <img class="d-block w-100" src="{{ $ad->source }}" alt="{{ $ad->title }}" style="width: 100%; height: 500px;">
                            </div>
                        @endforeach
                        </div>
                        {{--  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>  --}}
                    </div>
                @else
                    <commercial></commercial>
                @endif
            @endif
        </div>
    </div>
{{--  </div>  --}}
@push('js')
<script>
document.addEventListener("turbolinks:load", function(){
    if({{ count($ads) }} == 1 && "{{ $type }}" == "banners"){
        setTimeout(function(){
            window.location.href = '/home?filter=videos';
        },4000);
    }
    $('#myCarousel').on('slid.bs.carousel', function (e) {
        var carouselData = $(this).data('bs.carousel');
        var currentItem = $(e.relatedTarget);

        if(currentItem.hasClass("last") && "{{ $type }}" == "banners"){
            setTimeout(function(){
                window.location.href = '/home?filter=videos';
            },4000);
        }
    });
});
</script>
@endpush