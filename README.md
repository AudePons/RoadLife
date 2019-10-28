![alt tag](https://zupimages.net/up/19/43/t3kv.png)
## The project
RoadLife is a project developed by MASTERE first-year students as part of the Ydays. We chose to create a web application capable of geolocating the trucks of a delivery company.
![alt-tag](https://zupimages.net/up/19/43/7mb1.jpg)
## Frameworks, Library & Tools
* [Bootstrap](https://getbootstrap.com/)
* [FontAwesome](https://fontawesome.com/)
* [JQuery](https://jquery.com/)
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
* [Building](https://fontawesome.com/icons/building?style=solid)
* [Check circle](https://fontawesome.com/icons/check-circle?style=solid)
* [City](https://fontawesome.com/icons/city?style=solid)
* [Database](https://fontawesome.com/icons/database?style=solid)
* [Download](https://fontawesome.com/icons/download?style=solid)
* [Eraser](https://fontawesome.com/icons/eraser?style=solid)
* [Envelope](https://fontawesome.com/icons/envelope?style=solid)
* [Facebook](https://fontawesome.com/icons/facebook-square?style=brands)
* [Github](https://fontawesome.com/icons/github-square?style=brands)
* [Pen alt](https://fontawesome.com/icons/pen-alt?style=solid)
* [Phone](https://fontawesome.com/icons/phone?style=solid)
* [Plus circle](https://fontawesome.com/icons/plus-circle?style=solid)
* [Question circle](https://fontawesome.com/icons/question-circle?style=solid)
* [Sign out](https://fontawesome.com/icons/sign-out-alt?style=solid)
* [Thumbtack](https://fontawesome.com/icons/thumbtack?style=solid)
* [Times circle](https://fontawesome.com/icons/times-circle?style=solid)
* [Trick moving](https://fontawesome.com/icons/truck-moving?style=solid)
* [Twitter](https://fontawesome.com/icons/twitter-square?style=brands)
* [User](https://fontawesome.com/icons/user?style=solid)
* [Users](https://fontawesome.com/icons/users?style=solid)
* [User check](https://fontawesome.com/icons/user-check?style=solid)
* [User cog](https://fontawesome.com/icons/user-cog?style=solid)
* [Warehouse](https://fontawesome.com/icons/warehouse?style=solid)
* [Wpforms](https://fontawesome.com/icons/wpforms?style=brands)
## Project architecture
* **dist :** Contains all design elements, database processing or mapping.
* **config.php :** Page to manage the database of the application.
* **doc.php :** User Documentation Page.
* **gestion_sub.php :** User Account Rights Management File.
* **index.php :** Application Home Page.
* **logout.php :** Page to destroy user sessions.
* **profil.php :** Page to edit the profile.
* **subscribe.php :** Page to register on the site.
## Module descriptions
### Sign in & Sign up
![alt-tag](https://zupimages.net/up/19/43/cvww.png)
``` 
### The user has the opportunity to:
   - Log in, and will be careful of his username and password.
   - Register and will need to determine his name, surname, nickname, e-mail and password.
```
### Manage database
![alt-tag](https://zupimages.net/up/19/43/gl6y.png)
``` 
### If the user is an administrator, he will have the opportunity to:
   - Add a new driver
   - Add a new production site
```
### Manage users
![alt-tag](https://zupimages.net/up/19/43/1uxb.png)
``` 
### If the user is an administrator, he will be able to manage the users of the application : 
   - Enable or disable accounts.
```
### Edit user account
![alt-tag](https://www.zupimages.net/up/19/43/qp7y.png)
``` 
### The user has the possibility to modify his personal information: name, first name, passeword and e-mail.
```
### Check drivers
![alt-tag](https://www.zupimages.net/up/19/43/uzhn.png)
``` 
### The user has the possibility to control certain aspects related to the delivery trucks. He will be able to:
   - View the current position of a driver.
   - Visualize thanks to the clusters all the movements of the drivers.
   - View the production sites.
   - Export an XML file.
```
## Authors
* [Hakim MAKHTOUR](https://github.com/Hakimono)
* Aude PONS
