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
				<h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Reset Password?</h2>
			</div>

			<div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
				<form class="space-y-6" action="/reset-password" method="POST">
					@csrf

					<div class="sr-only">
						<label for="token" class="block text-sm font-medium leading-6 text-gray-900">token</label>
						<div class="mt-2">
							<input id="token" name="token" type="text" value="{{$token}}" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
						</div>
					</div>

					<div>
						<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
						<div class="mt-2">
							<input id="email" name="email" type="email" autocomplete="email" placeholder="Enter email address" required value="{{Request::get('email')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
						</div>
						@error('email')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
						<div class="mt-2">
							<input id="password" name="password" type="password" autocomplete="current-password" placeholder="Enter password" required value="{{old('password')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
						</div>
						@error('password')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
						<div class="mt-2">
							<input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" placeholder="Enter password" required value="{{old('password')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
						</div>
						@error('password_confirmation')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<button type="submit" class="flex w-full justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Reset Password</button>
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