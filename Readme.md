# Rahatlatıcı Sesler App

This project is a REST api for "Rahatlatıcı Sesler" application. Users can some actions on this app. That actions are their can add their selected musics to thier favorite list and can listen their musics on favorite list.

This application is REST api interface for other applications reach Library, Favorite datas and Music metadatas.  

-----

Bu proje Rahatlatıcı Sesler Uygulaması için bir REST Api'dır. Bu uygulamada kullanıcılar __Kitaplıktan__ seçtikleri __Müzikleri__ favorilerine alıp __Favorilerinde__ listelenen __Müzikleri__ dinleyebilecekler. 

Bu uygulama ise Uygulamaların Kitaplık ve Favori listelerini alabilecekleri Müzik Meta datalarına ulaşabilecekleri REST Arayüzü sunacaktır.

## Installation

```bash
git clone https://github.com/ahmethelvaci/relaxing-sounds.git
cd relaxing-sounds
docker-compose up --build
```

Create Tables and Seed
```bash
docker exec -it challence_api_fpm composer install --no-dev
docker exec -it challence_api_fpm php artisan migrate:fresh --seed
```


## Endpoints 

Postman Documenter : [https://documenter.getpostman.com/view/834718/SW18wvPZ]

### Start

Taking token for app
```
POST http://localhost:8000/api/start
```
#### Headers
```
Content-Type: application/json
Accept: application/json
```
#### Body
```json
{"name":"test","version":"1.0"}
```
#### Response
```json
{
    "result": {
        "api_token": "uZHW...jNNj6jYuX",
        "version": "update"
    },
    "errorMessage": null,
    "errorCode": 200
}
```

---
### Library

List of Relaxing Sounds Libraries
```
GET http://localhost:8000/api/libraries 
```
#### Headers
```
Accept: application/json
Authorization: Bearer uZHW...jNNj6jYuX
```
#### Response
```json
{
    "result": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "Consequatur non sit.",
                "image": "https://lorempixel.com/640/480/?14192",
                "created_at": "2019-11-10 22:39:33",
                "updated_at": "2019-11-10 22:39:33"
            },
            ...
        ],
        "first_page_url": "http://localhost:8000/api/libraries?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/libraries?page=1",
        "next_page_url": null,
        "path": "http://localhost:8000/api/libraries",
        "per_page": 10,
        "prev_page_url": null,
        "to": 10,
        "total": 10
    },
    "errorMessage": null,
    "errorCode": 200
}
```
---
List Sounds of this Library 
```
GET http://localhost:8000/api/libraries/{id} 
```
#### Headers
```
Accept: application/json
Authorization: Bearer uZHW...jNNj6jYuX
```
#### Response
```json
{
    "result": {
        "current_page": 1,
        "data": [
            {
                "id": 9,
                "name": "Tenetur saepe sint.",
                "src": "http://schmeler.com/mollitia-praesentium-quo-ut-perspiciatis",
                "created_at": "2019-11-10 15:10:11",
                "updated_at": "2019-11-10 15:10:11"
            },
            ...
        ],
        "first_page_url": "http://localhost:8000/api/libraries/1?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http://localhost:8000/api/libraries/1?page=2",
        "next_page_url": "http://localhost:8000/api/libraries/1?page=2",
        "path": "http://localhost:8000/api/libraries/1",
        "per_page": 10,
        "prev_page_url": null,
        "to": 10,
        "total": 17
    },
    "errorMessage": null,
    "errorCode": 200
}
```
---
### Sound
Get Metadata of this Sounds
```
GET http://localhost:8000/api/sounds/{id} 
```
#### Headers
```
Accept: application/json
Authorization: Bearer uZHW...jNNj6jYuX
```
#### Response
```json
{
    "result": {
        "id": 1,
        "name": "Deserunt commodi iste.",
        "src": "http://www.wunsch.biz/et-dolore-dignissimos-aut-et-sint-animi",
        "created_at": "2019-11-10 22:39:33",
        "updated_at": "2019-11-10 22:39:33"
    },
    "errorMessage": null,
    "errorCode": 200
}
```
---
Add Sound to Favorites List
```
POST http://localhost:8000/api/sounds/{id}/favorites
```
#### Headers
```
Accept: application/json
Authorization: Bearer uZHW...jNNj6jYuX
```
#### Response
```json
{
    "result": {
        "status": true
    },
    "errorMessage": null,
    "errorCode": 201
}
```
---
Subtract Sound from Favorites List
```
DELETE http://localhost:8000/api/sounds/{id}/favorites
```
#### Headers
```
Accept: application/json
Authorization: Bearer uZHW...jNNj6jYuX
```
#### Response
```json
{
    "result": {
        "status": true
    },
    "errorMessage": null,
    "errorCode": 200
}
```
---
### Favorites
List Sounds of Favorites
```
GET http://localhost:8000/api/favorites 
```
#### Headers
```
Accept: application/json
Authorization: Bearer uZHW...jNNj6jYuX
```
#### Response
```json
{
    "result": {
        "current_page": 1,
        "data": [
            {
                "id": 23,
                "name": "Ex fuga unde.",
                "src": "https://www.luettgen.org/placeat-voluptatem-sunt-quisquam-ullam",
                "created_at": "2019-11-10 22:39:33",
                "updated_at": "2019-11-10 22:39:33"
            },
            ...
        ],
        "first_page_url": "http://localhost:8000/api/favorites?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http://localhost:8000/api/favorites?page=2",
        "next_page_url": "http://localhost:8000/api/favorites?page=2",
        "path": "http://localhost:8000/api/favorites",
        "per_page": 10,
        "prev_page_url": null,
        "to": 10,
        "total": 20
    },
    "errorMessage": null,
    "errorCode": 200
}
```