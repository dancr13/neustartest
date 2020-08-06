
# Dependencies 
1. Docker

# Installation.

1. Go to preferred folder a clone this protect.
2. git clone https://github.com/dbogarin/neustartest.git
3. Open a terminal and go to the repo folder neustarttest.
4. Run docker-compose up, this will prepare our containers(this will take some time).
5. Run docker containe ls, to see all runing containers.
![alt text](/readme/images/dockerls.jpg)

6. Run the following command docker exec -it 63f6f9245b71  /bin/sh -c "[ -e /bin/bash ] && /bin/bash || /bin/sh"
7. The big nummber must match to the php container in step 5.
8. Now inside the container, run composer install.

![alt text](/readme/images/composerinstall.jpg)





