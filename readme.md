# Question answer forum using Laravel Framework(5.3).

This project somehow works like stackoverflow.com. A registered user can submit a question and other users can submit answer to the question. It has features like multiple tags to questions, comments to questions, comments to answers, view all questions of a user, view all questions of a particular tag.

Installation

git clone https://github.com/icodeweb/question-answer-forum-using-laravel <br>
cd question-answer-forum-using-laravel <br>
composer install <br> 
cp .env.example .env  <br>
update your .env file with database information  <br>
php artisan key:generate  <br>
php artisan migrate <br> 
php artisan db:seed  <br>
Open the application in browser  <br>
