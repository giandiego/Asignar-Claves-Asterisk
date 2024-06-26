# Instalar PHP en Rocky Linux 9

Primero, necesitamos añadir el repositorio de Remi y habilitarlo, para luego instalar PHP y algunas extensiones importantes.

```bash
dnf install https://rpms.remirepo.net/enterprise/remi-release-9.rpm
dnf config-manager --set-enabled remi
dnf install php php-cli php-gd php-curl php-zip php-mbstring php-mysqli
```

## Configurar MariaDB
Asegúrate de que MariaDB esté instalado desde un taller anterior.

## Descargar el Proyecto de GitHub
Clonamos el proyecto en /opt/ y cambiamos al directorio del proyecto.

```bash
cd /opt/
git clone https://github.com/giandiego/Asignar-Claves-Asterisk.git
cd Asignar-Claves-Asterisk/
```

## Configurar Asterisk

### Editar Configuraciones de Asterisk

Abre el archivo `/etc/asterisk/extensions.conf` con tu editor preferido (en este ejemplo, usamos `vim`) y agrega el siguiente código.

```bash
vim /etc/asterisk/extensions.conf
```

#### Añadir el Código

Asegúrate de incluir el siguiente archivo de configuración (para el curso, comenta `extensions.salidas.conf`).

### Copiar el Archivo de Ejemplo

Ahora copiamos el archivo `extensions-ejemplo.conf` al directorio de Asterisk.


```bash
cp Utilidades/extensions-ejemplo.conf /etc/asterisk/
```

### Preparar AGI y Librerías

Copiamos el AGI y las librerías necesarias, luego asignamos los permisos correspondientes.

```bash
cp -R Utilidades/phpagi/ /var/lib/asterisk/agi-bin/
chmod -R 775 /var/lib/asterisk/agi-bin/phpagi/
```

### Configurar Scripts AGI

Copiamos el script valida_clave.php al directorio AGI y le damos permisos de ejecución.

```bash
cp Utilidades/valida_clave.php /var/lib/asterisk/agi-bin/
chmod +x /var/lib/asterisk/agi-bin/valida_clave.php
```

## Configurar la Base de Datos

### Crear la Base de Datos en MariaDB

Inicia sesión en MariaDB como root y crea la base de datos utilizando el archivo SQL proporcionado.

```bash
mysql -u root -p
source /opt/Asignar-Claves-Asterisk/Utilidades/claves.sql
```
## Copiar Archivos de Audio

Finalmente, copiamos los archivos de audio necesarios para Asterisk y recargamos cambios.

```bash
cp -R Utilidades/Audios/* /var/lib/asterisk/sounds/
service asterisk restart
```

(*) Para retornar los cambios, descomentar el archivo original y comentar el extensions-ejemplos.conf