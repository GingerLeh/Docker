FROM python:3
RUN apt-get update -y 
RUN python -m pip install --upgrade pip
WORKDIR /app
RUN pip install Flask 
COPY . .
EXPOSE 6000
CMD ["python","app.py"]