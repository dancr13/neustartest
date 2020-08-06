
# Dependencies 
1. Docker

# Installation.

1. Go to preferred folder a clone this protect.
1. git clone https://github.com/dbogarin/neustartest.git
1. Open a terminal and go to the repo folder neustarttest.
1. Run docker-compose up, this will prepare our containers(this will take some time).
1. Run docker containe ls, to see all runing containers.
1. ![alt text](/readme/images/dockerls.jpg)
1. Run the following command docker exec -it 63f6f9245b71  /bin/sh -c "[ -e /bin/bash ] && /bin/bash || /bin/sh"
1. The big nummber must match to the php container in step 5.
1. Now inside the container, run composer install.
1. ![alt text](/readme/images/composerinstall.jpg)
1. Just in case run, composer update and composer dumpa.
1. Run php artisan migrate:refresh
1. Open a browser and go to localhost
1. ![alt text](/readme/images/localhost.jpg)

Now The api is ready to use!

# How to use the Client Front End

1. Go to the proyect folder and then app-frontend.
1. Open index.html
1. ![alt text](/readme/images/frontend.png)

# Unit Test
1. Run docker containe ls, to see all runing containers.
1. ![alt text](/readme/images/dockerls.jpg)
1. Run the following command docker exec -it 63f6f9245b71  /bin/sh -c "[ -e /bin/bash ] && /bin/bash || /bin/sh"
1. The big nummber must match to the php container in step 5.
1. Run php artisan test
1. ![alt text](/readme/images/unitest.jpg)
1. You will see all results runing




