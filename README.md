**Instalacion del proyecto**

  -una vez clonado y ejecutado se debe ejecutar "composer install" y "npm install"
  
  -Modificar el archivo homestead.yaml dentro de la carpeta Homestead en el directorio raiz y añadir las rutas del proyecto y el nombre de la base de datos "crm"
  
  -En el archivo .env.example hay que modificar las siguientes constantes. 
   - DB_HOST=192.168.10.10
   - APP_URL=http://crm.test
   - DB_DATABASE=crm
   
  -Una vez cambiadas las variables refactorizamos el archivo y lo llamamos ".env"
  
  -Una vez echo todo lo anterior hay que ejecutar las migraciones con los datos de prueba con "php artisan migrate --seed"

