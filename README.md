# Asignar-Claves-Asterisk

# Vamos a instalar PHP en Rocky Linux 9

dnf install https://rpms.remirepo.net/enterprise/remi-release-9.rpm
dnf config-manager --set-enabled remi
dnf install php php-cli php-gd php-curl php-zip php-mbstring php-mysqli

# MariaDB ya se ecuentra instalado, en el Taller anterior.

#descargamos de github el proyecto
cd /opt/
git clone https://github.com/giandiego/Asignar-Claves-Asterisk.git
cd Asignar-Claves-Asterisk/

# abrir el /etc/asterisk/extensions.conf y agregar el siguiente código
vim /etc/asterisk/extensions.conf

#añadir el siguiente código
#include extensions-ejemplo.conf

#copiar el archivo extensions-ejemplo.conf a /etc/asterisk/
cp Utilidades/extensions-ejemplo.conf /etc/asterisk/

# Copiar el AGI y librería y dar los permisos necesarios
cp -R Utilidades/phpagi/ /var/lib/asterisk/agi-bin/
chmod -R 775 /var/lib/asterisk/agi-bin/phpagi/

# 