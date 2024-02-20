# konecta-php
 Prueba de codigo para Konecta
 
 # Como iniciar?
 Se requiere del software Docker, PHP, y Composer para poder iniciar este software.
 
 Tiene que estar el programa de Docker funcionando en el fondo para comenzar.

 Para iniciar, solo hay que dar doble clic en el archivo "iniciar_programa.bat"

 La aplicacion web se encuentra en la url localhost:8000/categorias

 Una aplicacion de administracion debase de datos se encuentra en la url localhost:5050
 El usuario es admin@admin.com, la contraseña es adminpassword.

 El usuario de la base de datos es user_cafeteria, la contraseña es pass_cafeteria.
 La url donde se aloja dentro del docker es "postgres", el puerto es 5432

 #Queries Solicitadas
 La query para obtener el producto con mas stock:
 ```
 SELECT * FROM productos ORDER BY stock DESC LIMIT 1;
 ```
 La query para obtener el producto que mas se ha vendido:
 ```
 SELECT "idProducto", SUM(cantidad) AS ventasTotales
 FROM ventas v
 GROUP BY "idProducto"
 ORDER BY ventasTotales DESC
 LIMIT 1;
  ```