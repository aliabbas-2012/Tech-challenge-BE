#!/bin/bash

# Run composer install if composer.json file exists
if [ -f composer.json ]; then
    composer install
fi

# Start Symfony server
exec symfony server:start