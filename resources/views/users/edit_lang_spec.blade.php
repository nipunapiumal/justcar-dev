{{ Form::model($user, ['route' => ['users.edit-lang-specialist', $user->id], 'method' => 'POST']) }}
<div class="row">
    {{-- {{Form::hidden('id_user',$user->id)}} --}}
    @foreach (App\Models\Utility::languages() as $lang)
        <div class="col-3">
            <div class="form-group">
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" name="lang[]" value="{{ $lang }}"
                        {{ in_array($lang, $langSpecialist ? json_decode($langSpecialist->languages) : []) ? 'checked' : '' }}>
                    <label class="form-check-label" for="twilio_module">
                        {{ Str::upper($lang) }}
                        </a>
                    </label>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-12">
        <div class="form-group">
            <span><small>{{ __("Here, you can configure language files specifically for our language specialists. Only the enabled language files will be visible and accessible on their dashboard.") }}</small></span>

        </div>
    </div>


</div>
<div class="form-group col-12 d-flex justify-content-end col-form-label">
    <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{ __('Update') }}" class="btn btn-primary ms-2">
</div>
{{ Form::close() }}
