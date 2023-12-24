import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/daterangepicker.css",
                "resources/js/app.js",
                "resources/js/jquery.js",
                "resources/js/datatables.min.js",
                "resources/js/moment.min.js",
                "resources/js/daterangepicker.min.js",
                "resources/js/chart.js",
            ],
            refresh: true,
        }),
    ],
});
