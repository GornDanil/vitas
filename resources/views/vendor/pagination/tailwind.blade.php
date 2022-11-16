@if ($paginator->hasPages())
    <nav style="margin-top: 25px;" role="navigation" aria-label="{{ __('Pagination Navigation') }}">
           <div>
                <span class="paginator">
                    {{-- Previous Page Link --}}
                    <style>
                        .btn_border-white{
                            padding: 10px 20px;
                        }
                        .btn_border-white:hover{
                            background-color: var(--main-accent-color);
                            border: 2px solid var(--main-accent-color);
                        }
                        .nav-link{
                            margin-right: 0px;
                        }
                    </style>
                    @if ($paginator->onFirstPage())
                        <span class="active-page" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="nav-link btn_border-white" aria-label="{{ __('pagination.previous') }}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    <div class="paginator-pages">
                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="number-page active-page">
                                        <span class="">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="nav-link btn_border-white number-page" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </div>
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="nav-link btn_border-white" aria-label="{{ __('pagination.next') }}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="active-page" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </span>
            </div>

    </nav>
@endif
