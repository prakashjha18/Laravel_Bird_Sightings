
**php version >7.1**
1)in htdocs:
```
git clone https://github.com/prakashjha18/Laravel_Bird_Sightings.git
```
2)Run ```composer install``` on your cmd or terminal

3) Copy ```.env.example``` file to ```.env``` on the root folder. You can type ```copy .env.example .env``` if using command prompt Windows     or ```cp .env.example .env``` if using terminal, Ubuntu
 Open your ```.env ```file and change the database name (```DB_DATABASE```) to whatever you have, username (```DB_USERNAME```) and password  (```DB_PASSWORD```) field correspond to your configuration. 
 By default, the username is ```root ```and you can leave the password field empty. (This is for Xampp) 

4) Run php artisan key:generate
5) Run php artisan migrate
6) Run php artisan serve
7) Go to localhost:8000
