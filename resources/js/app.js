require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
//let notification = new Audio(require(''))
//window.notification = new Audio(require(''))
import { createApp } from 'vue'

import Formulaire from './components/formulaire.vue';
const app = createApp({})
app.component('formulaire', Formulaire)

app.mount('#app')
