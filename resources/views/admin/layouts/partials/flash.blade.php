@if ($message = Session::get('success'))
    <div id="ns" class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white mt-2">
        <i class="fa-solid fa-check w-6 h-6 mr-2"></i><strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div id="ns" class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white mt-2">
        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div id="ns" class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-9 text-white mt-2">
        <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div id="ns" class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-12 text-white mt-2">
        <i class="fa-solid fa-circle-info w-6 h-6 mr-2"></i> <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div id="ns" class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-15 text-white mt-2">
        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> Please check the form below for errors
    </div>
@endif
