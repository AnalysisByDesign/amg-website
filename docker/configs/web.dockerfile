FROM nginx:1.12

ADD ./configs/vhost.conf /etc/nginx/conf.d/default.conf
