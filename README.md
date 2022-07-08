

# Laravel

## Setup
* Install xamp
* Install VSCode
* Download composer installer and instll it. Check whether installed by running command (composer)
* Open cmd and run command (composer global require "laravel/installer=~1.1") to install laravel. Check whether installed by command (laravel)
* Open cmd from location (xamp/htdoc) and create first project by command (laravel new projectName)

## Create first project:
* Open cd at c://xampp/htdoc and run command "Laravel new MyFirstProj" to create project
* Go inside project folder by Cd MyFirstProj and open project by code .
* Start development server and load project by Php artisan serve

Above command will start development server, copy URL and open in browser

## Project Directory Structure

**Directories**
**App folder**
Console => Kernel.php: It holds artisan our custom commands. For example we already run a build in command php artisan serve. However we can create our custom commands.
Exception => Handler.php: It is used to write an exception handler if you want to handle any exception.
Http: It contains all controllers and middleware.
Http => Kernel.php: All middlewares are configured in this file.
Models: It contains all models classes that represents database tables
Providers: It contains providers of all external/internal packages.

**Bootstrap**
Cache: This is not CSS framework bootstrap rather it contains a cache used to load laravel app quickly
App.php: Used to register services (As services are registered in program.cs for DI)

**Config**
	It contains all configuration files

**Database**
Migration: Used to create tables in database (Same as CodeFirst in .net)
Factories+Seeders: Used to create fake data when we run application in testing mode

**Public**
	It contains resources/file used to load first as .htaccess, favicon.ico, index.php, robots.txt

**Routes**
	It contains all routes
Web.php handle all websites routes
Api.php handle all API routes
Channel.php used for broadcasting (No need to beginners level)

**Resources**
	It contains all css, js files and all views returned to browser

**Storage**
	Used for local storage

**Test**
	Used for unit testing. All test cases are written in this.

**Venders**
	Contains all packages

**Files**
.env
	Used to set all environments

**Composer.json**
	It contains information about all packages




## Blade Template
Blade is a template engine provided by laravel. It has its own structure as conditional statements, loops.
Template engine displays the view part in the browser. Many other languages provide their own template engine.

{{ $data }} 	Display text only
{!! $data !!} 	Display rendered html also.

## Controller
There are 3 types of controllers in laravel, basic, single action and resource controller

Create new Basic Controller
php artisan make:controller DemoController

Create new Single Action Controller
php artisan make:controller DemoCotroller --invokable

Create new Resource Controller (Most Important)
php artisan make:controller DemoController --resource

Bootstrap 5 & Font Awesome Snippets
VSCode extension for bootstrap snippet shortcuts

**Create Controller**

Create new Basic Controller
php artisan make:controller DemoController

Create new Single Action Controller
php artisan make:controller DemoCotroller --invokable

Create new Resource Controller (Most Important)
php artisan make:controller DemoController --resource

## Laravel Components
command is : php artisan make:component input
Two files will be created:
first class based file Input.php will be created in App->View/Component
second input.blade.php will be created in Resources->views->Component
Use component in any blade view by passing parameters like
<x-input type="text" name="name" label="Please Enter Your Name" :demo="$demo" />


## Migration
First refresh cache by command php artisan config:cache
Migration: php artisan migrate

Create table using migration
php artisan make:migration create_customers_table
php artisan migrate
To revert previous operation command is php artisan migrate:rollback
php artisan migrate:refresh   delete all tables and create again

Add new column in a table (customers is table name, not model class name)
php artisan make:migration add_column_to_customers_table
It will create a new migration, 
add new column in new migration under up function
Or to delete existing column from table, add this column in down function
run command php artisan migrate

## Model (to create db tables)
Each model (php class) is mapped to a db table
M of model must be capital
create model by php artisan make:model Customer
Add two protected files in this model. First is the table name and second is its primary key.

Create model and its migration by
php artisan make:model Product --migraion

## Routing through button/anchor
Url Routing
NamedRouting

