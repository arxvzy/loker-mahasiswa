/** @type {import('tailwindcss').Config} */
import preset from "./vendor/filament/support/tailwind.config.preset";
export default {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins", "Monserrat", "sans-serif"],
            },
            colors: {
                primary: "#8dc3b1",
                secondary: "#4d908c",
            },
        },
    },
    plugins: [
        require("daisyui"),
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
