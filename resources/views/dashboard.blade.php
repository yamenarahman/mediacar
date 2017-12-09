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