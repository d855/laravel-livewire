<div>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select wire:model="category" name="category" id="category" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="All Categories">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/3">
            <select wire:model="filter" name="other_filters" id="other_filters" class="w-full rounded-xl px-4 py-2 border-none">
                <option value="all">Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
                @admin
                    <option value="Spam Ideas">Spam Ideas</option>
                @endadmin
            </select>
        </div>
        <div class="w-2/3 relative">
            <input wire:model="search"
                   type="search"
                   placeholder="Find an idea"
                   class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none placeholder:text-gray-900">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div> <!-- end filter -->

    <div class="ideas-container space-y-6 my-6">
        @forelse($ideas as $idea)
            <livewire:idea-index :key="$idea->id" :idea="$idea" :votesCount="$idea->votes_count"/>
        @empty
            <div class="mx-auto w-70 mt-12">
                <div class="text-gray-400 text-center font-bold mt-6">
                    No ideas where found ...
                </div>
            </div>
        @endforelse
    </div>

    <div class="my-8">
        {{ $ideas->links() }}
    </div>
</div>
