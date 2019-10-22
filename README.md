![alt tag](https://zupimages.net/up/19/43/t3kv.png)
## The project
RoadLife is a project developed by MASTERE first-year students as part of the Ydays. We chose to create a web application capable of geolocating the trucks of a delivery company.
![alt-tag](https://zupimages.net/up/19/43/7mb1.jpg)
## Frameworks, Library & Tools
* [Bootstrap](https://getbootstrap.com/)
* [FontAwesome](https://fontawesome.com/)
* [Leaflet](https://leafletjs.com/)
* [PostgreSQL](https://www.postgresql.org/)
* [WampServer](http://www.wampserver.com/)
## Graphical Charter
### The logo
The logo has been designed by Aude PONS. The choson writing font is [Monthoers Font](https://befonts.com/monthoers-font.html).
### Color pallet
* ![#343a40](https://placehold.it/15/343a40/000000?text=+) `#343a40`
* ![#0c5460](https://placehold.it/15/0c5460/000000?text=+) `#0c5460`
* ![#d1ecf1](https://placehold.it/15/d1ecf1/000000?text=+) `#d1ecf1`
* ![#721c24](https://placehold.it/15/721c24/000000?text=+) `#721c24`
* ![#f8d7da](https://placehold.it/15/f8d7da/000000?text=+) `#f8d7da`
### Fontawesome Icons
* [User Profile](https://fontawesome.com/icons/user-cog?style=solid)
* [Logout](https://fontawesome.com/icons/sign-out-alt?style=solid)
* [Driver](https://fontawesome.com/icons/user?style=solid)

## Photo Resources
All the pictures made on the site [Pixabay](https://pixabay.com/fr/) and the following users : [12019](https://pixabay.com/fr/users/12019-12019/), [AlexanderStein](https://pixabay.com/fr/users/alexanderstein-45237/), [alvaroas8a0](https://pixabay.com/fr/users/alvaroas8a0-593995/), [arunpnr](https://pixabay.com/fr/users/arunpnr-540691/), [bere69](https://pixabay.com/fr/users/bere69-3506936/), [cc-content](https://pixabay.com/fr/users/cc-content-80172/), [chengtzf](https://pixabay.com/fr/users/chengtzf-5538686/), [congerdesign](https://pixabay.com/fr/users/congerdesign-509903/), [Free-Photos](https://pixabay.com/fr/users/free-photos-242387/), [gorkhe1980](https://pixabay.com/fr/users/gorkhe1980-2469728/), [jossuetrejo_oficial](https://pixabay.com/fr/users/jossuetrejo_oficial-8361939/), [kolibri5](https://pixabay.com/fr/users/kolibri5-240538/), [Larisa-K](https://pixabay.com/fr/users/larisa-k-1107275/), [Mondschwinge](https://pixabay.com/fr/users/mondschwinge-1453918/), [nickharder](https://pixabay.com/fr/users/nickharder-324768/), [nile](https://pixabay.com/fr/users/nile-598962/), [Pexels](https://pixabay.com/fr/users/pexels-2286921/), [Ruwadium](https://pixabay.com/fr/users/ruwadium-1674203/), [slightly_different](https://pixabay.com/fr/users/slightly_different-2006397/), [teadrinker](https://pixabay.com/fr/users/teadrinker-3776864/) , [terimakasih0](https://pixabay.com/fr/users/terimakasih0-624267/), [Yuri_B](https://pixabay.com/fr/users/yuri_b-2216431/).
## Project Architecture
* dist : Contains all the images and CSS files.
* add_photo.html : Allows the addition of an image on the site.
* all_categories.html : Gallery of images representing all the themes recorded on the site.
* connexion.html : Allows you to connect with a basic account, with a Facebook, Google or Instgram account. Allows to register.
* detail_photo.html : Allows to know more about the image (author, title, description, comments, category, tags, other interesting images).
* index.html : Central page of the site. It contains a carousel, a search bar and a suggestion of images.
* profil.html : This file contains all the statistical and qualitative elements related to the user.
* search_result.html : File containing the results of the user's search.
## Graphical charter

### FontAwesome Icons
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228094046938289.png)
## Module descriptions
### Advertising space
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228094812561945.png)
``` 
### The "results" area has two advertising spaces :
  - The most loved photos.
  - The most downloaded photos
```
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228102341289501.png)
``` 
### When displaying the results of a search there are two billboards :
  - The other photos of the user
  - Similar images
```
### Comments
``` 
### A user has the opportunity to comment on a photo.
```
### Gallery
Depending on the pages, the gallery is modified. Indeed, the possible actions on an image will not be the same.
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228110301992548.png)
``` 
### On the page "index" and on the page "resulat", we have : 
  - The name of the photographer at the origin of the image.
  - The number of likes.
  - The number of downloads.
```
![aly-tag](https://nsa40.casimages.com/img/2019/02/28/190228021511252607.png)
``` 
### On the page "categories", we have : 
  - The possibility to subscribe to a category.
```
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228021752511348.png)
``` 
### On the page "profile", we have : 
  - The possibility to share the picture.
  - Update the picture.
  - Delete the picture.
```
### Log in - Sign in
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228103140378953.png)
``` 
### On the login page it is possible to :
  - Log in with a jungle account.
  - Create a jungle account.
  - Connect with Facebook, Google or Instagram.
```
### NavBar
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228103827912819.png)
``` 
### The navigation bar is divided into three parts :
  - The corporate name.
  - The search bar.
  - Information related to the connected user :
      * The history (consultations and research).
      * Subscription notifications.
      * Notifications related to messages.
      * The profile of the user (avatar and nickname), with a submenu :
          ** Profile
          ** Add a picture
          ** Log out
```
### Update profile
![alt-tag](https://nsa40.casimages.com/img/2019/03/01/190301040704469140.png)
``` 
### A logged in user has the possibility to modify his personal data :
  - Avatar.
  - Cover page.
  - Social networks (facebook, instagram, twitter).
  - Website.
  - About.
```
### User profile
![alt-tag](https://nsa40.casimages.com/img/2019/02/28/190228105229269142.png)
``` 
### The header of the profile page is divided into five main parts :
  - Parameters
  - User informations (country, date of registration, number of subscribers, website).
  - Statistics (number of photos uploaded, number of likes total, total number of downloads).
  - Social networks (facebook, instagram, twitter).
  - The share buttons.
  - The corporate name.
```
## Authors
* [Hakim MAKHTOUR](https://github.com/Hakimono)
* Mohamed ALAMI
* [Nelly LASSEGUE](https://github.com/Nelly95)
* Aude PONS
