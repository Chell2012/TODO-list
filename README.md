# TODO-list
1. Установка:
1) Установить в систему git, docker и docker-compose
2) git clone git@github.com:Chell2012/TODO-list.git
3) cd ./TODO-list
4) git submodule update --init --recursive
6) cp .env.example .env
7) Произвести необходимые настройки laravel
5) cd laradock
6) cp .env.example .env
7) Произвести необходимые настройки mysql, php-fpm, nginx в .env
8) docker-compose up -d nginx mysql
9) docker-compose exec workspace bash
10) composer install
11) php artisan key:generate
12) php artisan migrate
13) npm install
14) npm run build

2. Запросы для проверки API


```bash
curl -X POST http://localhost:8000/api/register \                                                                                                   
     -H "Accept: application/json" \
     -d '{
           "name": "John Doe",
           "email": "johndoe@example.com",
           "password": "1Password",
           "password_confirmation": "1Password"
         }'

curl -X POST http://localhost:8000/api/login \                                                                                                      
     -H "Accept: application/json" \
     -d '{
           "email": "johndoe@example.com",
           "password": "1Password" 
         }'
         
curl -X POST http://localhost:8000/api/dashboard \
     -H "Accept: application/json" \
     -d '{
           "title": "John Doe",
           "text": "johndoe@example.com",
           "tags": ["tag1", "tag2", "tag3"],
           "api_token": "your token"
         }'

curl -X PUT http://localhost:8000/api/dashboard/8 \
     -H "Accept: application/json" \
     -d '{
           "title": "John Doe1",
           "text": "johndoe1@example.com",
           "tags": ["tag1", "tag2", "tag4"],
           "api_token": "your token"
         }'
         
curl -X DELETE http://localhost:8000/api/dashboard/8 \
     -H "Accept: application/json"\
     -d '{"api_token": "your token"}'
