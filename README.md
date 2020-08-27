Extract the archive and put it in the folder you want

Run `cp` `.env.example .env` file to copy example file to `.env`

_**Then edit your .env file with DB credentials and other settings.**_

Run `composer install command`

Run ``php artisan migrate --seed command.``

Notice: seed is important, because it will create the first admin and 1 employee user for you.

Run `php artisan key:generate command.`

And that's it, go to your domain and login:

**`Username:	admin@domain.com
Password:	password`**

**`Username: user@domain.com
Password: password`**
