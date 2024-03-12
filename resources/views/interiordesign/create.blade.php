{{ Form::open(['url' => 'interior-design', 'method' => 'post']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('name', __('Interior Design'),['class' => 'col-form-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control','placeholder' => __('Enter Interior Design'),'required' => 'required']) }}
        </div>
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}