#!/usr/bin/env bash

if [ ! -f .env ]; then
    if [ -f .env.example ]; then
        echo "Creating .env file...";
        cp .env.example .env;
        echo ".env setup completed.";
    else
        echo "Error: .env.example not found.";
        exit 1;
    fi;
else
    echo ".env already exists. Skipping setup.";
fi

if [ ! -f docker-compose.yml ]; then
    if [ -f docker-compose.yml.example ]; then
        echo "Creating docker-compose.yml file...";
        cp docker-compose.yml.example docker-compose.yml;
        echo "docker-compose.yml setup completed.";
    else
        echo "Error: docker-compose.yml.example not found.";
        exit 1;
    fi;
else
    echo "docker-compose.yml already exists. Skipping setup.";
fi