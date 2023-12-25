@if ($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.name', 1) }}</label>
        {!! Form::text('name', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.name', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">{{ trans_choice('content.email', 1) }}</label>
        {!! Form::text('email', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.email', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.position', 1) }}</label>
        {!! Form::text('position', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.position', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">{{ trans_choice('content.facebook_url', 1) }}</label>
        {!! Form::text('facebook_url', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.facebook_url', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">{{ trans_choice('content.linkedin_url', 1) }}</label>
        {!! Form::text('linkedin_url', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.linkedin_url', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">{{ trans_choice('content.twitter_url', 1) }}</label>
        {!! Form::text('twitter_url', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.twitter_url', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">{{ trans_choice('content.instagram_url', 1) }}</label>
        {!! Form::text('instagram_url', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.instagram_url', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.is_active', 1) }}</label>
         {!! Form::select('is_active', statusArray(), null, [
            'placeholder' => trans_choice('content.please_select', 1),
            'class' => 'input w-full border bg-gray-100 mt-2',
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.image', 1) }}(max- 636*589 px)</label>
        {!! Form::file('image', [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'id' => 'image',
            'onchange' => 'readURL(this, image);',
            'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
            'placeholder' => __('Upload Image '),
        ]) !!}
    </div>
    <div class="col-span-12 xl:col-span-6 mt-4">
        @if (isset($team->image))
            <img id="backImage_image" width="80px" height="80px" src="{{ $team->image }}" title="Image">
            @else
            <img id="backImage_image" src="{{blankImageUrl()}}" width="80px" height="80px" title="Image">
        @endif
    </div>
    <div class="col-span-12 form-group xl:col-span-12">
        <label class="required">{{ trans_choice('content.description', 1) }}</label>
        {!! Form::textarea('description', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'rows' => 3,
            'placeholder' => trans_choice('content.description', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-12">
        <label class="">{{ trans_choice('content.personal_statement', 1) }}</label>
        {!! Form::textarea('personal_statement', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'rows' => 3,
            'placeholder' => trans_choice('content.personal_statement', 1),
        ]) !!}
    </div>
</div>
<div class="text-right mt-6">
    <div class="mr-6">
        <a href="{{route('admin.teams.index')}}">
        <button type="button"
            class="button mr-2 bg-theme-1 text-white">
            Back</button></a>

        <button type="submit"
            class="button w-24 bg-theme-1 text-white">Save</button>
    </div>
</div>


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\TeamRequest', 'form') !!}
@endpush
