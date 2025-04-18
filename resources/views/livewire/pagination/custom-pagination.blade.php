@if ($paginator->hasPages())
    <nav aria-label="page-navigation">
        <ul class="flex list-style-none">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span
                        class="relative block pointer-events-none px-3 py-1.5 mr-3 text-base text-gray-700 transition-all duration-300 rounded-md dark:text-gray-400">
                        Previous
                    </span>
                </li>
            @else
                <li class="page-item">
                    <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        rel="prev"
                        class="relative block px-3 py-1.5 mr-3 text-base text-gray-700 transition-all duration-300 rounded-md dark:text-gray-400 hover:text-gray-100 hover:bg-blue-600">
                        Previous
                    </button>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span
                            class="relative block px-3 py-1.5 mr-3 text-base text-gray-700 transition-all duration-300 rounded-md dark:text-gray-400">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span
                                    class="relative block px-3 py-1.5 mr-3 text-base hover:text-blue-700 transition-all duration-300 hover:bg-blue-200 dark:hover:text-gray-400 dark:hover:bg-gray-700 rounded-md text-gray-100 bg-blue-400">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                    wire:loading.attr="disabled"
                                    class="relative block px-3 py-1.5 text-base text-gray-700 transition-all duration-300 dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-blue-100 rounded-md mr-3">{{ $page }}</button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                        rel="next"
                        class="relative block px-3 py-1.5 text-base text-gray-700 transition-all duration-300 dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-blue-100 hover:text-gray-700 rounded-md">
                        Next
                    </button>
                </li>
            @else
                <li class="page-item disabled">
                    <span
                        class="relative block pointer-events-none px-3 py-1.5 text-base text-gray-700 transition-all duration-300 rounded-md dark:text-gray-400">
                        Next
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
