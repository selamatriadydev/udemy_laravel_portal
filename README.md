<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About Portal
Portal news

## feature Portal
- Subscribers or newsletter
- Can add advertisement
- Send email to all subscribers
- Galery video and Photo
- Setting front
- Setting page
- Live channel
- Online Poll/vote
- Social Media
- news Search 
- news share 
- Related News
- Page Author (Dashbord, Post)
- reset password author
- change theme color
- google analytic
- disqus
- multi languages

## Laravel Extension
- laravel blade snippets
- laravel snippets
- laravel blade spacer
- laravel-goto-controller

## tips Portal
- laravel clear route : php artisan route:clear
- laravel clear cache : php artisan cache:clear
- laravel pagination : php artisan vendor:publish --tag=laravel-pagination


## tips upload to hosting
- make zip project
- open cpanel and open file manager
- go to folder public html or name domain
- and you see folder .well-known etc.
- and then upload file project.zip and wait for complete when bar color green with 100%
- and then extract file project.zip
- wait for completed
- remove file project.zip

## tips create database to hosting
- Go to cpanel, click mysql database
- step 1
- make database name example : project_db_name, klik next step
- step 2
- create user for database project_db_name, username example : project_db_user and password example : project_db_password
- klik create user
- step 3
- add privileges, and then click all privileges
- klik next step
- and done

## tips import database to hosting
- Go to cpanel, click phpmyadmin
- click database nama : project_db
- in phpmyamin page, click import
- after import, export your local db project.
- back to phpmyamin page, click choose file. and then search your local db. klik open
- scroll to bottom click go, wait for complete
- and then click structur. for see your tables

## tips confif index page in laravel to hosting
- step 1
- back cpanel and open file manager
- go to folder public html or name domain
- make folder name : project
- step 2
- and copy file and folder project, except folder : .well-known, project, cgi-bin,robots(file)
- move to folder project, and paste.
- step 3
- back to folder public html or name domain
- you see only folder and file : .well-known, project, cgi-bin,robots(file)
- step 4
- go to again folder project, click folder public.
- copy all folder and file and right click choose move. 
- remove name folder project : /project/public 
- click move files
- and remove folder public
- step 5
- back to folder public html or name domain
- search file index.php and right click choose edit
- page edit, in line 19 $maintenance, remove ".." and change to "project"
- page edit, in line 34 vendor/autolaod , remove ".." and change to "project"
- page edit, in line 47 bootstrap/app, remove ".." and change to "project"
- click save changes in top

## tips remove cache bootsrap in laravel to hosting
- step 1
- back cpanel and open file manager
- go to folder public html or name domain
- click folder project, move to list project
- search folder bootstrap, click folder bootstrap, move to list bootstrap
- click folder cache,  move to list folder cache
- select all file and remove 

## tips confif database in laravel to hosting
- step 1
- back cpanel and open file manager
- go to folder public html or name domain
- click folder project, move to list project
- step 2
- search file .env and right click choose edit
- change this :
- DB_DATABASE=project_db_name
- DB_USERNAME=project_db_user
- DB_PASSWORD=project_db_password
- done
- step 3
- represh page your domain, and done

## tips confif email in  hosting
- step 1
- back cpanel and open email account
- step 2
- click create
- form create email
- select domain
- input username example : project_contact
- input password example : project_laravel@v1
- scrol to bottom, click create
- back to list email, and you see : project_contact@domain-name.com

## tips test email smpt in  hosting
- step 1
- go to url : smtper.net
- step 2
- column smptp host, input 667.tmdcloud.com
- clik checkbox use secured connection
- clik checkbox use authentication
- column login, input project_contact@domain-name.com
- column password, input project_laravel@v1
- column email from, input project_contact@domain-name.com
- column email to, input project_to@gmail.com
- click send, wait for loading
- got message error or success
- if got message error change port 587 or 25, and click send again.

## tips confif email in laravel to hosting
- step 1
- back cpanel and open file manager
- go to folder public html or name domain
- click folder project, move to list project
- step 2
- search file .env and right click choose edit
- change this :
- MAIL_MAILER=smtp
- email host name copy url this page example : 667.tmdcloud.com, if you don't get the host name, just contact the hosting provider
- MAIL_HOST=667.tmdcloud.com
- MAIL_PORT=587
- MAIL_USERNAME=project_contact@domain-name.com
- MAIL_PASSWORD=project_laravel@v1
- MAIL_ENCRYPTION=ssl
- MAIL_FROM_ADDRESS=project_laravel@v1
- click save changes




