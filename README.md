
## StrongMinds API

Servers both Data Collection App and Datahub on the web

## Setting up
- Clone the project to your machine by ```git clone git@github.com:made-by-people/strongminds-api.git```
- Navigate to the root folder and install the necessary dependencies by ```composer install```
- Create your ```.env``` file, then copy the contents of ```.env.example```(remember to update your user credentials)
- Create your database 
- Run migrations ```php artisan migrate```
- Seed the database ```php artisan db:seed```
- Setup scribe ```php artisan scribe:generate```
- Now serve your application ```php artisan serve```
- Head over to ```localhost:8000/docs```` to start engaging the API endpoints

