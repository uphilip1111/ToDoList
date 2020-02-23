#!/bin/bash

service php7.2-fpm start
#nginx
exec nginx -g 'daemon off;'
