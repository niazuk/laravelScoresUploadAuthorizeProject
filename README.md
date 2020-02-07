<h1>Step by Step Instructions</h1>

<p>Following this guide will help you install and run the project.</p>

<ol>
	<li>Clone the project from GitHub and link is https://github.com/niazuk/laravelScoresUploadAuthorizeProject.git </li>

<li>Copy .env.example and save as .env</li>

<li>Change .env file Database, Username and Password. Also give a App_name. <br>

       APP_NAME= <br>

DB_CONNECTION=mysql <br>
DB_DATABASE= <br>
DB_USERNAME= <br>
DB_PASSWORD= <br>
</li>


<li>Install composer with the command in cmd or Git Bash.<br>

Composer install <br>
</li>

<li>Create table and seed some fake date with following command.<br>

Php artisan migrate:fresh –seed<br>
</li>

<li>Runing server command<br>

Php artisan serve <br>

</li>

<li> Create few users from the website register page.</li>

<li>Go to phpMyAdmin user table and change a user Access_right field to “A” to create a admin user.</li>

<li>Use the functionality of the project.</li>


<p>Thanks.<br> Niaz</p>


