# code-challenge

![alt text](https://github.com/rhaymisonbetini/code-challenge/blob/main/public/shots/shot.jpg)

## Install

Clone your repository using the command: <br/>
```
git clone https://github.com/rhaymisonbetini/code-challenge.git
cd code-challenge
```
In this project we upgraded the sqlite database to Mysql. This way we will have a <br/> 
database closer to the real work environment. <br/>

After cloned the repository, let's configure our env file. <br/>
Copy the data below and create an .env file in the system root folder. Modify the database connection variables with your mysql data<br/>
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:Fb+L4iQU4lL0Sd9/XN061CqSOdELzkKsjZjGek0QAjo=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=codechallenge
DB_USERNAME=root
DB_PASSWORD=7813256

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
In your DBMS create the database informed in
DB_DATABASE of yours. <br/>

Run the following commands:<br/>
``` php artisan migrate```<br/>
The structure of our database will be created.<br/>
``` php artisan db:seed```<br/>
Our database will be populated with system data<br/>

Now with the entire system base configured, just run the command:<br/>
``` php artisan server ```<br/>
The server will be running on port 8000<br/>
http://127.0.0.1:8000<br/>

## Additional information about the project.<br/>

Project developed with Laravel9, PHP8 and Mysql.<br/>

Laravel's default design is based on MVC. Added Repositories and Services.<br/>
With this addition we leave only the business rules inside the controllers and the repository becomes the accessor of our database.<br/>
The services are responsible for providing methods that can be accessed throughout our application.<br/>
For testing purposes we used Phpunit. This by default is also built into Laravel in its latest versions <br/>
The dependency injection method was performed in the controller's constructor.
<br/>
On the front, the layout engine provided by laravel (Blade) was used. Bootstrap was also incorporated in its version 5 to give the page stylization.
<br/>
No external library was added as it was not necessary to use javascript on the front.

## Running our application tests
To perform the tests on the system it is necessary that the server is online. <br/>
Checking that our application is running, just run the command: <br/>
```./vendor/bin/phpunit ```

![alt text](https://github.com/rhaymisonbetini/code-challenge/blob/main/public/shots/test.jpg)

<br/>

## Additional project

tom-coin.
API project that consumes a blockChain in Python.
The system provides data for an application developed in ionic

<a href="https://github.com/rhaymisonbetini/tom-coin-backend" target="_blank">Tom Coin <a/> <br/>
    



