<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite('resources/js/app.js')
	<title>Login</title>
	<style>
		.bg-image {
			background: url(bg-right.png), url(bg-center.png), url(bg-left.png);
			background-repeat: no-repeat, no-repeat, no-repeat;
			background-position: top right, center, bottom left;
			background-color: black;
		}
	</style>
</head>

<body>
	<main class="grid grid-cols-1 md:grid-cols-5 min-h-screen">
		<div class="hidden md:grid col-span-2 place-items-center content-center space-y-4 items-center justify-center text-white bg-image">
			<div class="flex space-x-2">
				<svg class="w-8 h-8 flex-shrink-0 w-6 h-6 text-sky-500 transition duration-75" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M2.7 15V9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M10.05 2.53001L4.03002 6.46001C2.10002 7.72001 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73001 19.98 6.47001L13.99 2.54001C12.91 1.82001 11.13 1.82001 10.05 2.53001Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M5.63012 13.08L5.62012 17.77C5.62012 19.04 6.60012 20.4 7.80012 20.8L10.9901 21.86C11.5401 22.04 12.4501 22.04 13.0101 21.86L16.2001 20.8C17.4001 20.4 18.3801 19.04 18.3801 17.77V13.13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg>

				<span class="self-center text-md">ClassMonitor</span>
			</div>
			<h2 class="text-2xl font-md">Welcome Back!</h2>
			<p class="text-wrap w-60 text-center">Please, provide your log in details in the form.</p>
		</div>
		<div class="grid md:col-span-3 content-center sm:mx-auto sm:w-full sm:max-w-sm py-4 px-6">

			<h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>

			<div class="sm:mx-auto sm:w-full sm:max-w-sm space-y-2">
				<form class="space-y-4" action="/login" method="POST">
					@csrf

					<div>
						<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
						<div>
							<input id="email" name="email" type="email" autocomplete="email" placeholder="Enter email address" required value="{{old('email')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
						</div>
						@error('email')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<div class="flex items-center justify-between">
							<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>

						</div>
						<div>
							<input id="password" name="password" type="password" autocomplete="current-password" placeholder="Enter password" required value="{{old('password')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
						</div>
						@error('password')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<button type="submit" class="flex w-full justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Login</button>
					</div>
				</form>

				<p class="text-center text-sm text-gray-500">
					Don't have an account?
					<a href="/register" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">Sign up</a>
				</p>
				<p class="text-center text-sm">

					<a href="/forgot-password" class="font-semibold text-sky-400 hover:text-sky-500">Forgotten your password?</a>
				</p>
			</div>
		</div>
	</main>
	<x-flash-message />
</body>

</html>