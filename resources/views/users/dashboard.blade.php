<x-layout>
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-lg font-semibold">Overview</h1>
        <button class="flex items-center justify-center py-1 px-4 rounded-md bg-sky-500 text-white">
            <span class="mr-2">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M5.1998 9.60005C5.09372 9.60005 4.99198 9.55791 4.91696 9.48289C4.84195 9.40788 4.7998 9.30614 4.7998 9.20005C4.7998 9.09396 4.84195 8.99222 4.91696 8.91721C4.99198 8.84219 5.09372 8.80005 5.1998 8.80005H10.7998C10.9059 8.80005 11.0076 8.84219 11.0826 8.91721C11.1577 8.99222 11.1998 9.09396 11.1998 9.20005C11.1998 9.30614 11.1577 9.40788 11.0826 9.48289C11.0076 9.55791 10.9059 9.60005 10.7998 9.60005H5.1998ZM5.1998 12C5.09372 12 4.99198 11.9579 4.91696 11.8829C4.84195 11.8079 4.7998 11.7061 4.7998 11.6C4.7998 11.494 4.84195 11.3922 4.91696 11.3172C4.99198 11.2422 5.09372 11.2 5.1998 11.2H10.7998C10.9059 11.2 11.0076 11.2422 11.0826 11.3172C11.1577 11.3922 11.1998 11.494 11.1998 11.6C11.1998 11.7061 11.1577 11.8079 11.0826 11.8829C11.0076 11.9579 10.9059 12 10.7998 12H5.1998Z M8.9479 0.800049H3.5999C3.28164 0.800049 2.97642 0.926477 2.75137 1.15152C2.52633 1.37656 2.3999 1.68179 2.3999 2.00005V14C2.3999 14.3183 2.52633 14.6235 2.75137 14.8486C2.97642 15.0736 3.28164 15.2 3.5999 15.2H12.3999C12.7182 15.2 13.0234 15.0736 13.2484 14.8486C13.4735 14.6235 13.5999 14.3183 13.5999 14V5.76165C13.5998 5.46123 13.4871 5.17176 13.2839 4.95045L9.8327 1.18885C9.72023 1.06625 9.58349 0.968369 9.43117 0.901437C9.27885 0.834504 9.11428 0.799977 8.9479 0.800049ZM3.1999 2.00005C3.1999 1.89396 3.24205 1.79222 3.31706 1.71721C3.39207 1.64219 3.49382 1.60005 3.5999 1.60005H8.9479C9.00341 1.59999 9.05832 1.61148 9.10914 1.63379C9.15996 1.6561 9.20558 1.68875 9.2431 1.72965L12.6943 5.49125C12.7621 5.56498 12.7998 5.66147 12.7999 5.76165V14C12.7999 14.1061 12.7578 14.2079 12.6827 14.2829C12.6077 14.3579 12.506 14.4 12.3999 14.4H3.5999C3.49382 14.4 3.39207 14.3579 3.31706 14.2829C3.24205 14.2079 3.1999 14.1061 3.1999 14V2.00005Z M8.8 5.60005H13.2C13.3061 5.60005 13.4078 5.64219 13.4828 5.71721C13.5579 5.79222 13.6 5.89396 13.6 6.00005C13.6 6.10614 13.5579 6.20788 13.4828 6.28289C13.4078 6.35791 13.3061 6.40005 13.2 6.40005H8.4C8.29391 6.40005 8.19217 6.35791 8.11716 6.28289C8.04214 6.20788 8 6.10614 8 6.00005V1.20005C8 1.09396 8.04214 0.992221 8.11716 0.917206C8.19217 0.842192 8.29391 0.800049 8.4 0.800049C8.50609 0.800049 8.60783 0.842192 8.68284 0.917206C8.75786 0.992221 8.8 1.09396 8.8 1.20005V5.60005Z" fill="white" />
                </svg>
            </span>

            Export</button>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
        <x-card>
            <x-slot:title>
                Total Students
                </x-slot>
                <x-slot:desc>
                    {{$allStudent}}
                    </x-slot>
                    <x-slot:icon>
                        <svg class="flex-shrink-0 w-6 h-6 transition duration-75" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11C16.46 10.99 16.37 10.99 16.28 11 M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z M18.3401 20C19.0601 19.85 19.7401 19.56 20.3001 19.13C21.8601 17.96 21.8601 16.03 20.3001 14.86C19.7501 14.44 19.0801 14.16 18.3701 14" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        </x-slot>
        </x-card>
        @unless(auth()->user()->role != "admin")
        <x-card>
            <x-slot:title>
                Total Lecturers
                </x-slot>
                <x-slot:desc>
                    {{$allLecturer}}
                    </x-slot>
                    <x-slot:icon>
                        <svg class="flex-shrink-0 w-6 h-6 transition duration-75" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.05 2.53001L4.03002 6.46001C2.10002 7.72001 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73001 19.98 6.47001L13.99 2.54001C12.91 1.82001 11.13 1.82001 10.05 2.53001Z M5.63012 13.08L5.62012 17.77C5.62012 19.04 6.60012 20.4 7.80012 20.8L10.9901 21.86C11.5401 22.04 12.4501 22.04 13.0101 21.86L16.2001 20.8C17.4001 20.4 18.3801 19.04 18.3801 17.77V13.13 M21.3999 15V9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </x-slot>
        </x-card>
        @else
        <x-card>
            <x-slot:title>
                Total Classes
                </x-slot>
                <x-slot:desc>
                    {{$classes}}
                    </x-slot>
                    <x-slot:icon>
                        <svg class="flex-shrink-0 w-6 h-6 transition duration-75" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.05 2.53001L4.03002 6.46001C2.10002 7.72001 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73001 19.98 6.47001L13.99 2.54001C12.91 1.82001 11.13 1.82001 10.05 2.53001Z M5.63012 13.08L5.62012 17.77C5.62012 19.04 6.60012 20.4 7.80012 20.8L10.9901 21.86C11.5401 22.04 12.4501 22.04 13.0101 21.86L16.2001 20.8C17.4001 20.4 18.3801 19.04 18.3801 17.77V13.13 M21.3999 15V9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </x-slot>
        </x-card>
        @endunless
        <x-card>
            <x-slot:title>
                Semeter
                </x-slot>
                <x-slot:desc>
                    {{$semester}}
                    </x-slot>
                    <x-slot:icon>
                        <svg class="flex-shrink-0 w-6 h-6 transition duration-75 " viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2V5 M16 2V5 M3.5 9.08997H20.5 M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z M15.6947 13.7H15.7037 M15.6947 16.7H15.7037 M11.9955 13.7H12.0045 M11.9955 16.7H12.0045 M8.29431 13.7H8.30329 M8.29431 16.7H8.30329" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </x-slot>
        </x-card>
        <x-card>
            <x-slot:title>
                Sessions
                </x-slot>
                <x-slot:desc>
                    {{$section}}
                    </x-slot>
                    <x-slot:icon>
                        <svg class="flex-shrink-0 w-6 h-6 transition duration-75 " viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2V5 M16 2V5 M3.5 9.08997H20.5 M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z M15.6947 13.7H15.7037 M15.6947 16.7H15.7037 M11.9955 13.7H12.0045 M11.9955 16.7H12.0045 M8.29431 13.7H8.30329 M8.29431 16.7H8.30329" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        </x-slot>
        </x-card>
    </div>
    <div class="flex flex-col space-y-4 mb-4">
        <div>
            <h2 class="text-lg font-semibold">Analytics</h2>
            <p class="text-sm text-gray-500">Students total attendance anlytics report</p>
        </div>
        <div class="bg-white space-y-4 px-4 py-3 rounded-lg">
            <div class="flex items-center justify-between">
                <h2 class="text-md font-semibold">Total Students Attendance</h2>
                <div class="relative inline-block group">

                    <button id="dropdownHoverButton" class="bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-200" type="button">Courses <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div class="z-10 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700 group-hover:block">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            @unless($courses->isEmpty())
                            <li>
                                <a href="?" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All</a>
                            </li>
                            @foreach($courses as $course)
                            <li title="{{$course->title}}">
                                <a href="?course_id={{$course->id}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$course->code}}</a>
                            </li>
                            @endforeach
                            @else
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">No course</a>
                            </li>
                            @endunless
                        </ul>
                    </div>

                </div>
            </div>
            <canvas id="myChart" style="width:100%;" class="bg-white px-3 py-5">
            </canvas>
        </div>
    </div>
</x-layout>
<script>
    var attendance = JSON.parse('{!! json_encode($attendance) !!}');
    const countMap = {}
    attendance.filter(p => p.status === 'present').map(d => {
        if (countMap[d.date] === undefined) {
            countMap[d.date] = 1;
        } else {
            countMap[d.date]++;
        }
    })
    $(document).ready(function() {
        const myChart = new Chart("myChart", {
            type: "line",
            data: {
                labels: Object.keys(countMap).map((key) => moment(key).format('ddd')),
                datasets: [{
                    label: 'Student Attendance',
                    data: Object.keys(countMap).map((key) => countMap[key]),
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        title: {
                            display: true,
                            text: "Number of students present"
                        },
                        beginAtZero: true,
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Days of the week"
                        }
                    }
                }
            }
        });

    });
</script>