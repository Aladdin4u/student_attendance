<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite('resources/css/app.css')
	<title>Login</title>
</head>

<body class="h-full">
	<main class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
		<div class="sm:mx-auto sm:w-full sm:max-w-sm border rounded-xl py-12 px-6">

			<div class="sm:mx-auto sm:w-full sm:max-w-sm">
				<img class="mx-auto h-16 w-auto" src={{asset("avatar.png")}} alt="Your Company">
				<h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
			</div>

			<div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
				<form class="space-y-6" action="/login" method="POST">
					@csrf
					<div>
						<label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
						<div class="mt-2">
							<select name="role" id="role" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
								<option value="" class="hover:bg-sky-100">-- select role --</option>
								<option value="admin" class="hover:bg-sky-100">Admin</option>
								<option value="lecturer" class="hover:bg-sky-100">Lecturer</option>
							</select>
						</div>
						@error('role')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
						<div class="mt-2">
							<input id="email" name="email" type="email" autocomplete="email" placeholder="Enter email address" required value="{{old('email')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
						</div>
						@error('email')
						<x-alert>{{$message}}</x-alert>
						@enderror
					</div>

					<div>
						<div class="flex items-center justify-between">
							<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
							<div class="text-sm">
								<a href="/forgot-password" class="font-semibold text-sky-400 hover:text-sky-500">Forgot password?</a>
							</div>
						</div>
						<div class="mt-2">
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

				<p class="mt-2 text-center text-sm text-gray-500">
					Don't have an account?
					<a href="/register" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">Sign up</a>
				</p>
			</div>
		</div>
	</main>
	<x-flash-message />
</body>

</html>