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
docker exec -it challence_api_fpm composer install
docker exec -it challence_api_fpm php artisan migrate:fresh --seed
```


## Endpoints 

### Start
```
 - Taking token for app
POST api/start
```
### Library
```
- List of Relaxing Sounds Libraries
GET api/libraries 

- List Sounds of this Library 
GET api/libraries/{id} 
```
### Sound
```
- Get Metadata of this Sounds
GET api/sounds/{id} 

- Add Sound to Favorites List
POST api/sounds/{id}/favorites

- Subtract Sound from Favorites List
DELETE api/sounds/{id}/favorites
```
### Favorites
```
- List Sounds of Favorites
GET api/favorites 
```