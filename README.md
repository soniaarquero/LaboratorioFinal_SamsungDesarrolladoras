# Laboratorio Final. Samsung Desarrolladoras
Código Laboratorio Final Samsung Desarrolladoras. Validación de formulario y operaciones CRUD en la base de datos MySQL

Se crea un formulario de alta a una página web, una base de datos con una tabla y los campos necesarios para guardar la información y un script PHP que valide los datos, los guarde en dicha tabla y permita su consulta.

Incluidos los códigos .html, .css, .js, .php y .sql para el desarrollo de la práctica final.
 

En el front-end:

Crearemos un formulario con los siguientes campos:

-        Nombre

-        Primer apellido

-        Segundo apellido

-        email

-        Login

-        Password

 <img width="633" alt="Captura de Pantalla 2023-06-10 a las 23 25 43" src="https://github.com/soniaarquero/LaboratorioFinal_SamsungDesarrolladoras/assets/52462946/a16b3db6-60ac-4168-aaa1-d917ccbb4139">


En este ejercicio se debe implementar una doble validación, tanto desde html como desde PHP. Se comprobará que todos los campos estén correctamente llenos antes de enviar los datos a una base de datos MySQL.

El campo email deberá tener el formato de correo electrónico válido.

El campo password deberá tener una extensión entre 4-8 caracteres.

Si los datos están correctamente introducidos, al darle a enviar se creará un registro en nuestra BBDD con los datos introducidos. De lo contrario se avisará al usuario con un mensaje claro sobre el problema y se volverá a ejecutar de nuevo el formulario de registro.

<img width="610" alt="Captura de Pantalla 2023-06-10 a las 23 26 27" src="https://github.com/soniaarquero/LaboratorioFinal_SamsungDesarrolladoras/assets/52462946/7f0b0e8a-cc4b-4a29-8801-bfb08a7d48ca">

<img width="456" alt="Captura de Pantalla 2023-06-10 a las 23 26 41" src="https://github.com/soniaarquero/LaboratorioFinal_SamsungDesarrolladoras/assets/52462946/c284a924-0ba1-40de-9aaa-88bd112a583a">
 

BBDD:

Se deberá crear una BBDD con la tabla y los campos necesarios para guardar la información recibida.

Una vez que hemos creado la base de datos, podemos comenzar a trabajar en el script PHP que se encargará de validar el formulario y realizar las operaciones de consulta en la base de datos.

<img width="663" alt="Captura de Pantalla 2023-06-10 a las 23 28 03" src="https://github.com/soniaarquero/LaboratorioFinal_SamsungDesarrolladoras/assets/52462946/34c59d96-6f17-4ebd-9a2f-decc37b5e760">

 

En el Back-end:

Se deberán crear el script PHP necesario para validar los datos recibidos desde front-end.

Si el mail del usuario introducido ya estaba en nuestra BBDD se avisará al usuario con un mensaje claro sobre el problema y se volverá a ejecutar de nuevo el formulario de registro.

Si los datos son correctos y el usuario introducido no está ya dado de alta, aparecerá un mensaje que nos muestre la frase “Registro completado con éxito”, los datos se guardarán en la tabla de nuestra BBDD y aparecerá un botón “consulta” que, al pulsarlo, nos dará una lista de los usuarios registrados en nuestra BBDD.

<img width="710" alt="Captura de Pantalla 2023-06-10 a las 23 27 36" src="https://github.com/soniaarquero/LaboratorioFinal_SamsungDesarrolladoras/assets/52462946/166cf8f3-a3d8-4081-90fb-8447f0666aec">

En resumen, el ejercicio de programación en PHP consiste en crear una página que permita el registro de datos en un formulario HTML, validar los datos ingresados, almacenarlos en una base de datos MySQL y permitir la consulta de los registros.
