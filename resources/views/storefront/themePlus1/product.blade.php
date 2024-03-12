@extends('storefront.layout.themePlus1')
@section('page-title')
    {{ __('Home') }}
@endsection
@push('css-page')
@endpush
@section('content')
    <!-- Products -->
    <section
        class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-5"
        style="background-image: url(img/page-header/page-header-background.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1>{{ __('Products') }}</h1>
                    {{-- <span class="sub-title">We are proud to introduce you to our team.</span> --}}
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb breadcrumb-light d-block text-md-end">
                        <li><a href="{{ route('store.slug', $store->slug) }}">{{ __('Home') }}</a></li>
                        <li class="active">{{ __('Products') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @if ($products['Start shopping']->count() > 0)
        <div class="container py-4">

            <ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="team"
                data-option-key="filter">
                @foreach ($categories as $key => $category)
                    <li class="nav-item {{ $category == $categorie_name ? 'active' : '' }}"
                        data-option-value="{{ $key == 0 ? '*' : ".".preg_replace('/[^A-Za-z0-9\-]/', '_', $category) }}">
                        <a class="nav-link text-2-5 text-uppercase {{ $category == $categorie_name ? 'active' : '' }}"
                            href="#">{{ $category }}</a>
                    </li>
                @endforeach
                {{-- <li class="nav-item active" data-option-value="*"><a class="nav-link text-2-5 text-uppercase active"
                        href="#">Show All</a></li>
                <li class="nav-item" data-option-value=".leadership"><a class="nav-link text-2-5 text-uppercase"
                        href="#">Leadership</a></li>
                <li class="nav-item" data-option-value=".marketing"><a class="nav-link text-2-5 text-uppercase"
                        href="#">Marketing</a></li>
                <li class="nav-item" data-option-value=".development"><a class="nav-link text-2-5 text-uppercase"
                        href="#">Development</a></li>
                <li class="nav-item" data-option-value=".design"><a class="nav-link text-2-5 text-uppercase"
                        href="#">Design</a></li> --}}
            </ul>

            <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
                <div class="row team-list sort-destination" data-sort-id="team">
                    @php
                        unset($products["Start shopping"]);
                    @endphp
                    @foreach ($products as $key => $items)
                        @if ($items->count() > 0)
                            @foreach ($items as $product)
                                @php
                                    $product->name = $product->getName();
                                @endphp
                                <div class="col-12 col-sm-6 col-lg-3 isotope-item {!! preg_replace('/[^A-Za-z0-9\-]/', '_', $key) !!}">
                                    <span class="thumb-info thumb-info-hide-wrapper-bg mb-4">
                                        <span class="thumb-info-wrapper">
                                            <a
                                                href="{{ route('store.product.product_view', [$store->slug, $product->id]) }}">
                                                @if (!empty($product->is_cover) && \Storage::exists('uploads/is_cover_image/' . $product->is_cover))
                                                    <img alt="Image placeholder"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/' . $product->is_cover)) }}"
                                                        class="img-fluid cover" style="height: 250px !important;">
                                                @else
                                                    <img alt="Image placeholder"
                                                        src="{{ asset(Storage::url('uploads/is_cover_image/default.jpg')) }}"
                                                        class="img-fluid">
                                                @endif
                                                <span class="thumb-info-title">
                                                    <span class="thumb-info-inner">{{\App\Models\Utility::priceFormat($product->price)}}</span>
                                                    <span class="thumb-info-type">{{$product->product_category()}}</span>
                                                </span>
                                            </a>
                                        </span>
                                        <span class="thumb-info-caption">
                                            <span class="thumb-info-caption-text">
                                                {{$product->name}}
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>

            </div>

        </div>
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
        $(".sort-source .nav-item.active").click(); 
        }, 500);
});
</script>
    {!! $storethemesetting['storejs'] !!}
@endpush
