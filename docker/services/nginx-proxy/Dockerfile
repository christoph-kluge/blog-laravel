FROM nginx

MAINTAINER "Christoph Kluge" <work@christoph-kluge.eu>

ADD conf/nginx.conf /etc/nginx/nginx.conf
ADD sites-available/*.conf /etc/nginx/conf.d/

ADD ssl/server.crt /etc/ssl/certs/server.crt
ADD ssl/server.key /etc/ssl/private/server.key

CMD ["nginx"]