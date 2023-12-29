<!--begin::Post-->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.title', 1) }}
                    : </label>
                {{ isset($page_content->title) ? $page_content->title : 'N/A' }}
            </div>
        </div>
    </div>
    {{-- <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.status', 1) }}
                    : </label>
                    @if (isset($page_content->is_active))
                    @if ($page_content->is_active == true)
                        Active
                    @else
                        Inactive
                    @endif
                @else
                    N/a
                @endif
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.language', 1) }}
                    : </label>
                    @if (isset($page_content->language))
                    @if ($page_content->language == 'en')
                        English
                    @elseif($page_content->language == 'hi')
                    हिंदी
                    @else
                   {{$page_content->language}}
                    @endif
                @else
                    N/a
                @endif
            </div>
        </div>
    </div> --}}
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label
                    class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                    : </label>
                {{ isset($page_content->created_at) ? get_default_format($page_content->created_at) : 'N/A' }}
            </div>
        </div>
    </div>
</div>
<div class="intro-y col-span-12 mt-5 lg:col-span-6">
    <div class="intro-y box p-5">
        <div>
            <label
                class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.content', 1) }}
                : </label>
            {!! isset($page_content->content) ? $page_content->content : 'N/A' !!}
        </div>
    </div>
</div>
