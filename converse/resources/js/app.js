/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
(function() {
	"use strict";
    // live search in app.blade.php

    // display posts 
    function loadPosts() {
        axios.get('/api/get-posts')
            .then(function(response) { 
                const searchResults = response.data;
                // console.log(searchResults);
                // console.log(response);
                const postsCon = document.querySelector('#searchPostsCon');
                postsCon.innerHTML = '<div class="postsCon">'; 

                for(let i = 0; i < searchResults.length; i++) {
                    const postItem  = 
                    '<a href="/posts/' + searchResults[i]['id'] + '">' +
                        '<div class="post">' + 
                            '<div class="postImage" style="background:url(' + searchResults[i]['imageUri'] + ')"></div>' +
                                '<h1>' + searchResults[i]['title'] + '</h1>' +
                        '</div>' + 
                    '</a>';
                    postsCon.innerHTML += postItem;
                }
                postsCon.innerHTML += '</div>';
            }).catch(function(error) {
                console.log(error);
        });
    }
    loadPosts();


})();

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});