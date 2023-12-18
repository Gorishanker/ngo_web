<!--begin::Post-->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.question', 1) }}
                    : </label>
                {{ isset($faq->question) ? $faq->question : 'N/A' }}
            </div>
        </div>
    </div>

    <div class="intro-y col-span-12 lg:col-span-12 mt-5">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.answer', 1) }}
                    : </label>
                {{ isset($faq->answer) ? $faq->answer : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.status', 1) }}
                    : </label>
                @if (isset($faq->is_active))
                    @if ($faq->is_active == true)
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
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                    : </label>
                {{ isset($faq->created_at) ? get_default_format($faq->created_at) : 'N/A' }}
            </div>
        </div>
    </div>
</div>
