<header>
    <h1 class="text-xl font-bold">{{ $title ?? 'Admin Panel' }}</h1>

    @if(!empty($breadcrumb))
        <nav class="text-sm text-gray-600">
            @foreach($breadcrumb as $label => $url)
                @if($url)
                    <a href="{{ $url }}">{{ $label }}</a> /
                @else
                    <span>{{ $label }}</span>
                @endif
            @endforeach
        </nav>
    @endif
</header>
