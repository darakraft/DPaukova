FROM nginx:latest
COPY me.html /usr/share/nginx/html/
COPY me.jpg /usr/share/nginx/html/


COPY default.conf /etc/nginx/conf.d/default.conf
