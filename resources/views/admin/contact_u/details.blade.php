<!--begin::Post-->
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.name_title', 1) }}
                    : </label>
                @if (isset($contact_u->user_type))
                    @if ($contact_u->user_type == 'user' || $contact_u->user_type == 'customer')
                        {{ isset($contact_u->user->name) ? $contact_u->user->name : 'N/A' }}
                    @elseif($contact_u->user_type == 'guruji')
                        {{ isset($contact_u->guruji->name) ? $contact_u->guruji->name : 'N/A' }}
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
                <label class="text-gray-500 font-medium leading-none mt-3">User type
                    : </label>
                @if (isset($contact_u->user_type))
                    @if ($contact_u->user_type == 'user' || $contact_u->user_type == 'customer')
                      Customer
                    @elseif($contact_u->user_type == 'guruji')
                      Guruji
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
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.email', 1) }}
                    : </label>
                {{ isset($contact_u->user->email) ? $contact_u->user->email : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.message', 1) }}
                    : </label>
                {{ isset($contact_u->message) ? $contact_u->message : 'N/A' }}
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label
                    class="text-gray-500 font-medium capitlized leading-none mt-3">{{ trans_choice('content.status', 1) }}
                    : </label>
                {{ isset($contact_u->status) ? $contact_u->status : 'N/A' }}
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
</div>