## Create Custom helper
A php file contains important reusable functions or configurations.
create a helper.php file under the app folder. Now add this file path in 
composer.json for auto loading in all files. create key under autoload as
"files": [ "app/helper.php""]
Now run command composer dump-autoload. Composer will reset its setting and 
include new added files in its configurations. Now run app and you will see
that helper.php will load in all views blade files.

## Mutator and Accessor in laravel
Mutator modify data going to the database. For example user enter name as 
"joHn smith", however you want to store it in the database as "John Smith". For
We will create a mutator function in the model class.
Its name would be set{name of attribute in db}Attribute as 
public function setNameAttribute($value){}	$value will be automatically passed to the mutator function of the attribute name.

Accessor is to modify values coming from the database. As you query data from the database and want to format before displaying to the user. So create accessore in model class.

## Session Handling
Two ways to access session
Using request
Using global array as session

## Soft Delete (Move to Trash)

Use namespace in model class mapping to database table as in my case I use it in Customer.php model as use Illuminate\Database\Eloquent\SoftDeletes;
//Laravel dont support multiple inheritance. As Customer class already inheriting from Model class
    //so we cannot inherit from HasFactory and SoftDeletes classes. However, we can use Composition by
    //using these classes inside Customer class as below
    use HasFactory;
    use SoftDeletes;

Add migration by command php artisan make:migration add_deleted_at_to_customer_table	With this command, laravel will add a new column in the customer table. 

## Laravel Collective
It is an external package used to create awesome forms. Go to https://laravelcollective.com/docs/5.2/html and copy composer require "laravelcollective/html"
And run in vscode.


## File Uploading
Upload file and receive it in controller from request object and save in uploads folder as $request->file(‘filename’)->store(‘uploads’)

## Database Seeder and Faker
To test search, delete, edit, trash, soft delete, restore features, you need dummy data. Database Seeder and Faker help you to create fake data thousands records in a few seconds.
Create Seeder by command php artisan make:seeder CustomerSeeder
In the run method, create an object of model Customer and initialize with fake data and save it. DatabaseSeeder.php runs every time so call CustomerSeeder.php form run function of DatabaseSeeder.php
Now run command php artisan db:seed
Faker gives fake values like name, email, date

## Searching in Laravel
Pagination in Laravel
Just add code in CustomerController Customer::paginate(15);
And {{ $customers->links() }} in customer view

## Route Grouping	

## Localization
Create file lang.php inside folder lang/en for english and create key value pair in associative array
Create file lang.php inside folder lang/ur for english and create key value pair in associative array
Create file lang.php inside folder lang/hi for english and create key value pair in associative array
Open config/app.php and change locals to ur for urdu and run command 
Php artisan config:cache

## Stub in Laravel
Not a beginner. Stub controls all controllers, models, migrations created by artisan command. In other words, when we create a controller/model/migrations using artisan command, from where the code is fetched. From Stub, Stube is metadata of such controllers/models/migrations.
By default, there are many stubs available in a hidden folder named Stub. You can show them by command php artisan stub:publish
You can customize any stub. For example, open controller.plain.stub and write an index function. Now create a new controller. You will see the index function in the newly created controller.

## Defining Foreign Key relationship using migration

How to create above two tables with primar-foreign key relationship using migration.
First create table group by php artisan make:migration create_group_table
Add table columns in the migration up function and migrate it by php artisan migrate.

Create other table members by php artisan make:migration create_members_table.
Add its columns and below lines to make primary-fireign key relationships.
$table->unsignedBigInteger('group_id');
//below: foreign function take column of this members table to make relation with other table
            //references function take column of other table (group)
            //on function take other table name (group)
            $table->foreign('group_id')->references('group_id')->on('group');
Then migrate it by php artisan migrate

## OneToOne and OneToMany Relationships

## Middleware
Create middleware by php artisan make:middleware MyMiddleware
Middleware names should be capitalized. 
**Route middleware** inspect all http requests for a specific route. 
Php artisan make:middleware MyRouteMiddleware
Register your route middleware in the App\Http\Kernel.php file under the $routeMiddleware property list to make it global middleware and run php artisan config:cache.
Add this middleware with the routes your want to apply like 
Route::get('/members',[IndexController::class,'getMembers'])->middleware('guard');

**Global middleware** runs for all http requests for any route. 
Php artisan make:middleware MyRouteMiddleware
Register your normal middleware in the App\Http\Kernel.php file under the $middleware property list to make it global middleware and run php artisan config:cache.
\

## Custom artisan commands
To create new artisan command, 
Create it by php artisan make:command GetDbName
GetDbName.php file would be created under app -> console -> commands


## Model Binder
It means, bind a route parameter with the model. For example, use send 2 in route, model binder search 2 primary key in customer table and return model.
