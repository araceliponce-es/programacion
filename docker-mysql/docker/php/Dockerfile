ARG php_version
FROM php:${php_version}

# Dependencias del sistema
RUN apt-get update --fix-missing && apt-get install -y \
    build-essential \
    libssl-dev \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    wget \
    vim \
    && rm -rf /var/lib/apt/lists/*

# Extensiones PHP
RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install bcmath
RUN docker-php-ext-configure intl && docker-php-ext-install intl
RUN docker-php-ext-install gd

# Instalador de extensiones PHP
RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions \
    && chmod +x /usr/local/bin/install-php-extensions

# Xdebug
RUN install-php-extensions xdebug

# Composer
RUN install-php-extensions @composer

# IMPORTANTe: fijar decimal en rama 1.x para que sea compatible con composer.json
RUN install-php-extensions decimal-1.5.3

# PHP_CodeSniffer
RUN wget https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar \
    && wget https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar \
    && chmod u+x *.phar \
    && mv phpcbf.phar /usr/local/bin/phpcbf \
    && mv phpcs.phar /usr/local/bin/phpcs

# Document root
ARG document_root
ENV APACHE_DOCUMENT_ROOT=${document_root}

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -i 's/-Indexes/+Indexes/' /etc/apache2/conf-available/docker-php.conf

# Configuración PHP/Xdebug
COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
ADD ./custom-php.ini /usr/local/etc/php/conf.d/custom-php.ini

RUN a2enmod rewrite
RUN a2enmod headers
