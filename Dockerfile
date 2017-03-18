FROM alpine

RUN apk update && apk add php7 && mkdir /app

COPY . /app

EXPOSE 8080

WORKDIR /app

CMD ["php7", "-S", "0.0.0.0:8080"]