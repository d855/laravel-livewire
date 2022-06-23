<?php

	namespace App\Http\Livewire;

	use Illuminate\Http\Response;
	use Illuminate\Notifications\DatabaseNotification;
	use Livewire\Component;

	class CommentNotifications extends Component {

		const NOTIFICATION_TRESHOLD = 10;
		public $notifications;
		public $notificationCount;
		public $isLoading;

		protected $listeners = ['getNotifications'];

		public function mount ()
		{
			$this->notifications = collect( [] );
			$this->isLoading = true;
			$this->getnotificationCount();
		}

		public function getNotifications ()
		{
			$this->notifications = auth()->user()->unreadNotifications()->latest()->take
				(self::NOTIFICATION_TRESHOLD)->get();


			$this->isLoading = false;
		}

		public function getNotificationCount ()
		{
			$this->notificationCount = auth()->user()->unreadNotifications()->count();

			if ( $this->notificationCount > self::NOTIFICATION_TRESHOLD )
			{
				$this->notificationCount = self::NOTIFICATION_TRESHOLD. '+';
			}
		}

		public function markAsRead ( $notificationId )
		{
			if (auth()->guest()) {
				abort(Response::HTTP_FORBIDDEN);
			}

			$notification = DatabaseNotification::findOrFail($notificationId);
			$notification->markAsRead();

			return redirect()->route('idea.show', [
				'idea' => $notification->data['idea_slug']
			]);
		}

		public function markAllAsRead ()
		{
			if (auth()->guest()) {
				abort(Response::HTTP_FORBIDDEN);
			}
			auth()->user()->unreadNotifications->markAsRead();
			$this->getNotificationCount();
			$this->getNotifications();
		}

		public function render ()
		{
			return view( 'livewire.comment-notifications' );
		}

	}
