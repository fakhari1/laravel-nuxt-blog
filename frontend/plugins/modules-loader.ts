import {defineNuxtPlugin} from '#app';

export default defineNuxtPlugin((nuxtApp) => {
    const modules = [
        'content',
        'user',
    ];

    modules.forEach(async (moduleName) => {
        const module = await import(`@/modules/${moduleName}/index.ts`);
        const composables = await import(`@/modules/${moduleName}/composables`);

        if (module.register) {
            module.register(nuxtApp);
        }

        if (composables.register) {
            composables.register(nuxtApp);
        }
    })
})