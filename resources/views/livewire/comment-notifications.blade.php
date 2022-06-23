<div x-data="{ isOpen: false }" class="relative">
	<button @click="
			isOpen = ! isOpen
			if(isOpen) {
				Livewire.emit('getNotifications')
			}
">
		<svg class="h-7 w-7 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
			<path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
		</svg>
		@if($notificationCount)
			<div class="absolute text-center flex items-center justify-center border rounded-full bg-red text-white text-xxs w-4 h-4 top-0 right-0">
				{{ $notificationCount }}
			</div>
		@endif

	</button>
	<ul x-show="isOpen"
	    x-cloak
	    x-transition.origin.top
	    @click.away="isOpen = false"
	    @keydown.escape.window="isOpen = false"
	    class="absolute w-76 md:w-96 max-h-128 overflow-auto text-left text-sm bg-white shadow-dialog rounded-xl z-10 -right-6">

		@if($notifications->isNotEmpty() && ! $isLoading)
			@foreach($notifications as $notification)
				<li>
					<a href="{{ route('idea.show', $notification->data['idea_slug']) }}"
					   wire:click.prevent="markAsRead('{{ $notification->id }}')"
					   class="flex hover:bg-gray-400 hover:text-white transition duration-150 ease-in px-5 py-3">
						<img src="{{ $notification->data['user_avatar'] }}"
						     class="rounded-xl w-10 h-10"
						     alt="avatar">
						<div class="ml-4">
							<div class="line-clamp-4">
								<span class="font-semibold">{{ $notification->data['user_name'] }}</span>
								commented on
								<span class="font-semibold">{{ $notification->data['idea_title'] }}</span>:
								<span><i>&quot;{{ $notification->data['comment_body'] }}&quot;</i></span>
							</div>
							<div class="text-xs text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</div>
						</div>
					</a>
				</li>
			@endforeach
				<li class="border-t border-gray-300 text-center">
					<button wire:click="markAllAsRead" @click="isOpen = false" class="inline-block w-full transition font-semibold duration-150 ease-in px-5 py-5 hover:bg-gray-100">
						Mark All as read
					</button>
				</li>
		@elseif ($isLoading)
			@foreach(range(1, 3) as $item)
				<li class="flex items-center animate-pulse transition duration-150 ease-in px-5 py-3">
					<div class="bg-gray-200 rounded-xl w-10 h-10"></div>
					<div class="ml-4 flex-1 space-y-2">
						<div class="bg-gray-200 w-full rounded h-4"></div>
						<div class="bg-gray-200 w-1/2 rounded h-4"></div>
						<div class="bg-gray-200 w-1/3 rounded h-4"></div>
					</div>
				</li>
			@endforeach
		@else
			<div class="mx-auto w-70 mt-12">
				<div class="text-gray-900 text-center font-bold my-6">
					No new notifications
				</div>
			</div>
		@endif
	</ul>
</div>