<div x-data
     @click="const target = $event.target.tagName.toLowerCase()
                            const ignores = ['button','svg','path','a', 'img']
                            const ideaLink = $event.target.closest('.idea-container').querySelector('.idea-link')

                            !ignores.includes(target) && ideaLink.click()"
     class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-150 ease-in cursor-pointer">
	<div class="border-r border-gray-100 px-5 py-8">
		<div class="text-center">
			<div class="font-semibold text-2xl @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
			<div class="text-gray-500">Votes</div>
		</div>

		<div class="mt-8">
			@if ($hasVoted)
				<button wire:click.prevent="vote"
				        class="w-20 bg-blue font-bold text-xxs uppercase rounded-xl px-4 py-3 hover:bg-blue-hover text-white transition duration-150 ease-in">
					Voted
				</button>
			@else
				<button wire:click.prevent="vote"
				        class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
					Vote
				</button>
			@endif
		</div>
	</div>
	<div class="flex flex-1 px-2 py-6">
		<div class="flex-none">
			<a href="#" class="flex-none">
				<img src="{{ $idea->user->getAvatar() }}"
				     alt="avatar"
				     class="w-14 h-14 rounded-xl">
			</a>
		</div>
		<div class="w-full mx-4">
			<h4 class="text-xl font-semibold">
				<a href="{{ route('idea.show', $idea) }}"
				   class="idea-link hover:underline">{{ $idea->title }}</a>
			</h4>

			<div class="text-gray-600 mt-3 line-clamp-3">
				@admin
				@if($idea->spam_reports > 0)
					<div class="text-red mb-2 text-xs">Spam reports: {{ $idea->spam_reports }}</div>
				@endif
				@endadmin
				{{ $idea->description }}
			</div>

			<div class="flex items-center justify-between mt-6">
				<div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
					<div>{{ $idea->created_at->diffForHumans() }}</div>
					<div>&bull;</div>
					<div>{{ $idea->category->name }}</div>
					<div>&bull;</div>
					<div wire:ignore class="text-gray-900">{{ $idea->comments_count }} comments</div>
				</div>
				<div x-data="{ isOpen: false }" class="flex items-center space-x-2">
					<div class="{{ $idea->getStatusClasses() }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
						{{ $idea->status->name }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>