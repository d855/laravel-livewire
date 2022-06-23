<div>
	@if($comments->isNotEmpty())
		<div class="comments-container relative space-y-6 ml-22 my-8 pt-4 mt-1">
			@foreach($comments as $comment)
				<livewire:idea-comment :key="$comment->id" :comment="$comment" :ideaUserId="$idea->user->id" />
			@endforeach
		</div>

		<div class="my-8 ml-22">
			{{ $comments->onEachSide(1)->links() }}
		</div>

	@else
		<div class="mx-auto w-70 mt-12">
			<div class="text-gray-400 text-center font-bold mt-6">
				There are no comments yet..
			</div>
		</div>
	@endif
</div>
