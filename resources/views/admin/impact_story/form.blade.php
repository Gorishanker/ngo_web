@if ($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        {{-- <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
    </div>
@endif
<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.title', 1) }}</label>
        {!! Form::text('title', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.content', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">{{ trans_choice('content.project', 1) }}</label>
         {!! Form::select('project_id', $projects, null, [
            'placeholder' => trans_choice('content.please_select', 1),
            'class' => 'input w-full border bg-gray-100 mt-2',
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.is_active', 1) }}</label>
        {!! Form::select('is_active', statusArray(), null, [
            'placeholder' => trans_choice('content.please_select', 1),
            'class' => 'input w-full border bg-gray-100 mt-2',
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-4">
        <label class="required">{{ trans_choice('content.image', 1) }}</label>
        {!! Form::file('image', [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'id' => 'image',
            'onchange' => 'readURL(this, image);',
            'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
            'placeholder' => __('Upload Image '),
        ]) !!}
    </div>
    <div class="col-span-12 xl:col-span-2 mt-4">
        @if (isset($impact_story->image))
            <img id="backImage_image" width="80px" height="80px" src="{{ $impact_story->image }}" title="Image">
        @else
            <img id="backImage_image" src="{{ blankImageUrl() }}" width="80px" height="80px" title="Image">
        @endif
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.other_images', 1) }}</label>
        <input type="file" name="other_images[]" class="input w-full border bg-gray-100 mt-2"
            placeholder={{ __('Upload Image ') }} multiple="true" accept="image/*">
    </div> 
    <div class="col-span-12 form-group xl:col-span-12" style="display: flex;">
            @if (!empty($impact_story->impact_images))
                @foreach ($impact_story->impact_images as $image)
                    <a href="{{ $image->image }}" target="_blank">
                       <img style="margin: 5px;" data-id="{{ $image->id}}" width="80px" height="80px" src="{{ $image->image }}" title="Image"></a>
            @endforeach
            @endif
    </div>
    <div class="col-span-12 form-group xl:col-span-12">
        <label class="required">{{ trans_choice('content.content', 1) }}</label>
        {!! Form::textarea('content', null, [
            'class' => 'input summernote w-full border bg-gray-100 mt-2',
            'rows' => 2,
            'placeholder' => trans_choice('content.content', 1),
        ]) !!}
         @if ($errors->has('content'))
         <span class="invalid-feedback" style="display: block;">{{ $errors->first('content') }}</span>
     @endif
    </div>
</div>
<div class="text-right mt-6">
    <div class="mr-6">
        <a href="{{ route('admin.impact-stories.index') }}">
            <button type="button" class="button mr-2 bg-theme-1 text-white">
                Back</button></a>

        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
    </div>
</div>


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ImpactStoryRequest', 'form') !!}
@endpush
