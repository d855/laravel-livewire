<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use App\Notifications\CommentAdded;
use Illuminate\Http\Response;
use Livewire\Component;

class AddComment extends Component
{

	public $idea;
	public $comment;
	protected $rules = [
		'comment' => 'required|min:4',
	];

	public function mount ( Idea $idea )
	{
		$this->idea = $idea;
	}

	public function addComment ()
	{
		if (auth()->guest()) {
			abort(Response::HTTP_FORBIDDEN);
		}

		$this->validate();

		$newComment = Comment::create([
			'user_id' => auth()->id(),
			'idea_id' => $this->idea->id,
			'body' => $this->comment,
		                ]);
		$this->reset('comment');

		$this->idea->user->notify(new CommentAdded($newComment));

		$this->emit('commentWasAdded', 'Comment successfully posted!');
	}
	
    public function render()
    {
        return view('livewire.add-comment');
    }
}
