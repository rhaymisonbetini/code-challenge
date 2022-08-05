# code-challenge

![alt text](https://github.com/rhaymisonbetini/ashiley-neural-network/blob/main/public/prints/document.jpg)

## Install

Clone your repository using the command: <br/>
```
git clone https://github.com/rhaymisonbetini/code-challenge.git
cd code-challenge
```
In this project we upgraded the sqlite database to Mysql. This way we will have a <br/> 
database closer to the real work environment. <br/>

After cloned the repository, let's configure our env file. <br/>
Copy the env file below and change the data from the database to your Mysql local connection<br/>
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
