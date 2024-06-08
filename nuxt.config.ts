// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: false },
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  css: ["~/assets/css/main.css"],
  colorMode: {
    preference: "light",
  },
  modules: ["nuxt-icon", "@nuxt/ui", "@nuxtjs/supabase"],
  supabase: {
    redirect: false,
  },
});
