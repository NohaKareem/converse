#Texting Web App
This is a texting web app built for courses 6000, 6001 and 6005. 

## Tech stack
* Laravel
* Vue.js 
* MySQL

## Set-up
* database name: **converse**
* server name: root
* password: root 

* run ```npm-install```

## Run migrations + seeds
* ```php artisan migrate```
* ```php artisan db:seed``` (only populates user accounts)

## Note
* Reset password links are sent to .log file found in storage/logs path

## Relationships
* 1:1 user:profile 
* 1:m user:posts
* 1:m post:comments
* 1:m user:comments

## Axios code
* in resources/js/app.js
* 

## Helpful learning resources
* build Instagram-like laravel app https://www.youtube.com/watch?v=ImtZ5yENzgE
* authorization https://laracasts.com/series/laravel-6-from-scratch
* more on authorization https://laracasts.com/series/laravel-from-scratch-2018/episodes/27
* query builder for axios https://pineco.de/instant-ajax-search-laravel-vue/