<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 xl:col-span-12">
        <label class="required">{{ trans_choice('content.company_name_title', 1) }}</label>
        {!! Form::text(
            'data[company_full_name]',
            isset($company['company_full_name']) ? $company['company_full_name'] : null,
            [
                'placeholder' => __('placeholder.company_full_name'),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ],
        ) !!}
        @if ($errors->has('data.company_full_name'))
            <span style="color:red">{{ $errors->first('data.company_full_name') }}</span>
        @endif
    </div>
</div>

<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 xl:col-span-12">
        <label class="required">{{ trans_choice('content.phone_title', 1) }}</label>
        {!! Form::text('data[contact_number]', isset($company['contact_number']) ? $company['contact_number'] : null, [
            'placeholder' => __('placeholder.company_contact_number'),
            'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
        ]) !!}
        @if ($errors->has('data.contact_number'))
            <span style="color:red">{{ $errors->first('data.contact_number') }}</span>
        @endif
    </div>
</div>

<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 xl:col-span-12">
        <label class="required">{{ trans_choice('content.address_title', 1) }}</label>
        {!! Form::textarea('data[address]', isset($company['address']) ? $company['address'] : null, [
            'placeholder' => __('placeholder.company_address'),
            'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            'rows' => 5,
            'cols' => 15,
        ]) !!}
        @if ($errors->has('data.address'))
            <span style="color:red">{{ $errors->first('data.address') }}</span>
        @endif
    </div>
</div>
<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\SettingRequest', 'form') !!}
@endpush
