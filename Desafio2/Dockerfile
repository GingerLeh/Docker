FROM redhat/ubi8:8.5

LABEL nome="alessa" email="alessa.bcc@gmail.com"

ENV PORT=8080

RUN yum install -y httpd 

RUN sed -ri -e "/^Listen 80/c\Listen ${PORT}" /etc/httpd/conf/httpd.conf && \
    chown -R apache:apache /etc/httpd/logs/ && \
    chown -R apache:apache /run/httpd/
RUN --mount=type=cache,target=/run/httpd,gid=48,uid=48
RUN --mount=type=cache,target=/etc/httpd/logs,gid=48,uid=48

COPY /src/index.html /var/www/html/
 
EXPOSE ${PORT}

CMD ["httpd", "-D", "FOREGROUND"]



# FROM redhat/ubi8:8.5
# LABEL nome="alessa" email="alessa.bcc@gmail.com"
# ENV PORT=8080 
# RUN sed -ri -e "/^Listen 8080/c\Listen ${PORT}}" /etc/httpd/conf/httpd.conf && \
#     chown -R apache:apache /etc/httpd/logs/ && \
#     chown -R apache:apache /run/httpd/
# FROM httpd:2.4
# RUN --mount=type=cache,target=/run/httpd,gid=48,uid=48
# RUN --mount=type=cache,target=/etc/httpd/logs,gid=48,uid=48
# COPY /src/index.html /var/www/html/
# EXPOSE ${PORT}
# CMD ["httpd","-D","FOREGROUND"] 


