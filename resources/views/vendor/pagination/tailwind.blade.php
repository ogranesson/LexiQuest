@if ($paginator->hasPages())
    <div role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center row">
        @if ($paginator->onFirstPage())
            <div class="px-4 py-2 mr-1 text-slate-300"> 
                {!! __('pagination.previous') !!}
            </div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 mr-1 rounded-lg hover:bg-slate-200">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        <div class="flex items-center row">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                                <div class="px-4 py-2 mx-1 text-white bg-violet-600 rounded-lg">{{ $page }}</div>
                        @else
                            <a href="{{ $url }}">
                                <div class="px-4 py-2 mx-1 rounded-lg hover:bg-slate-200">{{ $page }}</div>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 ml-1 rounded-lg hover:bg-slate-200">
                {!! __('pagination.next') !!}
            </a>
        @else
            <div class="px-4 py-2 ml-1 text-slate-300">
                {!! __('pagination.next') !!}
            </div>
        @endif
        </div>
@endif
