FROM alpine:3.10.2

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk update \
    # && apk upgrade \
    && apk add --no-cache curl curl-dev build-base libxml2-dev openssl-dev libjpeg-turbo-dev \
        libpng-dev libxpm-dev freetype-dev gd-dev gettext-dev libmcrypt-dev binutils libzip-dev \
        bzip2-dev imagemagick libxslt-dev \
    && wget https://www.php.net/distributions/php-7.2.23.tar.gz \
    && tar zxf php-7.2.23.tar.gz \
    && cd php-7.2.23 \
    && ./configure \
        --prefix=/usr/local/php \
        --with-config-file-path=/usr/local/php/etc \
        --with-zlib-dir \
        --with-freetype-dir \
        --enable-mbstring \
        --with-libxml-dir=/usr \
        --enable-xmlreader \
        --enable-xmlwriter \
        --enable-soap \
        --enable-calendar \
        --with-curl \
        --with-zlib \
        --with-gd \
        --with-pdo-sqlite \
        --with-pdo-mysql \
        --with-mysqli \
        --with-mysql-sock \
        --enable-mysqlnd \
        --disable-rpath \
        --enable-inline-optimization \
        --with-bz2 \
        --with-zlib \
        --enable-sockets \
        --enable-sysvsem \
        --enable-sysvshm \
        --enable-pcntl \
        --enable-mbregex \
        --enable-exif \
        --enable-bcmath \
        --with-mhash \
        --enable-zip \
        --with-pcre-regex \
        --with-jpeg-dir=/usr \
        --with-png-dir=/usr \
        --with-openssl \
        --enable-ftp \
        --with-kerberos \
        --with-gettext \
        --with-xmlrpc \
        --with-xsl \
        --enable-fpm \
        --with-fpm-user=php-fpm \
        --with-fpm-group=php-fpm \
        # --with-fpm-systemd \
        --disable-fileinfo \
    && make && make install \
    && rm -rf php-7.2.23

ENTRYPOINT ["sh"]
