<nav class="flex items-center justify-between text-gray-400 text-xs">
    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
        <li>
            <a wire:click.prevent="setStatus('All')"
               href="{{ route('idea.index', ['status' => 'All']) }}"
               class="border-b-4 pb-3 @if($status === 'All') border-blue text-gray-900 @endif">
                All ideas ({{ $statusCount['all_statuses'] }})
            </a>
        </li>
        <li>
            <a wire:click.prevent="setStatus('Considering')"
               href="{{ route('idea.index', ['status' => 'Considering']) }}"
               class="transition duration-150 ease-in border-b-4 pb-3 @if($status === 'Considering') border-blue text-gray-900 @endif hover:border-blue">
                Considering ({{ $statusCount['considering'] }})
            </a>
        </li>
        <li>
            <a wire:click.prevent="setStatus('In progress')"
               href="{{ route('idea.index', ['status' => 'In progress']) }}"
               class="transition duration-150 ease-in border-b-4 pb-3 @if($status === 'In progress') border-blue text-gray-900 @endif hover:border-blue">
                In progress ({{ $statusCount['in_progress'] }})
            </a>
        </li>
    </ul>

    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
        <li>
            <a wire:click.prevent="setStatus('Implemented')"
               href="{{ route('idea.index', ['status' => 'Implemented']) }}"
               class="transition duration-150 ease-in border-b-4 pb-3 @if($status === 'Implemented') border-blue text-gray-900 @endif hover:border-blue">
                Implemented ({{ $statusCount['implemented'] }})
            </a>
        </li>
        <li><a wire:click.prevent="setStatus('Closed')"
               href="{{ route('idea.index', ['status' => 'Closed']) }}"
               class="transition duration-150 ease-in border-b-4 pb-3 @if($status === 'Closed') border-blue text-gray-900 @endif hover:border-blue">
                Closed ({{ $statusCount['closed'] }})
            </a>
        </li>
    </ul>
</nav>