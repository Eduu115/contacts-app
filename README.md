# Final Project: Contacts App

This is a final project based on a notepad-style contacts application, featuring database (BBDD) storage,  
user session handling, and user management.  
### Built for fun and learning purposes.

###### repository link (ignore this):
###### https://github.com/Eduu115/contacts-app.git

---

# [ES] INSTRUCCIONES DE USO:

En la carpeta sql hay un script llamado setup.sql que incluye tanto la creacion de tablas (builder).
Por lo que tras haber cargado el script en el sql se creara toda la infraestructura respectiva a la BBDD.

#### USUARIOS Y CONTRASEÑAS (Para testing)

El mismo scrpit cuenta con unicamente la creacion de las tablas y BBDD, si se quiere hacer el testing se ha de crear todo a mano,esto es debido
a que con la privacidad que se ofrece, las contraseñas estan protegidas por algoritmos de encriptacion hash, gestionado con PHP, y no se permite
crear contraseñas e insertarlas directamente en el SQL ya que el PHP al iniciar sesion, trata de desencriptar esa misma contraseña, que de
ser introducida en el SQL no estaria encriptada por lo que no funcionaria

**ES IMPORTANTE QUE LOS USUARIOS SE DEBEN REGISTRAR A MANO** ya que la contraseña se cifra en hash y no la puedo incluir en el SQL 
explicitamenete ,ya que el encriptado se gestiona en PHP

**RESUMEN** : SE HA DE CREAR USUARIOS, CONTACTOS Y DIRECCIONES A MANO.

---

# [EN] USAGE INSTRUCTIONS:

In the `sql` folder, there is a script called `setup.sql` which includes both the creation of tables (builder).

Therefore, after loading the script into SQL, the entire infrastructure related to the database will be created.


#### USERS AND PASSWORDS (For testing)

The script only includes the creation of the database and tables. If testing is to be done, everything must be created manually.  
This is due to the level of privacy offered — passwords are protected using hash encryption algorithms handled by PHP, and it's not allowed to create passwords and insert them directly into SQL.  
When logging in, PHP tries to decrypt the password, and if it were manually inserted into the SQL without being encrypted, it wouldn’t work.

**IT IS IMPORTANT THAT USERS MUST BE REGISTERED MANUALLY** since the password is hashed and cannot be explicitly included in the SQL, as encryption is handled by PHP.

**SUMMARY:** USERS, CONTACTS, AND ADDRESSES MUST BE CREATED MANUALLY.

---

###### [ES] Me ha resultado muy complicado conseguir que al introducir algo que en la validacion era incorrecto (en las direcciones) sea redirigido correctamente a la misma pagina con los mismos datos introducidos en la URL y asi no perder informacion o introducirla erronea y evitando fallos, lo he conseguido con mucho trabajo y tras una investigacion y asignando las variables segun tengan o no datos, si vienen de POST, que el valor de la variable sea el que viene del POST y con el GET igual. Ademas, he trabajado en que al hacer el header para el redirect, lo haga al gestor de direcciones, junto a los datos previamente enviados en la URI

##### © 2025 Eduardo Serrano. All rights reserved.

This codebase and all related files are the intellectual property of Eduardo Serrano.  
Unauthorized use, distribution, or reproduction of any part of this repository is strictly prohibited.  
This project is hosted privately and is not intended for public or commercial use without explicit permission.
