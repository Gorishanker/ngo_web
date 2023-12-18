<!--begin::Post-->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.name_title', 1) }}
                    : </label>
                {{ isset($category->category_name) ? $category->category_name : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.status', 1) }}
                    : </label>
                    @if (isset($category->is_active))
                    @if ($category->is_active == true)
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
                <label
                    class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                    : </label>
                {{ isset($category->created_at) ? get_default_format($category->created_at) : 'N/A' }}
            </div>
        </div>
    </div>
</div>
