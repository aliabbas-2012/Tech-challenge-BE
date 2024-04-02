### Setting up users microservice
1. Install PHP 8.1 **
   ```bash
   sudo apt-get install -y php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath php-8.1-amqp


2. Go to users and notifications directory and run following command separately **

```bash
   composer install
```

4. Go to users directory and run following commands, first command starts the server the next command pushes the data to queue

```bash
   symfony  server:start
   
   curl --location 'http://localhost:8000/users' \
        --header 'Content-Type: application/json' \
        --data-raw '{
            "email": "ali.abbas@site.com",
            "firstName": "Ali",
            "lastName": "Abbas"
  }'
   
```

5. Go to notifications directory

```bash
   php bin/console messenger:consume
```

5. Go to var/log/dev.log and see logs for both microservices 

```bash
   tail -f var/log/dev.log
```