{{ Form::model($gallery, ['route' => ['gallery.update', $gallery->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">

            {{ Form::hidden('id', $gallery->id, ['class' => '']) }}

            {{ Form::label('gallery_categorie', __('Gallery Category'), ['class' => 'col-form-label']) }}
            {{ Form::select('gallery_categorie', $galleryCategories, null, [
                'class' => 'form-control',
                'required' => 'required',
            ]) }}
        </div>
        <div class="form-group">
            <label for="gallery_img" class="col-form-label">{{ __('Upload Gallery Image') }}</label>
            <input type="file" name="gallery_img" id="gallery_img" class="form-control">
        </div>
    </div>
</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
{{ Form::close() }}
