<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 col-lg-12 col-sm-12">
            @if($ads->isEmpty())
                <h4 class="text-center">No ads yet.</h4>
            @else
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    @foreach($ads as $ad)
                        <div class="carousel-item {{ $loop->first? ' active': ' ' }}">
                            @switch($ad->type)
                                @case('picture')
                                    <img class="d-block w-100" src="{{ $ad->source }}" alt="{{ $ad->title }}" style="width: 100%; height: 600px;">
                                    @break
                                @case('video')
                                    <iframe src="{{ 'https://www.youtube.com/embed/'.$ad->source }} " frameborder="0" style="width: 100%; height: 600px;"></iframe>
                                    @break
                                @default

                            @endswitch
                        </div>
                    @endforeach
                    </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                </div>
            @endif
        </div>
    </div>
</div>