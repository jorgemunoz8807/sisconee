<?php return unserialize('a:2:{i:0;O:26:"Doctrine\\ORM\\Mapping\\Table":5:{s:4:"name";s:7:"entidad";s:6:"schema";N;s:7:"indexes";a:3:{i:0;O:26:"Doctrine\\ORM\\Mapping\\Index":2:{s:4:"name";s:21:"fk_entidad_organismo1";s:7:"columns";a:1:{i:0;s:12:"id_organismo";}}i:1;O:26:"Doctrine\\ORM\\Mapping\\Index":2:{s:4:"name";s:15:"fk_entidad_nae1";s:7:"columns";a:1:{i:0;s:6:"id_nae";}}i:2;O:26:"Doctrine\\ORM\\Mapping\\Index":2:{s:4:"name";s:16:"fk_entidad_padre";s:7:"columns";a:1:{i:0;s:10:"id_entidad";}}}s:17:"uniqueConstraints";a:3:{i:0;O:37:"Doctrine\\ORM\\Mapping\\UniqueConstraint":2:{s:4:"name";s:15:"codreeup_UNIQUE";s:7:"columns";a:1:{i:0;s:8:"codreeup";}}i:1;O:37:"Doctrine\\ORM\\Mapping\\UniqueConstraint":2:{s:4:"name";s:13:"nombre_UNIQUE";s:7:"columns";a:1:{i:0;s:6:"nombre";}}i:2;O:37:"Doctrine\\ORM\\Mapping\\UniqueConstraint":2:{s:4:"name";s:13:"siglas_UNIQUE";s:7:"columns";a:1:{i:0;s:6:"siglas";}}}s:7:"options";a:0:{}}i:1;O:27:"Doctrine\\ORM\\Mapping\\Entity":2:{s:15:"repositoryClass";s:17:"EntidadRepository";s:8:"readOnly";b:0;}}');