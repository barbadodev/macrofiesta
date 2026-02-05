FROM richarvey/php-apache-heroku:latest
COPY . /var/www/app
ENV WEBROOT /var/www/app/public
ENV APP_KEY base64:P8pDe6G6Y6L6v6F6j6S6d6E6w6X6z6G6= 
RUN composer install --no-dev