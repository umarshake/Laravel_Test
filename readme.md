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


## Library used
1. Guzzle Http - for http api request
2. Image intervention - for change image constraints like size
3. jquery datatable - for listing stored properties
4. Bootstrap Library- for frontend styling 

## Approach
 - Fetching a data from api using a service class to fetch the data.
 - Create a job to process and store each page of data into the Database
 - Queuing each job , so that there will be a less on processing.
 

## Thing done
1. Fetch the data from ap and storing inside the database
2. Listing of Properties fetched from the api.
3. Adding a new Property and creating a thumnails on image uploaded for the Property.
4. Editing the Property Details

## Improvements
1. Front end validation.
2. More Precise Backend validation.
3. Query searching on Properties based on different columns.
4. Indexing the DB tables for faster retrieval of data.
