# School Attendance System

A Design and development of student dashboard for monitoring and evaluating students attendance to lectures.

![school-attendance-dashbord](https://github.com/Aladdin4u/jobhunt/assets/101972392/e1a54f7d-5500-4b3a-b531-6b738a80a9a1)

## How It's Made:

**Tech used:** <p>![HTML5 BADGE](https://img.shields.io/static/v1?label=|&message=HTML5&color=23555f&style=plastic&logo=html5) ![CSS BADGE](https://img.shields.io/static/v1?label=|&message=CSS3&color=285f65&style=plastic&logo=css3) ![JAVASCRIPT BADGE](https://img.shields.io/static/v1?label=|&message=JAVASCRIPT&color=3c7f5d&style=plastic&logo=javascript) ![REACT BADGE](https://img.shields.io/static/v1?label=|&message=LARAVEL&color=red&style=plastic&logo=laravel) ![BOOTSTRAP BADGE](https://img.shields.io/static/v1?label=|&message=BOOTSRAP&color=purple&style=plastic&logo=bootstrap) ![TAILWINDCSS BADGE](https://img.shields.io/static/v1?label=%7C&message=TAILWIND&color=15b8c5&style=plastic&logo=tailwindcss)</p>

## Optimizations

One of the first thing I would do improve the architectures and design patterns to increase reusability and maintainability and constant refacturing of the code.

## Lessons Learned:

I utilized building a well structured UML(Unified Modeling Language) diagram to visually represent the architecture, design, and implementation of the system. Also implement Yajra DataTables to manage querying and sorting and searching of data.

## Installation:

1. Clone repo
1. Run `cp .env.example .env`
1. composer install
1. Run `npm intall`
1. Set up Database configuration inside .env file
1. Run `php artisan key:generate --show` Copy the output for **APP_KEY** inside the .env file
1. Run the migration and seeder `php artisan migrate --seed`
1. Run `npm run build` to compile our JS, CSS for Blade templates

## Usage:

1. Run `php artisan serve`
1. navigate to [http://localhost:8000](http://localhost:8000)

