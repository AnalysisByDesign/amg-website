FROM nginx:1.24-alpine

ADD ./configs/vhost.conf /etc/nginx/conf.d/default.conf
