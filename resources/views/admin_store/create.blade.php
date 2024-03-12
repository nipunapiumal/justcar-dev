{{ Form::open(['url' => 'store-resource', 'method' => 'post']) }}
<div class="row">
    <!--  @if (\Auth::user()->type == 'super admin')
<div class="col-12">
            <div class="form-group">
                {{ Form::label('store_enable', __('Store Display'), ['class' => 'form-label']) }}
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="is_store_enabled" id="is_store_enabled">
                    <label class="custom-control-label form-control-label" for="is_store_enabled"></label>
                </div>
            </div>
        </div>
@endif -->

    @if (\Auth::user()->type == 'super admin')
        <div class="col-12">
            <div class="form-group">
                {{ Form::label('role', __('Role'), ['class' => 'form-label']) }}
                {{ Form::select('role', \App\Models\Utility::getUserRoles(), null, ['class' => 'form-control']) }}
            </div>
        </div>
    @endif
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('store_name', __('Store Name'), ['class' => 'form-label']) }}

            {{ Form::text('store_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Store Name'), 'required' => 'required']) }}
        </div>
    </div>
    @if (\Auth::user()->type == 'Owner')
        <h5 class="mb-1"> {{ __('Content Sharing') }} </h5>
        <small class="text-dark font-weight-bold mb-3">
            {{ __('Here you can share content between stores. Note: Content of the selected store\'s will be copied to the :store!', ['store' => __('New Store')]) }}
        </small>
                @foreach (Auth::user()->stores as $store)
                    @if ($store->is_active)
                        {{-- @if (Auth::user()->current_store != $store->id) --}}
                            <div class="col-sm-3 form-group">
                                <div class="form-check form-check-inline mb-3">
                                    <input type="radio" id="s-sharing-content-{{ $store->slug }}" name="s_slug"
                                        value="{{ $store->slug }}" class="form-check-input">
                                    <label class="form-check-label"
                                        for="s-sharing-content-{{ $store->slug }}">{{ $store->name }}</label>
                                </div>
                            </div>
                        {{-- @endif --}}
                    @endif
                @endforeach
    @endif
    @if (\Auth::user()->type == 'super admin')
        <div class="col-12">
            <div class="form-group">
                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Email'), 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                {{ Form::label('password', __('Password'), ['class' => 'form-label']) }}
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Password'), 'required' => 'required']) }}
            </div>
        </div>
    @endif
    <div class="form-group col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary btn-light" data-bs-dismiss="modal">
        <input type="submit" value="{{ __('Save') }}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}
