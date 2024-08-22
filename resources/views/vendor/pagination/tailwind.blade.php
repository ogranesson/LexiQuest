@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1">
            @if ($paginator->onFirstPage())
                <span> 
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            <div>
                <span class="">
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span>{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </span>
            </div>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span>
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
