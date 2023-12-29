<!--begin::Post-->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.name_title', 1) }}
                    : </label>
                {{ isset($contact_u->name) ? $contact_u->name : 'Na' }}
            </div>
        </div>
    </div>

    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.email', 1) }}
                    : </label>
                {{ isset($contact_u->email) ? $contact_u->email : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.subject', 1) }}
                    : </label>
                {{ isset($contact_u->subject) ? $contact_u->subject : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">User type
                    : </label>
                @if (isset($contact_u->status))
                    @if ($contact_u->status == 0 || $contact_u->status == null)
                        Pending
                    @elseif($contact_u->status == 1)
                        Completed
                    @elseif($contact_u->status == 2)
                        Rejected
                    @else
                        Na
                    @endif
                @else
                    Na
                @endif
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                    : </label>
                {{ isset($contact_u->created_at) ? get_default_format($contact_u->created_at) : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box p-5">
            <div>
                <label
                    class="text-gray-500 font-medium capitlized leading-none mt-3">{{ trans_choice('content.message', 1) }}
                    : </label>
                {{ isset($contact_u->message) ? $contact_u->message : 'N/A' }}
            </div>
        </div>
    </div>
</div>
