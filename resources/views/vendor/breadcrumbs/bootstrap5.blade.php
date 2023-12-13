@unless ($breadcrumbs->isEmpty())
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}" class="breadcrumb--active">
                    {{ $breadcrumb->title }}
                </a>
                <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            @else
                <a class="breadcrumb--active">{{ $breadcrumb->title }}</a>
            @endif
        @endforeach
    </div>
@endunless
