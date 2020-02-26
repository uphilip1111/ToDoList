# To Do List

## Start

1. download repository

`
$ git clone https://github.com/uphilip1111/ToDoList.git
`

2. In the docker/ folder, build Image

`
$ docker-compose build
`

3. Start container

`
$ docker-compose up -d
`

4. Install Library

`
$ docker exec -it todolist_api composer install
`

5. generate jwt secret and APP_KEY

`
$ docker exec -it todolist_api /var/www/html/app/artisan key:generate
`

`
$ docker exec -it todolist_api /var/www/html/app/artisan jwt:secret
`

6. Migrate

`
$ docker exec -it todolist_api /var/www/html/app/artisan migrate
`

7. Seeder

`
$ docker exec -it todolist_api /var/www/html/app/artisan db:seed
`

## Test

`
$ docker exec -it todolist_api /var/www/html/app/vendor/bin/phpunit
`

## Function

- [x] get all to-do lists
- [x] get one to-do list
- [x] create one to-do list
- [x] update one to-do list
- [x] delete one to-do list
- [x] delete all to-do list
- [x] generate a new token
- [x] get token status

## 

## Postman

In the postman/ folder


