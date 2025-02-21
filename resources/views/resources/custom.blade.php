<!-- resources/views/vendor/pagination/custom.blade.php -->
@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
        <span class="prev page-numbers"><i class="fas fa-angle-double-left"></i></span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="page-numbers">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
    @else
        <span class="next page-numbers"><i class="fas fa-angle-double-right"></i></span>
    @endif
@endif
