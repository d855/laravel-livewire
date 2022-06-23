<div class="comment-container relative transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer mt-4">
	<div class="flex flex-1 px-4 py-6">
		<a href="#" class="flex-none">
			<img src="{{ $comment->user->getAvatar() }}"
			     alt="avatar"
			     class="w-14 h-14 rounded-xl">
		</a>
		<div class="mx-4 w-full">
			<div class="text-gray-600">
				{{ $comment->body }}
			</div>

			<div class="flex items-center justify-between mt-6">
				<div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
					<div class="font-bold text-gray-900">{{ $comment->user->name }}</div>
					<div>&bull;</div>
					@if($comment->user->id === $ideaUserId)
						<div class="rounded-full border bg-gray-100 px-3 py-1">OP</div>
						<div>&bull;</div>
					@endif
					<div>{{ $comment->created_at->diffForHumans() }}</div>
				</div>
				@auth
					<div x-data="{ isOpen: false }" class="flex items-center space-x-2">
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
							    class="z-10 absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">

								<li><a href="#"
								       @click="isOpen = false; $dispatch('edit-modal')"
								       class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Edit
								                                                                                 Comment</a>
								</li>

								<li><a href="#"
								       class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Mark
								                                                                                 as
								                                                                                 spam</a>
								</li>
								<li><a href="#"
								       class="hover:bg-gray-100 block px-5 py-3 transition duration-150 ease-in">Delete
								                                                                                 post</a>
								</li>
							</ul>
						</div>
					</div>
				@endauth
			</div>
		</div>
	</div>
</div>