{{ Form::open(['url' => 'job-board', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('job_category', __('Job Category'), ['class' => 'col-form-label']) }}
            <span class="text-danger">*</span>
            {{ Form::select('job_category', $jobCategories, null, [
                'class' => 'form-control',
                'required' => 'required',
            ]) }}
        </div>
        <div class="form-group">
            {{ Form::label('title', __('Title'), ['class' => 'col-form-label']) }}
            <span class="text-danger">*</span>
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Title'), 'required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('position', __('Position'), ['class' => 'col-form-label']) }}
            <span class="text-danger">*</span>
            {{ Form::text('position', null, ['class' => 'form-control', 'placeholder' => __('Position'), 'required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('meta_description', __('Meta Description'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('meta_description', null, ['class' => 'form-control', 'placeholder' => __('Meta Description')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('vacancy', __('Vacancy'), ['class' => 'col-form-label']) }}
            {{ Form::number('vacancy', null, ['class' => 'form-control', 'placeholder' => __('Vacancy')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('job_context', __('Job Context'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('job_context', null, ['class' => 'form-control', 'placeholder' => __('Job Context')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('job_responsibility', __('Job Responsibility'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('job_responsibility', null, ['class' => 'form-control', 'placeholder' => __('Job Responsibility')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('educational_requirements', __('Educational Requirements'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('educational_requirements', null, ['class' => 'form-control', 'placeholder' => __('Educational Requirements')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('experience_requirements', __('Experience Requirements'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('experience_requirements', null, ['class' => 'form-control', 'placeholder' => __('Experience Requirements')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('additional_requirements', __('Additional Requirements'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('additional_requirements', null, ['class' => 'form-control', 'placeholder' => __('Additional Requirements')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('employment_status', __('Employment Status'), ['class' => 'col-form-label']) }}
            {{ Form::select(
                'employment_status',
                ['full_time' => 'Full-Time', 'part_time' => 'Part-Time', 'project_based' => 'Project Based'],
                null,
                [
                    'class' => 'form-control',
                ],
                ) }}
        </div>
        <div class="form-group">
            {{ Form::label('compensation_other_benefits', __('Compensation & Other Benefits'), ['class' => 'col-form-label']) }}
            {{ Form::textarea('compensation_other_benefits', null, ['class' => 'form-control', 'placeholder' => __('Compensation & Other Benefits')]) }}
        </div>
        <div class="form-group">
            {{ Form::label('salary', __('Salary'), ['class' => 'col-form-label']) }}
            {{ Form::text('salary', null, ['class' => 'form-control', 'placeholder' => __('Salary')]) }}
        </div>
    </div>
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}
