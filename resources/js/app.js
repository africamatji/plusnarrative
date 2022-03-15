require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from "@inertiajs/progress";
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

InertiaProgress.init();

Vue.use(Vuetify);

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
      Vue.use(plugin)
  
      new Vue({
        vuetify: new Vuetify(),
        render: h => h(App, props),
      }).$mount(el)
    },
  })