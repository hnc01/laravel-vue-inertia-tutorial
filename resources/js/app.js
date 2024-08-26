import './bootstrap';

import { createApp, h } from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/vue3'
import Layout from "./Layouts/Layout.vue";
import {ZiggyVue} from "../../vendor/tightenco/ziggy";

createInertiaApp({
    title: (title) => `${title} Vue Tutorial`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page =  pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el)
    },
    progress: {
        // The color of the progress bar...
        color: 'red',
        // Whether to include the default NProgress styles...
        includeCSS: true,
        // Whether the NProgress spinner will be shown...
        showSpinner: false,
    },
})
