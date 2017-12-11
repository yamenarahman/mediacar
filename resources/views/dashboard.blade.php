<div class="container">
    <div class="row mt-12">
        <div class="col-md-6">
            <div class="card card-accent-info">
                <div class="card-header text-center">
                    <h4>Drivers</h4>
                </div>
                <div class="card-body">
                    <h1 class="text-center">
                        <i class="icon-people" aria-hidden="true"></i><span class="badge badge-primart">{{ $drivers }}</span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-accent-info">
                <div class="card-header text-center">
                    <h4>Advertisements</h4>
                </div>
                <div class="card-body">
                    <h1 class="text-center">
                        <i class="icon-picture" aria-hidden="true"></i>
                        <span class="badge badge-primart">{{ $adsCount }}</span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('commercials')
{{--  <div class="owl-carousel owl-theme">
    <div class="item-video" data-merge="3">
        <a class="owl-video" href="https://vimeo.com/23924346"></a>
    </div>
    <div class="item-video" data-merge="1">
        <a class="owl-video" href="https://www.youtube.com/watch?v=JpxsRwnRwCQ"></a>
    </div>
    <div class="item-video" data-merge="2">
        <a class="owl-video" href="https://www.youtube.com/watch?v=FBu_jxT1PkA"></a>
    </div>
    <div class="item-video" data-merge="1">
        <a class="owl-video" href="https://www.youtube.com/watch?v=oy18DJwy5lI"></a>
    </div>
    <div class="item-video" data-merge="2">
        <a class="owl-video" href="https://www.youtube.com/watch?v=H3jLkJrhHKQ"></a>
    </div>
    <div class="item-video" data-merge="3">
        <a class="owl-video" href="https://www.youtube.com/watch?v=g3J4VxWIM6s"></a>
    </div>
    <div class="item-video" data-merge="1">
        <a class="owl-video" href="https://www.youtube.com/watch?v=0fhoIate4qI"></a>
    </div>
    <div class="item-video" data-merge="2">
        <a class="owl-video" href="https://www.youtube.com/watch?v=EF_kj2ojZaE"></a>
    </div>
</div>
@push('js')
<script>
document.addEventListener("turbolinks:load", () => {
    $('.owl-carousel').owlCarousel({
        items:1,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true,
        responsive:{
            480:{
                items:2
            },
            600:{
                items:4
            }
        }
    });
});
</script>
@endpush  --}}