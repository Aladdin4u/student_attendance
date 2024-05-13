<x-list :data=$section>
    <x-list-item label="Session">
        <path d="M8 2V5 M16 2V5 M3.5 9.08997H20.5 M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z M15.6947 13.7H15.7037 M15.6947 16.7H15.7037 M11.9955 13.7H12.0045 M11.9955 16.7H12.0045 M8.29431 13.7H8.30329 M8.29431 16.7H8.30329" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
    </x-list-item>
    <x-list-card>
        <x-list-card-item label="Create Session" link="/sections/create" />
        <x-list-card-item label="View All Session" link="/sections/manage" />
    </x-list-card>
</x-list>
<x-list :data=$faculty>
    <x-list-item label="Faculty">
        <path d="M13 22H5C3 22 2 21 2 19V11C2 9 3 8 5 8H10V19C10 21 11 22 13 22Z M10.11 4C10.03 4.3 10 4.63 10 5V8H5V6C5 4.9 5.9 4 7 4H10.11Z M14 8V13 M18 8V13 M17 17H15C14.45 17 14 17.45 14 18V22H18V18C18 17.45 17.55 17 17 17Z M6 13V17 M10 19V5C10 3 11 2 13 2H19C21 2 22 3 22 5V19C22 21 21 22 19 22H13C11 22 10 21 10 19Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
    </x-list-item>
    <x-list-card>
        <x-list-card-item label="Create Faculty" link="/faculties/create" />
        <x-list-card-item label="View All Faculty" link="/faculties/manage" />
    </x-list-card>
</x-list>
<x-list :data=$department>
    <x-list-item label="Department">
        <path d="M13 22H5C3 22 2 21 2 19V11C2 9 3 8 5 8H10V19C10 21 11 22 13 22Z M10.11 4C10.03 4.3 10 4.63 10 5V8H5V6C5 4.9 5.9 4 7 4H10.11Z M14 8V13 M18 8V13 M17 17H15C14.45 17 14 17.45 14 18V22H18V18C18 17.45 17.55 17 17 17Z M6 13V17 M10 19V5C10 3 11 2 13 2H19C21 2 22 3 22 5V19C22 21 21 22 19 22H13C11 22 10 21 10 19Z" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
    </x-list-item>
    <x-list-card>
        <x-list-card-item label="Create Department" link="/departments/create" />
        <x-list-card-item label="View All Department" link="/departments/manage" />
    </x-list-card>
</x-list>
<x-list :data=$level>
    <x-list-item label="Level">
        <path d="M3.5 18V7C3.5 3 4.5 2 8.5 2H15.5C19.5 2 20.5 3 20.5 7V17C20.5 17.14 20.5 17.28 20.49 17.42 M6.35 15H20.5V18.5C20.5 20.43 18.93 22 17 22H7C5.07 22 3.5 20.43 3.5 18.5V17.85C3.5 16.28 4.78 15 6.35 15Z M8 10.5H13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </x-list-item>
    <x-list-card>
        <x-list-card-item label="Create Level" link="/levels/create" />
        <x-list-card-item label="View All Level" link="/levels/manage" />
    </x-list-card>
</x-list>
<x-list :data=$lectures>
    <x-list-item label="Lecturers">
        <path d="M10.05 2.53001L4.03002 6.46001C2.10002 7.72001 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73001 19.98 6.47001L13.99 2.54001C12.91 1.82001 11.13 1.82001 10.05 2.53001Z M5.63012 13.08L5.62012 17.77C5.62012 19.04 6.60012 20.4 7.80012 20.8L10.9901 21.86C11.5401 22.04 12.4501 22.04 13.0101 21.86L16.2001 20.8C17.4001 20.4 18.3801 19.04 18.3801 17.77V13.13 M21.3999 15V9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </x-list-item>
    <x-list-card>
        <x-list-card-item label="Create Lecturers" link="/lecturers/create" />
        <x-list-card-item label="View All Lecturers" link="/lecturers/manage" />
    </x-list-card>
</x-list>
<x-list :data=$student>
    <x-list-item label="Students">
        <path d="M12.1601 10.87C12.0601 10.86 11.9401 10.86 11.8301 10.87C9.45006 10.79 7.56006 8.84 7.56006 6.44C7.56006 3.99 9.54006 2 12.0001 2C14.4501 2 16.4401 3.99 16.4401 6.44C16.4301 8.84 14.5401 10.79 12.1601 10.87Z M7.15997 14.56C4.73997 16.18 4.73997 18.82 7.15997 20.43C9.90997 22.27 14.42 22.27 17.17 20.43C19.59 18.81 19.59 16.17 17.17 14.56C14.43 12.73 9.91997 12.73 7.15997 14.56Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </x-list-item>
    <x-list-card>
        <x-list-card-item label="Create Students" link="/students/create" />
        <x-list-card-item label="View All Students" link="/students/manage" />
    </x-list-card>
</x-list>
<x-list :data=$course>
    <x-list-item label="Courses">
        <path d="M3.5 18V7C3.5 3 4.5 2 8.5 2H15.5C19.5 2 20.5 3 20.5 7V17C20.5 17.14 20.5 17.28 20.49 17.42 M6.35 15H20.5V18.5C20.5 20.43 18.93 22 17 22H7C5.07 22 3.5 20.43 3.5 18.5V17.85C3.5 16.28 4.78 15 6.35 15Z M8 10.5H13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </x-list-item>
    <x-list-card>
        <x-list-card-item label="Create Courses" link="/courses/create" />
        <x-list-card-item label="View All Courses" link="/courses/manage" />
    </x-list-card>
</x-list>