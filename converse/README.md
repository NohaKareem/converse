# Converse social app
This is a social web app built for courses 6000, 6001 and 6005 where users could share posts and comment on them. 

## Set-up
* database name: **converse**
* server name: root
* password: root 

* run ```npm-install```

## Run migrations + seeds to sample load data
* ```php artisan migrate```
* ```php artisan db:seed``` 

## Axios code location
* in resources/js/app.js

## Note
* Reset password links are sent to .log file found in storage/logs path
* For search with multiple post results, consider the query **nature**

## Relationships
* 1:m user:posts
* 1:m post:comments
* 1:m user:comments

## Tech stack
* Laravel
* MySQL
* axios

## Helpful learning resources
* build Instagram-like laravel app https://www.youtube.com/watch?v=ImtZ5yENzgE
* authorization https://laracasts.com/series/laravel-6-from-scratch
* more on authorization https://laracasts.com/series/laravel-from-scratch-2018/episodes/27
* query builder for axios https://pineco.de/instant-ajax-search-laravel-vue/