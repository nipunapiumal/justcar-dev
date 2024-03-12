{{ Form::open(['url' => 'plan_duration', 'method' => 'post']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('plan_id', __('Plan'), ['class' => 'col-form-label']) }}
            <select name="plan_id" class="form-control" id="plan_id" required>
                <option value="">{{ __('Please Select') }}</option>
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}">
                        {{ $plan->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('duration', __('Duration'), ['class' => 'col-form-label']) }}
            {!! Form::select('duration', App\Models\Plan::$arrDuration, null, [
                'class' => 'form-control',
                'required' => 'required',
            ]) !!}
        </div>
        <div class="form-group">
            {{ Form::label('price', __('Price'), ['class' => 'col-form-label']) }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ env('CURRENCY_SYMBOL') ? env('CURRENCY_SYMBOL') : '$' }}</span>
                </div>
                {!! Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => __('Enter Price')]) !!}
            </div>
        </div>
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}
