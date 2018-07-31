
<h2>To start project we need</h2>
<ul>
   <p>After fetch project</p>
   <li>cd ~/project-dir</li>
   <li>composer install</li>
   <li>php artisan key:generate</li>
  <li>composer require laravel/passport</li>
  <li>php artisan migrate</li>
  <li>php artisan passport:install <i>copy past the scond generate key for password</i>
  <b>Past key in Http/controller/Api/AuthController in line 45</b> client_secret => API_KEY
  </li> 
  
  
  <h3>Import file</h3>
  I import to mongo after i exported csv format for use in mysql database
  I create this code in database/seeds/DatabaseSeeder, so we must to <b>php artisan db:seed</b>
  
  
  <h4>I use Passport for Authentication</h4>
  
  <h4>For this feature I can dislike a shop, so it won’t be displayed within “Nearby Shops” list during the next 2 hours</h4>
  <p>I use Job ShopJob that run every 2h</p>
</ul>

<h3 style="color: red">Must also active localization in google chrome</h3>


I hope i didn't forget anything ;)
