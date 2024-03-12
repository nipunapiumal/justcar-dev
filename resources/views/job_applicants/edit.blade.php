{{ Form::model($jobBoard, ['route' => ['job-board.update', $jobBoard->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">

            {{ Form::hidden('id', $jobBoard->id, ['class' => '']) }}

            {{ Form::label('job_category', __('Job Category'), ['class' => 'col-form-label']) }}
            {{ Form::select('job_category', $jobCategories, null, [
                'class' => 'form-control',
                'required' => 'required',
            ]) }}
        </div>
        <div class="form-group">
            {{Form::label('title',__('Title'),array('class'=>'col-form-label'))}}
            {{Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Title'),'required'=>'required'))}}
        </div>
        <div class="form-group">
            {{Form::label('position',__('Position'),array('class'=>'col-form-label'))}}
            {{Form::text('position',null,array('class'=>'form-control','placeholder'=>__('Position'),'required'=>'required'))}}
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
{{ Form::close() }}
