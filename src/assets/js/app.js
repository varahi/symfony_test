/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

import Vue from 'vue';
import Items from './components/Items';
import Categories from './components/Categories';

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// start the Stimulus application
//import '../bootstrap';

new Vue({
    el: '#app',
    render: h => h(Items)
});

new Vue({
    el: '#cat',
    render: h => h(Categories)
});
