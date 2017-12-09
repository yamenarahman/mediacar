<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <b-carousel id="commercials"
                style="text-shadow: 1px 1px 2px #333;"
                controls
                indicators
                background="#ababab"
                :interval="4000"
                img-width="1024"
                img-height="480"
                v-model="slide"
                @sliding-start="onSlideStart"
                @sliding-end="onSlideEnd">

                @foreach($ads as $ad)
                    <b-carousel-slide img-src="{{ $ad->source }}">
                    </b-carousel-slide>
                @endforeach
            </b-carousel>
        </div>
    </div>
</div>