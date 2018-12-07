# GiphyAPP

Contiene dos proyectos:
* **api-service**: api construida en Laravel 5.7
* **angular-client**: cliente construido en Angular 7

## Descripción

Es un proyecto básico con un frontend en *Angular* consumiendo una API desarrollada con *Laravel*. Ambos proyectos contienen su propio *docker-compose* para desplegarlos en sus propios contenedores.
Contruyendo *Api-service* con *docker-compose* se desplegara la aplicacion en un contenedor con Apache y php 7.2 corriendo. A su vez se conectara a otro contenedor que se desplegara con MySql corriendo.

## Requerimientos

* *api-service* composer, php 7.* y Docker.
* *angular-client* si deseas desplegar la app en local necesitaras Angular-CLI, node.js y npm, sino con Docker es suficiente.
 
> Agradecimientos al consejo jedi: Garcilaso, Markes, Ivan, Otto, JM, Domador y el barbitas.
