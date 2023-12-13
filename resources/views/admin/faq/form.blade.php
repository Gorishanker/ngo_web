@php
    $d_lang = 'both';
    $lng = null;
    if (isset($faq)) {
        $d_lang = null;
        if ($faq->language == 'hi') {
            $lng = 'hi';
        } else {
            $lng = 'en';
        }
    }
@endphp
@if (isset($faq))
    <input type="hidden" id="modal_id" name="id" value="{{ $faq->id }}">
    <input type="hidden" id="method" name="method" value="PUT">
    <input type="hidden" name="language" value="{{ $faq->language }}">
@endif
@if ($lng == 'en' || $d_lang == 'both')
    <div class="mt-3">
        <h2 class="font-bold text-center text-lg">English Form</h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.question', 1) }}</label>
            {!! Form::text('question', isset($faq->question) ? $faq->question : null, [
                'placeholder' => trans_choice('content.question', 1),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.status', 1) }}</label>
            {{ Form::select(
                'is_active',
                [0 => 'Inactive', 1 => 'Active'],
                isset($faq->is_active) ? $faq->is_active : null,
                [
                    'class' => 'input select w-full border bg-gray-100 mt-2',
                    'placeholder' => trans_choice('content.status', 1),
                ],
            ) }}
        </div>
    </div>
    <div class="col-span-12 form-group xl:col-span-6 mt-5">
        <label class="required">{{ trans_choice('content.answer', 1) }}</label>
        {!! Form::textarea('answer', isset($faq->answer) ? $faq->answer : null, [
            'class' => 'input w-full border bg-gray-100 mt-2 ',
            'placeholder' => trans_choice('content.answer', 1),
            'rows' => '3',
        ]) !!}
    </div>
@endif
@if ($lng == 'hi' || $d_lang == 'both')
    <div class="mt-3">
        <h2 class="font-bold text-center text-lg">हिंदी फ़ार्म</h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.question', 1) }}</label>
            {!! Form::text('question_h', isset($faq->question) ? $faq->question : null, [
                'placeholder' => trans_choice('content.question', 1),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.status', 1) }}</label>
            {{ Form::select(
                'is_active_h',
                [0 => 'Inactive', 1 => 'Active'],
                isset($faq->is_active) ? $faq->is_active : null,
                [
                    'class' => 'input select w-full border bg-gray-100 mt-2',
                    'placeholder' => trans_choice('content.status', 1),
                ],
            ) }}
        </div>
    </div>
    <div class="col-span-12 form-group xl:col-span-6 mt-5">
        <label class="required">{{ trans_choice('content.answer', 1) }}</label>
        {!! Form::textarea('answer_h', isset($faq->answer) ? $faq->answer : null, [
            'class' => 'input w-full border bg-gray-100 mt-2 ',
            'placeholder' => trans_choice('content.answer', 1),
            'rows' => '3',
        ]) !!}
    </div>
@endif

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\FaqRequest', 'form') !!}
@endpush
