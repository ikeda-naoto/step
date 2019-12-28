@if (count($breadcrumbs))
    <div class="p-breadcrumbs l-row  l-row--middle l-row--center">
        <ul class="l-site-width l-row p-breadcrumbs__list">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li class="p-breadcrumbs__item"><a class="p-breadcrumbs__link" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="p-breadcrumbs__item active">{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endif