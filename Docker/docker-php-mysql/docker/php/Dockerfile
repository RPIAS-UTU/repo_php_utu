
# define el valor que será pasado como argumento en la compilacion
ARG php_version 

# define el repositorio o ruta donde se encuentra el codigo fuente
FROM php:${php_version}

# actualizamos el repositorio e instalamos las 
# vim y git (-y) para que no se pregunte si queremos instalar
RUN apt-get update && \
    apt-get install vim git -y

# ejecuta en el contenedor el comando necesario para instalar las librerias 
# necesarias para utilizar mysql
RUN docker-php-ext-install mysqli pdo pdo_mysql 

# Habilitamos el módulo de reescritura de Apache.
# El módulo mod_rewrite sirve para poder reescribir la URL del navegador
# de modo que no tenga por qué hacer referencia a archivos físicos del servidor, 
# sino que nosotros podremos parsear y redirigir las peticiones a nuestro antojo 
# a scripts personalizados que mostrarán el contenido de una base de datos o 
# cualquier otra cosa que se nos ocurra.
RUN a2enmod rewrite
