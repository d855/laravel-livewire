<div x-data="{ isOpen: false }" class="relative">
    <button @click="isOpen = ! isOpen" type="button"
            class="flex items-center justify-center w-36 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
        <span>Set status</span>
        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div x-cloak
         x-show="isOpen"
         x-init="window.livewire.on('statusWasUpdated', () => { isOpen = false })"
         x-transition.origin.top.left
         @click.away="isOpen = false"
         @keydown.escape.window="isOpen = false"
         class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
        <form wire:submit.prevent="setStatus" action="#" class="space-y-4 px-4 py-5">
            <div class="space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio"
                               checked=""
                               class="bg-gray-200 text-gray-200 border-none"
                               name="radio-direct"
                               value="1">
                        <span class="ml-2">Open</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio"
                               name="radio-direct"
                               class="bg-gray-200 text-purple border-none"
                               value="2">
                        <span class="ml-2">Considering</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio"
                               name="radio-direct"
                               class="bg-gray-200 text-yellow border-none"
                               value="3">
                        <span class="ml-2">In progress</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio"
                               name="radio-direct"
                               class="bg-gray-200 text-green border-none"
                               value="4">
                        <span class="ml-2">Implemented</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio"
                               name="radio-direct"
                               class="bg-gray-200 text-red border-none"
                               value="5">
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
            </div>
            <div>
                            <textarea name="update_comment"
                                      id="update_comment"
                                      cols="30"
                                      rows="3"
                                      class="w-full text-sm bg-gray-100 rounded-xl placeholder:text-gray-900 border-none px-4 py-2"
                                      placeholder="Add an update comment (optional)"></textarea>
            </div>

            <div class="flex items-center justify-between space-x-3">
                <button type="button"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    <svg class="w-4 text-gray-600 -rotate-45"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="ml-1">Attach</span>
                </button>
                <button type="submit"
                        class="flex items-center justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3 disabled:opacity-50">
                    <span class="">Update</span>
                </button>
            </div>
            <div>
                <label class="inline-flex items-center font-normal ">
                    <input wire:model="notifyAllVoters" type="checkbox" name="notify_voters" class="rounded bg-gray-200">
                    <span>Notify all voters</span>
                </label>
            </div>
        </form>
    </div>
</div>