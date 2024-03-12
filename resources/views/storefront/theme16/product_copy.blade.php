@extends('storefront.layout.theme16to21')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1>{{ __('Products') }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                    <li class="active">{{ __('Products') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Products -->
    @if ($products['Start shopping']->count() > 0)
        <!-- Photo gallery start -->
        <div class="photo-gallery content-area-13">
            <div class="container">
                <!-- Main title -->
                <div class="main-title mt2">
                    <h1>{{ __('Products') }}</h1>
                    <div class="list-inline-listing">
                        <ul class="filters filteriz-navigation clearfix">
                            @foreach ($categories as $key => $category)
                                <li class="{{ $category == $categorie_name ? 'active' : '' }} btn filtr-button filtr"
                                    data-filter="{{ $key == 0 ? 'all' : $key }}"><span>{{ $category }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row filter-portfolio">
                    <div class="cars">
                        @foreach ($products['Start shopping'] as $product)
                            @php
                                $product->name = $product->getName();
                                $parts = explode(',', $product->product_categorie);
                                $result = implode(', ', $parts);
                            @endphp
                            <div class="col-lg-4 col-md-6 col-sm-12 filtr-item" data-category="{{ $result }}">
                                <div class="portfolio-item-no-popup">
                                    <a href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                        @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                            <img alt="Image placeholder"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                class="img-fluid cover" style="height: 250px !important;">
                                        @else
                                            <img alt="Image placeholder"
                                                src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                class="img-fluid">
                                        @endif
                                    </a>
                                    <div class="portfolio-content">
                                        <div class="portfolio-content-inner">
                                            <p> {{ $product->name }}</p>
                                            <p> {{\App\Models\Utility::priceFormat($product->price)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- Photo gallery end -->
    @else
        <div class="container mt-10 mb-5">
            {{ __('No data found') }}
        </div>
    @endif
@endsection
@push('script-page')
<script>
    $(function() {
        setTimeout(() => {
        $(".filters .btn.active").click(); 
        }, 500);
});
</script>
    {!! $storethemesetting['storejs'] !!}
@endpush

