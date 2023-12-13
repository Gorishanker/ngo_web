             @php
                 $auth_user = Auth::user();
             @endphp
             <div class="card mb-5 mb-xl-10">
                 <div class="card-body pt-9 pb-0">
                     <!--begin::Details-->

                     <div class="intro-y box px-5 pt-5">
                         <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
                             <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                                 <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                     <img alt="Staarae" class="rounded-full" src="{{ isset($auth_user->image) ? $auth_user->image : blankUserUrl() }}">
                                     {{-- <div
                                         class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2">
                                         <i class="w-4 h-4 text-white" data-feather="camera"></i>
                                     </div> --}}
                                 </div>
                                 <div class="ml-5">
                                     <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                                         {{ isset($auth_user->name) ? $auth_user->name : __('content.no_data') }}</div>
                                 </div>
                             </div>
                             {{-- <div
                                 class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
                                 <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="mail"
                                         class="w-4 h-4 mr-2"></i> {{ $auth_user->email }}</div>

                             </div> --}}
                         </div>
                         <ul variant="link-tabs" role="tablist" aria-orientation="horizontal"
                             class="w-full flex flex-col justify-center text-center sm:flex-row lg:justify-start tab-color">
                             <a data-toggle="tab" data-target="#details" href="{{ route('admin.profile') }}?tab=details"
                                 class="tabing py-4 sm:mr-8 flex items-center {{ request()->tab == 'details' || request()->tab == '' ? 'active' : '' }}">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-user w-4 h-4 mr-2">
                                     <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                     <circle cx="12" cy="7" r="4"></circle>
                                 </svg> {{ trans_choice('content.profile', 1) }}
                             </a>

                             <a data-toggle="tab" data-target="#change-password"
                                 href="{{ route('admin.change_password') }}?tab=change-password"
                                 class="tabing py-4 sm:mr-8 flex items-center  {{ request()->tab == 'change-password' || request()->tab == '' ? 'active' : '' }}">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="lucide-icon lucide lucide-lock stroke-[1.3] w-4 h-4 mr-2">
                                     <rect x="3" y="11" width="18" height="11" rx="2"
                                         ry="2"></rect>
                                     <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                 </svg> {{ trans_choice('content.change_password', 1) }}
                             </a>

                             <a data-toggle="tab" data-target="#edit" href="{{ route('admin.edit_profile') }}?tab=edit"
                                 class="tabing py-4 sm:mr-8 flex items-center  {{ request()->tab == 'edit' || request()->tab == '' ? 'active' : '' }}">
                                 <i class="fa-solid fa-user-pen"></i>
                                 {{ trans_choice('content.edit_profile', 1) }}
                             </a>
                         </ul>
                     </div>
                     <!--end::Details-->
                     <!--begin::Navs-->


                     <div class="flex-lg-row-fluid ms-lg-15">
                         <div class="tab-content" id="myTabContent">
                             @yield('user_details_tab')
                         </div>
                         <!--end:::Tab content-->
                     </div>
                     <!--begin::Navs-->
                 </div>
             </div>
