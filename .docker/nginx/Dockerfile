FROM nginx:stable-alpine as base

COPY config/default.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/log/nginx && chown -R nginx:nginx /var/log/nginx

WORKDIR /app

CMD ["nginx-debug", "-g", "daemon off;"]