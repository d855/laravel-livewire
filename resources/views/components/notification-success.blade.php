<div x-cloak
     x-data="{ isOpen: false, messageToDisplay: '' }"
     x-show="isOpen"
     x-transition:enter="transition ease-out duration-400"
     x-transition:enter-start="opacity-0 transform translate-x-8"
     x-transition:enter-end="opacity-100 transform translate-x-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 transform translate-x-0"
     x-transition:leave-end="opacity-0 transform translate-x-8"
     x-init="Livewire.on('ideaWasUpdated', message => { isOpen = true; messageToDisplay = message; setTimeout(() => {
                        isOpen = false
                    }, 3000) })"
     @keydown.escape.window="isOpen = false"
     class="z-20 flex justify-between fixed max-w-sm w-full bottom-0 right-0 bg-white rounded-xl shadow-lg border px-6 py-5 mx-7 my-8">
	<div class="flex items-center font-semibold text-gray-500 text-base">
		<svg class="text-green h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
			<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
		</svg>
		<span class="ml-2" x-text="messageToDisplay"></span>
	</div>
	<button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
		<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
			<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
		</svg>
	</button>
</div>