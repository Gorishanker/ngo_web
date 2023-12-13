@php
    $d_lang = 'both';
    $lng = null;
    if (isset($category)) {
        $d_lang = null;
        if ($category->language == 'hi') {
            $lng = 'hi';
        } else {
            $lng = 'en';
        }
    }
@endphp
@if (isset($category))
    <input type="hidden" id="modal_id" name="id" value="{{ $category->id }}">
    <input type="hidden" id="method" name="method" value="PUT">
    <input type="hidden" name="language" value="{{ $category->language }}">
@endif
@if ($lng == 'en' || $d_lang == 'both')
    <div class="mt-3">
        <h2 class="font-bold text-center text-lg">English Form</h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.name_title', 1) }}</label>
            {!! Form::text('category_name', isset($category->category_name) ? $category->category_name : null, [
                'placeholder' => trans_choice('content.name_title', 1),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.status', 1) }}</label>
            {{ Form::select('is_active', [0 => 'Inactive', 1 => 'Active'],  isset($category->is_active) ? $category->is_active : null, [
                'class' => 'input select w-full border bg-gray-100 mt-2',
                'placeholder' => trans_choice('content.status', 1),
            ]) }}
        </div>
    </div>
@endif
@if ($lng == 'hi' || $d_lang == 'both')
    <div class="mt-3">
        <h2 class="font-bold text-center text-lg">हिंदी फ़ार्म</h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.name_title', 1) }}</label>
            {!! Form::text('category_name_h', isset($category->category_name) ? $category->category_name : null, [
                'placeholder' => trans_choice('content.name_title', 1),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.status', 1) }}</label>
            {{ Form::select('is_active_h', [0 => 'Inactive', 1 => 'Active'],  isset($category->is_active) ? $category->is_active : null, [
                'class' => 'input select w-full border bg-gray-100 mt-2',
                'placeholder' => trans_choice('content.status', 1),
            ]) }}
        </div>
    </div>
@endif

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryRequest', 'form') !!}
@endpush
