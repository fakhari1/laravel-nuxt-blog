import {defineNuxtRouteMiddleware} from "#app";
import {createRouter, createWebHistory} from "#vue-router";
import routes from '@/modules/user/routes/routes';
import auth from '@/modules/user/store/auth';

export function register(app: any) {
    routes.forEach((route) => {
        app.router.addRoute({
            path: route.path,
            component: route.component
        })
    });

    app.router.addRouteMiddleware('auth', () => import('@/modules/user/middleware/auth'))

    app.store.registerModule('auth', auth)

}
