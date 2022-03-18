require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp, Link } from '@inertiajs/inertia-vue'
import { InertiaProgress } from "@inertiajs/progress";
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import Layout from './Layout'
import PublicLayout from './PublicLayout'

InertiaProgress.init();

Vue.use(Vuetify);
Vue.component("inertia-link", Link);

createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default
        if (page.layout !== undefined) {
            //page.layout = PublicLayout;
            page.layout = page.layout || Layout
        }
        
        return page
    },
    setup({ el, App, props, plugin }) {
      Vue.use(plugin)
  
      new Vue({
        vuetify: new Vuetify(),
        render: h => h(App, props),
      }).$mount(el)
    },
  })