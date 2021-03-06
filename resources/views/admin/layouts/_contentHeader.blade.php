<div class="row">
    <div class="col-lg-6">
        <!-- Page Title Start -->
        <h2 class="page--title h5">{{ $title }}</h2>
        <!-- Page Title End -->

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><span class="text-info">{{$shop_name->value }}</span></a></li>
            <li class="breadcrumb-item active"><span>{{ $title }}</span></li>
        </ul>
    </div>

    <div class="col-lg-6">
        <!-- Summary Widget Start -->
        <div class="summary--widget">
            <div class="summary--item">
                <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#009378">2,9,7,9,11,9,7,5,7,7,9,11</p>

                <p class="summary--title">Total Income</p>
                <p class="summary--stats text-green">{{ $income }}Tk.</p>
            </div>

            <div class="summary--item">
                <p class="summary--chart" data-trigger="sparkline" data-type="bar" data-width="5" data-height="38" data-color="#e16123">2,3,7,7,9,11,9,7,9,11,9,7</p>

                <p class="summary--title">Total Loss</p>
                <p class="summary--stats text-orange">{{ $loss }}Tk.</p>
            </div>
        </div>
        <!-- Summary Widget End -->
    </div>
</div>
