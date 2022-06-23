<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Voting app</title>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

		<!-- Styles -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<livewire:styles />

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
	</head>
	<body class="text-gray-900 bg-gray-background text-sm antialiased font-sans">
		<header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
			<a href="/">Voting App</a>
			<div class="flex items-center">
				@if (Route::has('login'))
					<div class="px-6 py-4">
						@auth
							<div class="flex items-center space-x-4">

								<livewire:comment-notifications/>

								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<a class="underline text-sm text-gray-700"
									   href="{{ route('logout') }}"
									   onclick="event.preventDefault(); this.closest('form').submit();"> {{ __('Log out') }}</a>
								</form>
							</div>
						@else
							<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

							@if (Route::has('register'))
								<a href="{{ route('register') }}"
								   class="ml-4 text-sm text-gray-700 underline">Register</a>
							@endif
						@endauth
					</div>
				@endif
				<a href="#">
					<img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"
					     alt="avatar"
					     class="w-10 h-10 rounded-full">
				</a>
			</div>
		</header>

		<main class="container mx-auto max-w-custom min-h-screen flex">
			<div class="w-70 mr-5">
				<div class="bg-white sticky top-8 border-2 border-blue rounded-xl mt-16"
				     style="border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0)); border-image-slice: 1; background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0)); background-origin: border-box; background-clip: content-box, border-box;">
					<div class="text-center px-6 py-2 pt-6">
						<h3 class="font-semibold text-base">Add an idea</h3>
						<p class="text-xs mt-4">
							@auth
								Let us know what you would like
							@else
								Please login to create an Idea
							@endauth
						</p>
					</div>
					@auth
						<livewire:create-idea />
					@else
						<div class="my-6 text-center flex flex-col items-center space-y-2 justify-center">
							<a href="{{ route('login') }}"
							   class="block justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
								<span class="">Login</span>
							</a>
							<a href="{{ route('register') }}"
							   class="block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
								Sign up
							</a>
						</div>
					@endauth

				</div>
			</div>
			<div class="w-175">
				<livewire:status-filters />

				<div class="mt-8">
					{{ $slot }}
				</div>
			</div>
		</main>

		<livewire:scripts />
	</body>
</html>
