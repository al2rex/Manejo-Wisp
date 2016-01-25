# Manejo-Wisp
Sistema para la administracion de clientes y facturacion para pequeñas empresas 
proveedoras de internet.

Actualmenta el software creado con php jquery mysql y html esta en proceso de 
finalizacion cualquier persona que quiera colaborar con el mini proyecto bienvenido sea :D

# Ambiente de desarrollo local

Este proyecto consta de una serie de scripts para levantar un servidor virtual con 
configuración similar para que todo mundo pueda desarrollar con las mismas características,
esto es importante que se omita la fricción que pueda haber en desarrollo con la versión a publicar, y 
omitir el molesto, en mi local si funciona!!!!

## Requerimientos para desarrollo local

Para usar este proyecto es necesario tener instalado lo siguiente:

* virtualbox
* vagrant 1.72+
* vagrant plugin install vagrant-vbguest
* putty (en caso de estar usando windows)

o en su caso wamp o similar, sin embargo en el presente documentación no se genera
documentación de la misma.

## Configuración
El servidor buscará las carpetas de los proyectos a un lado de la carpeta de este proyecto
con nombres específicos para cada proyecto. Es decir, se espera un sistema de archivos de la siguiente manera:


        (workspace)
        --proyecto (carpeta publicacion)
            --views
            --models
            --etc ...

Para hacer accesibles las paginas publicadas por el servidor virtual, necesitamos poner 
las siguientes lineas en el archivo hosts (/etc/hosts en linux y mac, 
C:\windows\system32\drivers\etc\hosts para windows )

        192.168.56.21  www.wisp.local.com

### ¿ Qué servicios provee el servidor virtual ?

El servidor virtual creado por vagrant con los archivos de este proyecto, tiene instalado:

        nginx
        php-fpm
        mysql
        nginx
        compass
        xdebug
        y una serie de librerías de php

Además genera las bases de datos a las que se conectan estas aplicaciones con datos muestra. ( aún hace falta llenar algunos catálogos y generar algunas vistas )

### ¿ Cómo tengo que configurar los proyectos ?

Este servidor provee un ambiente monolítico ( es decir es un todo en uno) por lo que todas las conexiones a bases de datos deberían ser redirigidas a 'localhost' o '127.0.0.1' 
al igual que las conexiones a servidores de cache (memcached), la base de datos tiene los 
siguientes usuarios out-of-the -box

        root@localhost                 password  (literal la palabra password)
        root@localhost                 (sin password)
        root@%                         password  (literal la palabra password)

Por lo que tienes que crear los usuarios que necesitas o usar alguno de los anteriores 
en tus archivos de configuración.

### ¿Cómo puedo usarlo para desarrollar ?

Los archivos de los proyectos (si los pusiste en la estructura mencionada) 
son compartidos por vagrant con el servidor virtual, por lo cual puedes 
editarlos, con el editor o el IDE que mas te guste y ver los cambios que 
has hecho en el navegador por medio de la url que diste de alta en el archivo host

Puedes además inspeccionar y manipular la base de datos con el cliente de tu preferencia conectándote con los siguientes datos:

        host: 192.168.56.21
        puerto: 3306
        usuario: root
        password: password

# Author Readme

Ricardo Jesus Ruiz Cruz <ricardojesus.ruizcruz@gmail.com>
