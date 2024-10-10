import {useUserFeature} from "~/modules/user/composables/useUserFeature";

export function register(app: any) {
    app.provide('useUserFeature', () => useUserFeature())
}