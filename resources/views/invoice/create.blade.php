{{ Form::open(['url' => 'invoice', 'method' => 'post']) }}
<div class="row">
    {{ Form::hidden('product_id', $id) }}
    <div class="form-group">
        {{ Form::label('invoice_no', __('Invoice Number'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('invoice_no', null, ['class' => 'form-control', 'placeholder' => __('Invoice Number'), 'required' => 'required']) }}
        {{-- {{ Form::label('type', __('Type'), ['class' => 'col-form-label']) }}
            {{ Form::select('type', $galleryCategories, null, [
                'class' => 'form-control',
                'required' => 'required',
            ]) }} --}}
    </div>
    <ul class="nav nav-tabs" role="tablist">
        @php $store_languages = App\Models\Utility::getStoreLanguages(); @endphp
        @foreach ($store_languages as $lang)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                    id="{{ $lang }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $lang }}" type="button"
                    role="tab" aria-controls="home"
                    aria-selected="true">{{ \App\Models\Utility::getLangCodes($lang) }}</button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach ($store_languages as $lang)
            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">
                <div class="form-group">
                    {{ Form::label('' . $lang . '_description', __('Description',[],$lang), ['class' => 'col-form-label']) }}
                    {{ Form::textarea('' . $lang . '_description', null, ['class' => 'form-control', 'placeholder' => __('Invoice Desc 1',[], $lang), 'rows' => '4']) }}
                </div>
            </div>
        @endforeach
    </div>
    
    <h4>{{ __('Client Information') }}</h4>
    <hr>
    <div class="form-group col-md-6">
        {{ Form::label('email', __('Email'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Name'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('company', __('Company'), ['class' => 'col-form-label']) }}
        {{ Form::text('company', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('address', __('Address'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('zip_code', __('Zip Code'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('zip_code', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('city', __('City'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('country', __('Country'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('country', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('phone_number', __('Phone Number'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
    </div>



    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Generate') }}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}
