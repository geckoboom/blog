#!/bin/bash

if [ ! -d /.composer ]; then
    mkdir /.composer
fi

chmod -R ugo+rw /.composer

composer install

if [ $# -gt 0 ]; then
    exec gosu $WWWUSER "$@"
else
     php -S 0.0.0.0:80 -t ./public
fi