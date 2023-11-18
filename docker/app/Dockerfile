FROM php:8.1-fpm

# Install MySQL client
RUN apt-get update \
    && apt-get install -y default-mysql-client

ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; \
    then \
      pecl install xdebug && docker-php-ext-enable xdebug; \
    fi;

COPY ./docker/app/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Install PHP extensions and dependencies
RUN apt-get update && apt-get install -y \
    apt-utils \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip unzip \
    git && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install gd && \
    docker-php-ext-install zip && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash
ENV PATH="/root/.symfony/bin:${PATH}"



# Update package lists and install nodejs
RUN apt-get update \
    && apt-get install -y nodejs

# Install npm
RUN apt-get install -y npm

# Copy your project's composer files
COPY composer.json composer.lock ./

# Install Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin


# Install your project's PHP dependencies

# Set the working directory
WORKDIR /var/www
