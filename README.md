# Final Project: Notepad-Style Contacts App

This is a final project based on a notepad-style contacts application, featuring database (BBDD) storage,  
user session handling, and user management.  
### Built for fun and learning purposes.

###### repository link (ignore this):
###### https://github.com/Eduu115/contacts-app.git

# ------------------------------------------------------------------------------------------------------------------------------------------------

# [ES] INSTRUCCIONES DE USO:

En la carpeta sql hay un script llamado setup.sql que incluye tanto la creacion de tablas (builder) como
Datos y usuarios para popular las tablas (populate). Por lo que tras haber cargado el script en el sql se creara toda la infraestructura
respectiva a la BBDD

#### USUARIOS Y CONTRASEÑAS (Para testing)

El mismo scrpit cuenta con usuarios creados con diversos contactos y direcciones por si se quiere hacer el testing sin introducir y
crear todo a mano, facilitando el uso

# ------------------------------------------------------------------------------------------------------------------------------------------------

# [EN] USE INSTRUCTIONS:

In the `sql` folder, there is a script named `setup.sql` that includes both the creation of tables (builder) and  
data and users to populate the tables (populate). Therefore, after loading the script into SQL, the entire infrastructure  
related to the database will be created.

#### USERS AND PASSWORDS (For testing)

The same script includes users with various contacts and addresses, in case you want to perform testing without having to manually  
enter and create everything, making it easier to use.

# ------------------------------------------------------------------------------------------------------------------------------------------------

###### [ES] Me ha resultado muy complicado conseguir que al introducir algo que en la validacion era incorrecto (en las direcciones) sea redirigido correctamente a la misma pagina con los mismos datos introducidos en la URL y asi no perder informacion o introducirla erronea y evitando fallos, lo he conseguido con mucho trabajo y tras una investigacion y asignando las variables segun tengan o no datos, si vienen de POST, que el valor de la variable sea el que viene del POST y con el GET igual. Ademas, he trabajado en que al hacer el header para el redirect, lo haga al gestor de direcciones, junto a los datos previamente enviados en la URI

##### © 2025 Eduardo Serrano. All rights reserved.

This codebase and all related files are the intellectual property of Eduardo Serrano.  
Unauthorized use, distribution, or reproduction of any part of this repository is strictly prohibited.  
This project is hosted privately and is not intended for public or commercial use without explicit permission.
