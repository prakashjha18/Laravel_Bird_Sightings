
**php version >7.1**

1) in htdocs:
```
git clone https://github.com/prakashjha18/Laravel_Bird_Sightings.git
```
2) Run ```composer install``` on your cmd or terminal

3) Copy ```.env.example``` file to ```.env``` on the root folder. You can type ```copy .env.example .env``` if using command prompt Windows     or ```cp .env.example .env``` if using terminal, Ubuntu
 Open your ```.env ```file and change the database name (```DB_DATABASE```) to whatever you have, username (```DB_USERNAME```) and password  (```DB_PASSWORD```) field correspond to your configuration. 
 By default, the username is ```root ```and you can leave the password field empty. (This is for Xampp) 

4) Run php artisan key:generate
5) Run php artisan migrate
6) Run php artisan serve
7) Go to localhost:8000

this is a simple CRUD application to build an application with a graphical interface to manage and maintain a list of Bird Sightings.

# Users of your application should be able to:

1. View the list of existing Bird Sightings and all of their details including: "Bird Species", "Date of Sighting", "Number Sighted" and "Location","map"
2. Add new Bird Sightings via a Form or equivalent
3. Delete individual Bird Sighting records
4. Edit/Change any and all details of each Bird Sighting record in the list
5. Enabled with pagination
6. use of enhanced UI like a "Map" for selecting the "Location", allowing uploading a "Photo" for each "Bird Sighting",
