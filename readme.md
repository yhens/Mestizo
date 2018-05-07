# Laravel

## About this application

#### Framework: Laravel 5.5
#### Language: PHP 7.0*

## Install
- Type this line:
```
composer update
```

- To change Database go to "config/database.php" and then change database. Default Database is SQLite.

- Migrate Database by typing this:
```
php artisan migrate
```


- To Add new user go to "app\Http\Controllers\Auth\RegisterController.php" comment this line 
```
public function showRegistrationForm()
    {
        return redirect('login');
    }

    public function register()
    {

    }
```
in bottom of the page. Then go to /register by web browser. Fill the form. 
- Again uncomment that line to hide registration page.
