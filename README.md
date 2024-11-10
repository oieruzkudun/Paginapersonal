Este proyecto es una página web personal creada como parte del curso de Implantación de Aplicaciones Web, donde se muestra información sobre los proyectos realizados y la experiencia personal en el mundo de la informática.

La página incluye una sección de "Sobre mí", un carrusel de imágenes de proyectos, tarjetas con proyectos destacados, y un formulario de contacto. Además, se ha implementado un buscador de proyectos.

TECNOLOGIA:
JQuery
Bootstrap
HTML
CSS
JavaScript
PHP
MySQL

ENTORNO DE DESARROLLO:

-Visual Studio Code (editor)
-Bootstrap 
-JQuery

ESTRUCTURA

Header y Navbar: Contiene el nombre de la página y un menú de navegación con enlaces a las secciones "Sobre Mí", "Proyectos" y "Contacto".
Carrusel: Sección con un carrusel de imágenes que muestra logos e imágenes relacionadas con el contenido de la web.
Sección "Sobre mí": Incluye una descripción personal y académica sobre mi.
Sección de Proyectos: Tarjetas con información de los proyectos realizados, que incluyen una imagen y una breve descripción.
Modales de Proyectos: Cada proyecto tiene un botón para más información, que abre un modal con más detalles.
Formulario de Contacto: Permite a los usuarios enviar un mensaje, con validación de correo electrónico.

Github al ser un servidor de html, no lee las paginas que son PHP. Por eso hay que entrar desde el repositorio.

Para que funcione la pagina PHP, hay que enlazar el archivo a una Base de Datos que tenemos que crear en PHPMyAdmin usando Xampp. Para eso primero habra que crear la base de datos con una tabla. Una vez lo tengamos creado, meteremos estas sentencias en el apartado de SQL:

CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255),
    link VARCHAR(255)
);

Cuando tengamos todo creado, enlazaremos la base de datos con el archivo y ya tendremos nuestro archivo listo para ser ejecutado.
