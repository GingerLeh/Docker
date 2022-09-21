FROM python:3 

RUN apt-get update
RUN apt-get upgrade -y
RUN apt-get install -y python3-pip
WORKDIR /app
RUN pip install flask
RUN pip install requests
COPY . .
EXPOSE 3000
CMD ["python","./app.py"]