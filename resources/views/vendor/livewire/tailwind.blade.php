@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
    <div class="flex justify-between flex-1 sm:hidden">
        <span>
            @if ($paginator->onFirstPage())
            <span
                class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-500 cursor-default select-none dark:text-white dark:bg-gray-700">
                {!! __('pagination.previous') !!}
            </span>
            @else
            <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                wire:loading.attr="disabled"
                dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-white dark:bg-gray-700">
                {!! __('pagination.previous') !!}
            </button>
            @endif
        </span>

        <span>
            @if ($paginator->hasMorePages())
            <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before"
                class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out rounded dark:text-white dark:bg-gray-700">
                {!! __('pagination.next') !!}
            </button>
            @else
            <span
                class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium leading-5 text-gray-700 rounded cursor-default select-none dark:text-white dark:bg-gray-700">
                {!! __('pagination.next') !!}
            </span>
            @endif
        </span>
    </div>

    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <p class="text-sm leading-5 text-gray-700 dark:text-white">
            <span>{!! __('Showing') !!}</span>
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            <span>{!! __('to') !!}</span>
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            <span>{!! __('from') !!}</span>
            <span class="font-medium">{{ $paginator->total() }}</span>
            <span>{!! __('results') !!}</span>
        </p>

        <span class="z-0 inline-flex rounded">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span
                        class="inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 rounded cursor-default dark:text-white"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @else
                <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                    dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                    rel="prev"
                    class="inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out rounded-l dark:text-white"
                    aria-label="{{ __('pagination.previous') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                @endif
            </span>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <span aria-disabled="true">
                <span
                    class="inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 cursor-default select-none dark:text-white">{{
                    $element }}</span>
            </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                @if ($page == $paginator->currentPage())
                <span aria-current="page">
                    <span
                        class="block px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-gray-200 rounded cursor-default select-none dark:bg-gray-700 dark:text-white">{{
                        $page }}</span>
                </span>
                @else
                <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                    class="block px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out dark:text-white"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </button>
                @endif
            </span>
            @endforeach
            @endif
            @endforeach

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                    dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                    rel="next"
                    class="inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-outrounded-r dark:text-white"
                    aria-label="{{ __('pagination.next') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                @else
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span
                        class="inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 rounded-r cursor-default dark:text-white"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @endif
            </span>
        </span>
    </div>
</nav>
@endif