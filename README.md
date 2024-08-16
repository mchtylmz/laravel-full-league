<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.
Laravel is accessible, powerful, and provides tools required for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Packages
```
composer require pharaonic/laravel-settings
 
-------

// Way 1 
settings()->status = false;
 
// Way 2 
settings()->set('off_message', 'Maintenance');
 
// Way 3 
settings()->set([
    'status'        => true,
    'off_message'   => 'Maintenance'
]);
 
// Save all settings  
settings()->save();
```
---
```
composer require zoha/laravel-meta
 
-------

use Zoha\Metable;

class Post extends Model
{
    use Metable;
    ...
}
$post->createMeta('key' , 'value');

$post->updateMeta('key' , 'new value');

$post->setMeta('key' , 'value'); // create meta

$post->setMeta('key' , 'new value'); // update meta

//return meta value or null if meta not exists
$post->getMeta('key');

// return value or 'default value ' if not exists or value is null
$post->getMeta('key' , 'default value');

$result = Post::whereMeta('key','value');
// you can use operator :
$result = Post::whereMeta('key', '>' , 100);

// you can use multiple whereMeta Clause
$result = Post::whereMeta('key', '>' , 100)
                            ->whereMeta('key' , '<' , 200);
//orWhereMeta clause
$result = Post::whereMeta('key', '>' , 100)
                            ->orWhereMeta('key' , '<' , 50);
//branched clauses
$result = Post::where(function($query){
    $query->where(function($query){
        $query->whereMeta('key1' , 'value1');
        $query->orWhereMeta('key1' , 'value2');
    });
    $query->whereMeta('key2' , 'like' , '%value%');
    $query->WhereMeta('key3' , '>' , 100);
});
```
---
```
composer require izniburak/laravel-auto-routes
php artisan vendor:publish --provider="Buki\AutoRoute\AutoRouteServiceProvider"
 
-------

Route::auto('/test', 'TestController');
# OR
Route::auto('/test', TestController::class);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * URL: "/test/foo-bar"
     * This method will only work with 'GET' method. 
     */
    public function getFooBar(Request $request)
    {
        // your codes
    }
    
    /**
     * URL: "/test/bar-baz"
     * This method will only work with 'POST' method. 
     */
    public function postBarBaz(Request $request)
    {
        // your codes
    }
}
```
---
```
composer require lorisleiva/laravel-actions
 
-------

class PublishANewArticle
{
    use AsAction;

    public function handle(User $author, string $title, string $body)
    {
        
    }

    public function asController(Request $request)
    {
        
    }

    public function asListener(NewProductReleased $event)
    {
        
    }
}

PublishANewArticle::run($author, 'My title', 'My content');

Route::post('articles', PublishANewArticle::class);

Event::listen(NewProductReleased::class, PublishANewArticle::class);
event(new NewProductReleased($manager, 'Product title', 'Product description'));
```
---
```
composer require jantinnerezo/livewire-alert
[i] https://livewire-alert.jantinnerezo.com/
 
-------

@livewireScripts

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />

$this->alert('question', 'How are you today?', [
    'showConfirmButton' => true,
    'confirmButtonText' => 'Good',
    'onConfirmed' => 'confirmed' 
]);
```
---
```
 composer require spatie/laravel-permission
 php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider
 
-------

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // ...
}

$user->assignRole('writer');
$user->assignRole('writer', 'admin');
$user->assignRole(['writer', 'admin']);

Route::group(['middleware' => ['can:publish articles']], function () { ... });
Route::group(['middleware' => ['role:manager']], function () { ... });
```

