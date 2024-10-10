

export default defineNuxtRouteMiddleware((to, from) => {
    // if (!userAuthenticated()) {
    if (false) {
        return navigateTo('/login');
    }
})