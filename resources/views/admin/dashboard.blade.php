@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'breadcrumbs' => Breadcrumbs::render('admin.dashboard'),
    ])

    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-4">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    General Report
                </h2>
                <a href="javascript::;" id="tiles_data_reload" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw"
                        class="w-4 h-4 mr-3"></i>
                    Reload Data </a>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.services.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-brands fa-servicestack"></i></div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_services"></div>
                                <div class="text-base text-gray-600 mt-1">Total services</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.teams.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-solid fa-people-group"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_teams"></div>
                                <div class="text-base text-gray-600 mt-1">Total teams</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.projects.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-solid fa-diagram-project"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_projects"></div>
                                <div class="text-base text-gray-600 mt-1">Total projects</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.campaigns.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-solid fa-tree"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_campaigns"></div>
                                <div class="text-base text-gray-600 mt-1">Total campaigns</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.blogs.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-brands fa-microblog"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_blogs"></div>
                                <div class="text-base text-gray-600 mt-1">Total blogs</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.categories.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-solid fa-list"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_categories"></div>
                                <div class="text-base text-gray-600 mt-1">Total categories</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.tags.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-solid fa-tags"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_tags"></div>
                                <div class="text-base text-gray-600 mt-1">Total tags</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.banners.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-solid fa-images"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_banners"></div>
                                <div class="text-base text-gray-600 mt-1">Total banners</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.faqs.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-regular fa-comments"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_faqs"></div>
                                <div class="text-base text-gray-600 mt-1">Total faqs</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.contact_us.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i class="fa-solid fa-headset"></i>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_contact_us"></div>
                                <div class="text-base text-gray-600 mt-1">Total contact requests</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: General Report -->
    </div>

    @push('scripts')
    <script>
        function dashboard() {
            $.ajax({
                    url: `{{ route('admin.dashboard-counts') }}`,
                    type: "get",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                })
                .done(function(response) {
                    $('.total_services').text(response.data.total_services);
                    $('.total_teams').text(response.data.total_teams);
                    $('.total_projects').text(response.data.total_projects);
                    $('.total_campaigns').text(response.data.total_campaigns);
                    $('.total_blogs').text(response.data.total_blogs);
                    $('.total_categories').text(response.data.total_categories);
                    $('.total_tags').text(response.data.total_tags);
                    $('.total_banners').text(response.data.total_banners);
                    $('.total_faqs').text(response.data.total_faqs);
                    $('.total_contact_us').text(response.data.total_contact_us);
                })
                .fail(function() {
                    Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                });
        }
        $('.text-3xl.font-bold').html(`<div role="status">
    <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="#5e3d9f" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>`);
        dashboard();

        $(document).on('click', '#tiles_data_reload', function() {
            $('.text-3xl.font-bold').html(`<div role="status">
    <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="#5e3d9f" xmlns="http://www.w3.org/2000/svg">
        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
    </svg>
    <span class="sr-only">Loading...</span>
</div>`);
            dashboard();
            return false;
        });
    </script>
    @endpush
@endsection
