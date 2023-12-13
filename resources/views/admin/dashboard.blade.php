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
                    <a href="{{ route('admin.faqs.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <img
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABdklEQVR4nLXVP0hWURjH8U9/sMEodHKJMCgKDKegpUVqqDFyiRcECSWh2cFSoqXJNURraJAQF8EaS2ooaRNxERUqa6oQao8DzxUx733v5fX+4Afncs5zvvc5z3k4NNdRPMdv/Krg77hdYn/X8RbHVdM5bJdZ2MBUztwxnCqI/dsq4CZ2AlQL4DHeoacuwBvcx2AdgCP4ERfgWR2Ai1jAaXyuA3AefTEeLgJcwzI2cjwWjVZV6Qj/pMFmQDpy3I0veITRAt/as/kZTOP1bhpNdBnjeFrgtfiJpCEsor0IkDb8hAc581NRn0wp2yXMYAST2cRBgE6s4AS+lQSI9bP42QxwJTs/bOFkSUBW3CeRRS4gtf77GH+NoLKA/3QQoA3ruIMPOXEtAZKuYh6voiaHDsh0KTLar3TP75YBfMTDuGaZetFf4EYU/0IZQFcU9F58D0TnzhX4BW6ooMnovtTyqzhbJVhJQEo5vU57j+rQNIGXOcVsSf8AMaluR/7vTmQAAAAASUVORK5CYII=">
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_faqs"></div>
                                <div class="text-base text-gray-600 mt-1">Total Faqs</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route('admin.categories.index') }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-codepen">
                                    <polygon points="12 2 22 8.5 22 15.5 12 22 2 15.5 2 8.5 12 2"></polygon>
                                    <line x1="12" y1="22" x2="12" y2="15.5"></line>
                                    <polyline points="22 8.5 12 15.5 2 8.5"></polyline>
                                    <polyline points="2 15.5 12 8.5 22 15.5"></polyline>
                                    <line x1="12" y1="2" x2="12" y2="8.5"></line>
                                </svg>
                                </div>

                                <div class="text-3xl font-bold leading-8 mt-6 total_categories"></div>
                                <div class="text-base text-gray-600 mt-1">Total Categories</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: General Report -->
    </div>
@endsection
