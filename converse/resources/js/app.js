/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
(function() {
	"use strict";
    var searchBar = document.querySelector("#navSearchBar");
    console.log(searchBar);

    function liveSearch(e) {
        console.log("in live search");
        var searchStr = e.currentTarget.value;
        console.log(searchStr);

        // POST method to send search query
        axios.post('/api/get-posts/?searchStr=' + searchStr)
            .then(
                function(response) { 
                    const searchResults = response.data;
                    console.log(searchResults);
                    const postsCon = document.querySelector('#searchPostsCon');
                    postsCon.innerHTML = ''; 
                    
                    for(let i = 0; i < searchResults.length; i++) {
                        console.log("image")
                        console.log(searchResults[i]['image'])
                        const item  = 
                        '<a href="/posts/' + searchResults[i]['id'] + '">' +
                            '<div>' + 
                                '<div class="searchResultImage" style="background:url(' + searchResults[i]['image'] + ')"></div>' +
                                    '<p>' + searchResults[i]['title'] + '</p>' +
                            '</div>' + 
                        '</a>';
                        postsCon.innerHTML += item;
                    }
            }).catch(function(error) {
                console.log(error);
        });
    }
    
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

    // add key up event listener for live search results
    searchBar.addEventListener("keyup", liveSearch, false);

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