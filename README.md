
# Dependencies 
1. Docker

# Installation.

l. Go to preferred folder a clone this protect.
l. git clone https://github.com/dbogarin/neustartest.git
l. Open a terminal and go to the repo folder neustarttest.
l. Run docker-compose up, this will prepare our containers(this will take some time).
l. Run docker containe ls, to see all runing containers.
![alt text](/readme/images/dockerls.jpg)
l. Run the following command docker exec -it 63f6f9245b71  /bin/sh -c "[ -e /bin/bash ] && /bin/bash || /bin/sh"
l. The big nummber must match to the php container in step 5.
l. Now inside the container, run composer install.
![alt text](/readme/images/composerinstall.jpg)
l. Just in case run, composer update and composer dumpa.
l. Run php artisan migrate:refresh



