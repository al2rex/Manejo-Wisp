# Por que esta carpeta??
Esta carpeta deberá de contener todas tus configuraciones, recuerda que en un desarrollo,
formal, deberás de usar DEVEL en un servidor de desarrollo, no o confundir con el FTP,
y decir que va a pasar a produccion.

## Correcto

Debemos de diferenciar entre los distintos stages, para esto el archivo local.php.dist
servira de base, ojo, aqui van las credenciales a los ambientes de desarrollo y no poner
nunca en el control de versiones las urls productivas, esto deberá de administrarse en el archivo
local.php que debera de contenerse y que en el control de versiones será omitido para este proposito.

Saludos