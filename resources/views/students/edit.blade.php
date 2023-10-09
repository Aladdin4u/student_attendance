<h1>edit students</h1>
<form method="POST" action="/students">
            @csrf
            <div class="mb-6">
                <label for="firstName" class="inline-block text-lg mb-2">First Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="firstName" placeholder="First Name" value="{{$student->firstName}}" />
                @error('firstName')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="lastName" class="inline-block text-lg mb-2">Last Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lastName" placeholder="Last Name" value="{{$student->lastName}}" />
                @error('lastName')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="otherName" class="inline-block text-lg mb-2">Other Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="otherName" placeholder="Other Names" value="{{$student->otherName}}" />
                @error('otherName')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="regNumber" class="inline-block text-lg mb-2">Reg Number</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="regNumber" placeholder="Registration Number" value="{{$student->regNumber}}" />
                @error('regNumber')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="level" class="inline-block text-lg mb-2">
                    Level
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="level" placeholder="Level" value="{{$student->level}}" />
                @error('level')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Save
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>