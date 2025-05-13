Installation
Make sure that you have setup the environment properly (install xampp). You will need minimum PHP 8.2, MySQL, and composer.

Download the project (or clone using GIT)
Copy _.env.example_ into _.env_ and configure your database credentials
Go to the project's root directory using terminal window/command prompt
Run _composer install_
Set the application key by running _php artisan key:generate_
Run migrations _php artisan migrate_
Run migrations _php artisan db:seed_
Add stripe api keys
Add mailtrap api keys
If you want to use google login configure googel api and servies to login (optional)
Start local server by executing php artisan serve
Visit here http://127.0.0.1:8000 to test the application

login using admin ( email : admin@admin.com, password : 12345678)
Register to login as simple investor 
