from os import system
print("Este script ejecutará los comandos necesarios para iniciar el proyecto")
system("npm install")
system("npm update")
system("composer install")
system("composer update")
system("php artisan key:generate")
system("php artisan storage:link")
system("php artisan migrate:fresh --seed")