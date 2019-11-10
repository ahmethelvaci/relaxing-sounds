# Rahatlatıcı Sesler App

Bu proje Rahatlatıcı Sesler Uygulaması için bir REST Api'dır. Bu uygulamada kullanıcılar __Kitaplıktan__ seçtikleri __Müzikleri__ favorilerine alıp __Favorilerinde__ listelenen __Müzikleri__ dinleyebilecekler. 

Bu uygulama ise Uygulamaların Kitaplık ve Favori listelerini alabilecekleri Müzik Meta datalarına ulaşabilecekleri REST Arayüzü sunacaktır.

## Endpointler

### Login
```
 - Taking token for app
POST api/login
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
```
### Favorites
```
- List Sounds of Favorites
GET api/favorites 

- Add Sound to Favorites List
POST api/favorites/sounds/{id} 

- Subtract Sound from Favorites List
DELETE api/favorites/sounds/{id} 
```