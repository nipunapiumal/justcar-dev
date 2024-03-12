{{ Form::model($planDuration, ['route' => ['plan_duration.update', $planDuration->id], 'method' => 'PUT']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <select name="plan_id" class="form-control" id="plan_id" required>
                <option value="">{{__('Please Select')}}</option>
                
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}" {{$planDuration->plan_id==$plan->id?'selected':''}}>
                        {{ $plan->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('duration', __('Duration'), ['class' => 'col-form-label']) }}
            {!! Form::select('duration', App\Models\Plan::$arrDuration, $planDuration->duration, [
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
                {!! Form::text('price', $planDuration->price, ['class' => 'form-control', 'id' => 'price', 'placeholder' => __('Enter Price')]) !!}
            </div>
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
{{ Form::close() }}