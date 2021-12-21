<h3 align="center" style="color: yellow;">AIDSH</h3>

## The project

### Description :

AIDSH is a website allowing heroes to know their missions, edit their profile thanks to the use of an API of [Superheroapi](https://www.superheroapi.com/).

### Built With :

This project was carried out with the use of the following languages :

* SYMFONY
* BOOSTRAP


## Getting Started

### Installation :

- Clone the repo

   ```sh
   git clone git@github.com:IIM-Creative-Technology/symfony-fifi-dev.git
   ```
  
 - Open the project and install the composer dependencies
 
   ```sh
      npm install
      ```
      
- Edit the .env file with your database login informations

- Run the website
   ```sh
         symfony server:start
         ```

- start your mysql/db server Run the following command to create your db
   
   ```sh
      php bin/console doctrine:database:create
      ```
      
- Migrate the data in the database 

   ``sh
         php bin/console doctrine:migrations:diff 
         ```
   ```sh
   php bin/console doctrine:migrations:migrate 
   ```
         
- Load the fixtures for users & missions

   ```sh
   php bin/console doctrine:fixtures:load 
   ```

- You can check the database in order to find the user with the role admin & connect to the backoffice using the password:

      ```sh
      password
      ```

### Contributing :

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

- Fork the Project
- Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
- Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
- Push to the Branch (`git push origin feature/AmazingFeature`)
- Open a Pull Request


## Credits :


- BAZANA NTOMO Fideline `https://github.com/fifi-dev`

Pour toute question vous pouvez me joindre via l'adresse : `fideline_bzn@yahoo.com`


## Acknowledgements

* [SB Admin](https://startbootstrap.com/previews/sb-admin-2)

##  Licence

<a align="center"  rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licence Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />Ce(tte) œuvre est mise à disposition selon les termes de la <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Licence Creative Commons Attribution - Pas d’Utilisation Commerciale 4.0 International</a>.

