{{ Form::model($invoice, ['route' => ['invoice.update', $invoice->id], 'method' => 'PUT']) }}
<div class="row">
    {{ Form::hidden('product_id', $invoice->product_id) }}
    <div class="form-group">
        {{ Form::label('invoice_no', __('Invoice Number'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('invoice_no', null, ['class' => 'form-control', 'placeholder' => __('Invoice Number'),'readonly' => 'true']) }}
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
        @php
            $decs = json_decode($invoice->description);
        @endphp
        @foreach ($store_languages as $lang)

            <div class="tab-pane fade show {{ basename(App::getLocale()) == $lang ? 'active' : '' }}"
                id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">
                <div class="form-group">
                    {{ Form::label('' . $lang . '_description', __('Description', [], $lang), ['class' => 'col-form-label']) }}
                    {{ Form::textarea('' . $lang . '_description', $decs->$lang, ['class' => 'form-control', 'placeholder' => __('Invoice Desc 1', [], $lang), 'rows' => '4']) }}
                </div>
            </div>
        @endforeach
    </div>

    <h4>{{ __('Client Information') }}</h4>
    <hr>
    <div class="form-group col-md-6">
        {{ Form::label('email', __('Email'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('email', $invoice->customer->email, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('name', __('Name'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('name', $invoice->customer->name, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('company', __('Company'), ['class' => 'col-form-label']) }}
        {{ Form::text('company', $invoice->customer->company, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('address', __('Address'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('address', $invoice->customer->address, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('zip_code', __('Zip Code'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('zip_code', $invoice->customer->zip_code, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('city', __('City'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('city', $invoice->customer->city, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('country', __('Country'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('country', $invoice->customer->country, ['class' => 'form-control', 'required' => 'required']) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('phone_number', __('Phone Number'), ['class' => 'col-form-label']) }}
        <span class="text-danger">*</span>
        {{ Form::text('phone_number', $invoice->customer->phone_number, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
{{ Form::close() }}
