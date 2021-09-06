## Steps to run the project

- git clone git clone https://github.com/umarshake/laravel_test.git
- cd laravel_test/
- create a database as "laravel_test"
- migrate the tables type command 
     **php artisan migrate**
- make directory  **storage/app/thumbnails**

- to run the server type command
     **php artisan serve**
    - main routes
        - /dashboard
- to fech all properties from and api type command
     **php artisan queue:work**  // to run the queue worker
     **php artisan command:fetch-properties** // to run the command

