<!--begin::Post-->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.name_title', 1) }}
                    : </label>
                {{ isset($occasion->name) ? $occasion->name : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.status', 1) }}
                    : </label>
                    @if (isset($occasion->is_active))
                    @if ($occasion->is_active == true)
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
                {{ isset($occasion->created_at) ? get_default_format($occasion->created_at) : 'N/A' }}
            </div>
        </div>
    </div>
</div>

