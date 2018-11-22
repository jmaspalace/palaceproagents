======================
Mapa de distribución de agentes en USA

Módulo: Maps Agents
(Para: Drupal 7)
Requiere Jquery 1.7 o Superior

========================

Descripción:
----------------

Este módulo agrega un tipo de contenido en tu sitio de Drupal para gestionar 
la información de los agentes (Title, Image, Name, Profession, Email, Phone, States).

Te crean dos bloques:
	1. El primer bloque con la siguiente descripción "Bloque que muestra el mapa de USA y lo agentes de cada estado".
	Es necesario agregar el anterior bloque a una página desde un Panel (Requiere módulo Panels). O en una región del
	Template utilizado. Renderiza el mapa de USA con todos los agentes creados desde el tipo de contenido agregado por
	el módulo.
	
	2. El segundo bloque con descripción "Bloque que filtra por estados de USA", este puede agregarse en cualquier región
	del Template utilizado. Renderiza un selector de estados para realizar la búsqueda de Agentes. Requiere que el usuario
	autorice su ubicación desde el navegador para que la sección se muestre.
	
Al instalar el módulo creara una Vocabulario de Taxonomía con los estados de USA (Requiere módulo Taxonomy).


===========================

Instalación:
---------------

1. Copiar todo el directorio de maps_agents a el directorio en Drupal sites/all/modules

2. Iniciar como administrador. Activar el módulo desde "Administer" -> "Modules"
Tener en cuenta las dependencias que se indican en el módulo, para que sean instaladas o habilitadas antes de habilitar este.

3. Una vez instalado revisar el vocabulario taxonómico de los estados instalados correctamente en "Administer -> Structure -> Taxonomy" "USA states"

3. Cargar Agentes desde el tipo de contenido creado por el módulo desde "Administer -> Content -> Add Content -> Agents of USA "

4. Crear una página desde el módulo Panels "Administer -> Structure -> Panels" y cargar el bloque para renderizar el mapa y los agentes.

5. Ingresar a "Administer -> Structure -> Blocks" y adicionar el bloque de búsqueda en la región deseada.
Desde esta sección también puede agregar el bloque de que renderiza el mapa y los agentes en una región.

===========

NOTAS:
-----------

- Para cambiar la validación de geolocalización (Por defecto Colombia). Ingrese a "/sites/all/modules/maps_agents/js/searchGeolocation.js"
en la línea 47 y modifique la condición por el país al que quiere realizarle el filtro.

- Tener en cuenta la URL donde se renderiza el mapa ya que esta URL se debe cambiar en el siguiente archivo 
"/sites/all/modules/maps_agents/themes/bloque-filtrar.tpl.php" en la línea 9 el atributo "action".


