FROM httpd:2.4
ENV PORT=8080 
RUN sed -ri -e "/^Listen 80/c\Listen ${PORT}" /etc/httpd/conf/httpd.conf && \
    chown -R apache:apache /etc/httpd/logs/ && \
    chown -R apache:apache /run/httpd/
ADD index.html /usr/local/apache2/htdocs/
EXPOSE ${PORT}
COPY index.html /var/www/html/
