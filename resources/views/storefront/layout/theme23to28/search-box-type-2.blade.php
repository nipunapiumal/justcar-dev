<div class="search-box-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('store.categorie.product', [$store->slug, 'Start shopping']) }}" id="frm-filter"
                    method="get">
                    @csrf
                    <div class="row row-3">
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <select class="selectpicker search-fields" name="vehicle_type_id" id="vehicle_type_id"
                                data-url="{{ route('product.get-vehicle-brands', [$store->slug]) }}">
                                <option value="">
                                    {{ __('Select Vehicle Type') }}
                                </option>
                                @foreach ($vehicleTypes as $vehicleType)
                                    <option value="{{ $vehicleType['id'] }}">
                                        {{ $vehicleType->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <select class="selectpicker search-fields" name="brand_id" id="brand_id"
                                data-url="{{ route('product.get-models', [$store->slug]) }}" disabled>
                                <option value="">
                                    {{ __('Select Make') }}
                                </option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 search-col">
                            <select class="selectpicker search-fields" name="model_id" id="model_id" disabled>
                                <option value="">
                                    {{ __('Select Model') }}
                                </option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 col-pad">
                            <button class="btn w-100 btn-block btn-md">
                                {{ __('Search') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>