{{ Form::model($storage_plan, ['route' => ['storage_plans.update', $storage_plan->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
@csrf
@method('put')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('name', __('Name'), ['class' => 'col-form-label']) }}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')]) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('price', __('Price'), ['class' => 'col-form-label']) }}
            {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'id' => 'price', 'placeholder' => __('Enter Price'), 'required' => 'required']) }}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('capacity', __('Capacity'), ['class' => 'col-form-label']) }}
            {{ Form::number('capacity', null, ['class' => 'form-control', 'id' => 'capacity', 'placeholder' => __('Capacity should be in megabytes'), 'required' => 'required']) }}
            <span><small>{{ __("Note: '-1' for Unlimited") }}</small></span>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="form-group">
            {{ Form::label('description', __('Description'), ['class' => 'col-form-label']) }}
            {!! Form::textarea('description', null, [
                'class' => 'form-control',
                'id' => 'description',
                'rows' => 2,
                'placeholder' => __('Enter Description'),
            ]) !!}
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
</form>
