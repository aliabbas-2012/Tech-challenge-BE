### Setting up users microservice
1. Install PHP 8.1 **
   ```bash
   sudo apt-get install -y php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath php-8.1-amqp


2. Go to users and notifications directory and run following command separately **

```bash
   composer install
```

3. Go to users directory

```bash
   sudo docker build -t challenge.users .
```

4. Go to notifications directory

```bash
  sudo docker build -t challenge.notifications .
```

6. Come back root of both microservices and run 

```bash
  sudo docker-compose up
```

7. Run the following command to push the data to Rabbit MQ


```bash
   
   curl --location 'http://localhost:8000/users' \
        --header 'Content-Type: application/json' \
        --data-raw '{
            "email": "user@site.com",
            "firstName": "First Name",
            "lastName": "Last Name"
  }'
   
```

8. Run following command to consume messages

``` bash
   sudo docker exec -it notification_challenge php bin/console messenger:consume
```

9. Go to both projects /var directory and see dev.log 
``` bash
    tail -f users/var/log/dev.log
    
    tail -f notifications/var/log/dev.log
```

9. Unit Testcase
``` bash
    sudo docker exec -it user_challenge php bin/phpunit tests/UsersControllerTest.php
```
