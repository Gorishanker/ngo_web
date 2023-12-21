
@if (isset($occasion))
    <input type="hidden" id="modal_id" name="id" value="{{ $occasion->id }}">
    <input type="hidden" id="method" name="method" value="PUT">
@endif
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.name_title', 1) }}</label>
            {!! Form::text('name', isset($occasion->name) ? $occasion->name : null, [
                'placeholder' => trans_choice('content.name_title', 1),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.status', 1) }}</label>
            {{ Form::select('is_active', [0 => 'Inactive', 1 => 'Active'],  isset($occasion->is_active) ? $occasion->is_active : null, [
                'class' => 'input select w-full border bg-gray-100 mt-2',
                'placeholder' => trans_choice('content.status', 1),
            ]) }}
        </div>
    </div>

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\OccasionRequest', 'form') !!}
@endpush
