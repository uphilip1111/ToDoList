FROM ubuntu:18.04

ENV CODE_NAME xenial
ENV DEBIAN_FRONTEND noninteractive
ENV DEBIAN_PRIORITY critical

RUN \
    echo "root:123456" | chpasswd && \
    ln -sf /usr/share/zoneinfo/Asia/Taipei /etc/localtime && \
    echo 'export LC_ALL="en_US.UTF-8"' >> /etc/profile && \
\
    sed -i '/^deb/{s/ [^ ]*/ http:\/\/free.nchc.org.tw\/ubuntu\//1}' /etc/apt/sources.list && \
    apt-get clean; apt-get autoclean; apt-get update && \
    apt-get -yq dist-upgrade && \
\
    apt-get install -yq software-properties-common apt-utils apt-transport-https && \
    LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php && \
    apt-get update && apt-get upgrade -yq && \
    apt-get install -yq \
        curl \
	zip \
	unzip \
	nginx-extras \
	php7.2-fpm \
	php7.2-cli \
	php7.2-curl \
	php7.2-mysqlnd \
	php7.2-mbstring \
	php7.2-xml \
	php7.2-zip \
	php7.2-bcmath \
	php7.2-gmp

RUN \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

RUN \
    mkdir -p /var/log/php && \
    sed -i 's/^error_log\ =\ \/var\/log/error_log\ =\ \/var\/log\/php/g' /etc/php/7.2/fpm/php-fpm.conf && \
    usermod -u 1000 www-data

COPY config/local.conf /etc/nginx/conf.d/default.conf
COPY config/nginx.conf /etc/nginx/nginx.conf
COPY config/entrypoint.sh /entrypoint.sh
