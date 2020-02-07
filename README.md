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

</ol>

<h1>Project Design Logics:</h1>

<h3>Database Table Structures:</h3>

<p>Schema::create('users', function (Blueprint $table) {<br>
            $table->bigIncrements('id');<br>
            $table->string('name');<br>
            $table->string('email')->unique();<br>
            $table->timestamp('email_verified_at')->nullable();<br>
            $table->string('password');<br>
            $table->string('access_right')->default('U');<br>
            $table->rememberToken();<br>
            $table->timestamps();<br>
        });<br>
    </p>

<p>Schema::create('scores', function (Blueprint $table) {<br>
            $table->bigIncrements('id');<br>
            $table->unsignedBigInteger('user_id');<br>
            $table->string('level');<br>
            $table->integer('score')->unsigned();<br>
            $table->boolean('authorize')->default(0);<br>
            $table->timestamps();<br>
            $table->foreign('user_id')->references('id')->on('users');<br>
        });<br>

</p>
<p>
<h3>Functional Logic:</h3>

<h4>If(public user)</h4>
	View all admin authorized score record.<br>
<h4>If( registered user)</h4>
	Can view, create and update own score records but not able to authorize. <br>
<h4>If(Admin User) </h4>
	Can view, create and update all score records but able to authorize to view for general public.<br>

</p>

<p>Thanks.<br> Niaz</p>


