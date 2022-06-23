<div class="idea-and-buttons container">
	<div class="idea-container bg-white rounded-xl flex cursor-pointer mt-4">
		<div class="flex flex-1 px-4 py-6">
			<a href="#" class="flex-none">
				<img src="{{ $idea->user->getAvatar() }}"
				     alt="avatar"
				     class="w-14 h-14 rounded-xl">
			</a>
			<div class="mx-4 w-full">
				<h4 class="text-xl font-semibold">
					{{ $idea->title }}
				</h4>

				<div class="text-gray-600 mt-3">
					@admin
					@if($idea->spam_reports > 0)
						<div class="text-red mb-2 text-xs">Spam reports: {{ $idea->spam_reports }}</div>
					@endif
					@endadmin
					{{ $idea->description }}
				</div>

				<div class="flex items-center justify-between mt-6">
					<div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
						<div class="font-bold text-gray-900">{{ $idea->user->name }}</div>
						<div>&bull;</div>
						<div>{{ $idea->created_at->diffForHumans() }}</div>
						<div>&bull;</div>
						<div>{{ $idea->category->name }}</div>
						<div>&bull;</div>
						<div class="text-gray-900">{{ $idea->comments()->count() }} comments</div>
					</div>
					<div x-data="{ isOpen: false }" class="flex items-center space-x-2">
						<div class="{{ $idea->getStatusClasses() }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
							{{ $idea->status->name }}
						</div>
						@auth
							<div class="relative">
								<button @click="isOpen = ! isOpen"
								        class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 py-2 px-3 transition duration-150 ease-in">
									<svg fill="currentColor" width="24" height="6">
										<path d="M2.97.061A2.9692.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
										      style="color: rgba(163, 163, 163, .5)" />
									</svg>
								</button>
								<ul x-cloak
								    x-show="isOpen"
								    x-transition.origin.top.left
								    @click.away="isOpen = false"
								    @keydown.escape.window="isOpen = false"
								    class="absolute w-44 text-left z-10 font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
									@can('update', $idea)
										<li><a href="#"
										       @click="isOpen = false; $dispatch('edit-modal')"
										       class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Edit
										                                                                                 Idea</a>
										</li>
									@endcan
									@can('delete', $idea)
										<li><a href="#"
										       @click="isOpen = false; $dispatch('delete-modal')"
										       class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Delete
										                                                                                 Idea</a>
										</li>
									@endcan
									<li><a href="#"
									       @click="isOpen = false; $dispatch('mark-as-spam')"
									       class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Mark
									                                                                                 as
									                                                                                 spam</a>
									</li>
								</ul>
							</div>
						@endauth
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="buttons-container flex items-center justify-between mt-6">
		<div class="flex items-center space-x-4 ml-6">
			<livewire:add-comment :idea="$idea"/>
			@admin
				<livewire:set-status :idea="$idea" />
			@endadmin
		</div>

		<div class="flex items-center space-x-3">
			<div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
				<div class="text-xl leading-snug @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
				<div class="text-gray-400 text-sm leading-none">Votes</div>
			</div>
			@if($hasVoted)
				<button wire:click.prevent="vote"
				        type="button"
				        class="w-32 h-11 text-xs bg-blue font-semibold rounded-xl uppercase border-none hover:border-blue hover:bg-blue-hover text-white transition duration-150 ease-in px-6 py-2 ">
					<span>Voted</span>
				</button>
			@else
				<button wire:click.prevent="vote" type="button"
				        class="w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl uppercase border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2 ">
					<span>Vote</span>
				</button>
			@endif
		</div>
	</div> <!-- end buttons container -->
</div>