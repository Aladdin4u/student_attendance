<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite('resources/css/app.css')
	<title>Forgot Password</title>
</head>

<body class="h-full">
	<main class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-sm border rounded-xl py-12 px-6">

			<div class="sm:mx-auto sm:w-full sm:max-w-sm">
				<img class="mx-auto h-16 w-auto" src={{asset("avatar.png")}} alt="Your Company">
				<h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Forgot Password?</h2>
			</div>

			<div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
				<form class="space-y-6" action="/forgot-password" method="POST">
					@csrf

					<div>
						<x-label for="email">Email address</x-label>
						<div class="mt-2">
							<x-input id="email" name="email" type="email" autocomplete="email" placeholder="Enter email address" required value="{{old('email')}}" />
						</div>
						@error('email')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<x-button type="submit" class="w-full">Reset Password</x-button>
					</div>
				</form>

				<p class="mt-2 text-center text-sm text-gray-500">
					Back to
					<a href="/login" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">Login</a>
				</p>
			</div>
		</div>
	</main>
	<x-flash-message />
</body>

</html>