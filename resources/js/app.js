require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp }from "vue";
import App from "./components/followbutton.vue";

window.Alpine = Alpine;
createApp({})
.component('followbutton',App)
.mount('#app');

Alpine.start();
