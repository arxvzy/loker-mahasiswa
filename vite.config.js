import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    // server: {
    //     host: "0.0.0.0", // or use your specific local IP address
    //     port: 5173,
    //     hmr: {
    //         host: "192.168.102.243", // replace with your local IP address
    //     },
    // },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
