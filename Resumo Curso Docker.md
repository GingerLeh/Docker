# Curso Docker → 15.09 - 28.09

### 15.09

## Introdução

- O que é docker?

Um software que reduz a complexidade de setup e aplicações, onde são configurados containers independentes onde funcionam diversos SOs. 

## Trabalhando com Containers

- O que são containers?

É um pacote de código que pode executar uma ação, eles utilizam imagens que podem ser executadas, múltiplos containers podem rodas juntos. 

- Container x Imagem

Imagem ‘é o projeto que seja executado pelo container, todas as instruções estarão declaras nela, o Container ‘é o Docker rodando alguma imagem, consequentemente executando algum código proposto por ela. Logo, o fluxo se da por, programarmos uma imagem e a executarmos por meio de um container. 

- Rodar imagem

```bash
docker run <imagem> 
```

- Verificar container que j’á foram executados

```bash
docker ps 
#ou 
docker container ls 
#utilizando a flag -a temos todos os container já executados na maquina 
```

- Rodando container no modo iterativo

```bash
docker run -it container #para poder executar no terminal
```

- Container x VM

Container ‘é uma aplicação que serve para um determinado fim e não possui sistema operacional, VM possui sistema operacional próprio, e pode executar diversas funções ao mesmo tempo.

- Rodando Container em background (detached)

```bash
# se usa a flag -d 
docker run -d container 
```

- Expondo porta de Container

```bash
# rodar um container em uma porta
docker run -d -p 80:80 container
```

- Parando Container

```bash
docker stop container_name ou container_id
```

- Reiniciando Container

```bash
docker start container_id
```

- Definindo nome para Container

```bash
docker run --name container
```

- Acessando log do Container

```bash
docker logs container_id
```

- Removendo Container

```bash
docker -rm container_id
```

## Criando imagens

- O que é imagem?

São originadas de arquivos programados para que o docker crie uma estrutura que execute determinadas ações em container. As instruções são executadas em camadas.

- Criando uma imagem
    - Instruções necessárias para a imagem:
        - FROM: imagem base
        - WORKDIR: diretório da aplicação
        - EXPOSE: porta da aplicação
        - COPY: quais arquivos precisam ser copiados
- Para construir a imagem feita

```bash
docker build . #caso o docker file esteja na mesma pasta
```

- Listar imagens

```bash
docker image ls 
```

- Rodar imagem na porta certa

```bash
docker run -d -p 3000:3000 id_container 
```

- Alterando uma imagem

Toda vez que a imagem for alterada, o build deverá ser ser realizado novamente. 

- Baixar imagem

```bash
docker pull imagem 
```

- Mais informações sobre os comandos

```bash
docker run --help #pode ser com qlqr comando
```

- Múltiplas aplicações, mesmo container

Podemos inicializar vários containers com a mesma imagem, as aplicações funcionarão em paralelo. Cada uma usando uma porta. 

- Nomeando imagens

```bash
docker tag <nome> 
docker tag <nome>:<tag> #dar uma tag para a imagem
```

- Nomeando a imagem no build

```bash
docker build -t <nome> .
docker build -t <nome>:<tag> .
```

- Reiniciando container com comando interativo

```bash
docker start -i <container> 
```

- Removendo imagens

```bash
docker rmi <imgem> 
# usar flag -f para forçar a remoção 
```

- Remoção de imagens e containers não utilizados

```bash
docker system prune
```

- Removendo containers após a utilização

```bash
docker run -rm <container> 
#usar a flag -rm após a utlizaçao 
```

- Copiando arquivos do container

Para copia de arquivos entre container utiliza-se o comando *docker cp.* Pode ser utilizado para copiar um arquivo de um diretório para um container ou de um container para um diretório determinado. 

```bash
docker cp <container>:origem destino 
```

- Verificando processamento processamento do container

```bash
docker top <container> 
```

- Inspecionando container

```bash
docker inspect <container>
```

- Verificando processamento do Docker

```bash
docker stats 
```

- Autenticação no terminal

Criar conta no dockerhub.

```bash
docker login 
docker logout # encerra autenticaçao
```

- Enviando imagens para o Hub

Necessidade de criar um repositório antes e estar autenticado. 

```bash
docker push <imagem> 
```

- Atualizando imagens no Hub
    - Fazer o build novamente
    - Trocar a tag para a versão atualizada
    - Depois fazer o push novamente para o repositório
- Utilizando nossa imagem

```bash
docker pull <imagem> # baixar a imagem 
docker run <imagem> # cria novo container
```

### Volumes

- O que sao volumes

Uma forma pratica de persistir dados em aplicações e não depender de containers. Todo dado criado por um container é salvo nele, logo precisamos dos volumes para gerenciar os dados e também fazer backups de forma mais simplificada. 

- Tipos de volumes
    - Anônimo: diretório criados pela flag -v, porem com um nome aleatório .
    - Nomeado: são volumes com nomes, podemos nos referir a estes facilmente e saber para que são utilizados no nosso ambiente
    - Bind mounts: uma forma de salvar dados na nossa maquina, sem o gerenciamento do Docker, informando um diretório para este fim
- Volume anonimo

O container estará atrelado ao volume anônimo. 

```bash
docker run -v /data #cria o volume anonimo 
docker volume ls #para ver todos os volumes do ambiente
```

- Volume nomeado

Facilmente referenciado, tem como função armazenar arquivos assim como o anônimo.

```bash
docker run -v nomedovolume:/data
```

- Bind mounds

Também é um volume, porem ele fica em um diretório que nos especificamos, então não é criado um volume em si, mas sim, é apontado um diret’ório. O diretório no nosso computador sera o volume desse container. 

- Também pode ser usado para atualizar em tempo real um projeto sem ter que refazer o build a cada atualização

```bash
docker run /dir/data:data
```

- Criando volumes manualmente

```bash
docker volume create <nome> 
```

- Listando volumes

```bash
docker volume ls
```

- Inspecionando volumes

```bash
docker volume inspect <nome>
```

- Removendo volumes

```bash
docker volume rm <nome> 
```

- Removendo volumes em massa

```bash
docker volume prune
```

- Volume somente leitura

```bash
docker run -v volume:/data:ro #ro - read only
```

### Networks

- O que são networks

Um forma de gerenciar a conexão docker com outras plataformas ou ate mesmo entre containers. São criadas separadas dos containers e facilita a comunicação entre os containers. 

- Tipos de conexão
    - Externa: conexão com uma API de um servidor remoto
    - Com o host: comunicação com a maquina que esta executando o docker
    - Entre containers: comunicação que utiliza o driver bridge e permite a comunicação entre dois ou mais containers
- Tipos de driver
    - Brigde: o mais comum e padrão, utilizado quando containers precisam se conectar.
    - host: permite a conexão ente um container a maquina que esta hosteano o docker
    - macvlan: permite a conexão a um container por um Mac address
    - none: remove todas as conexões de rede de um container
    - plugins: permite extensões de terceiros para criar outras redes
- Listando network

```bash
docker network ls 
```

- Criando Redes

```bash
docker network create <nome> 
docker network create -d nomedive nomerede #cria com drive especifico 
```

- Removendo Redes

```bash
docker network rm <nome> 
```

- Removendo redes nao utilizadas

```bash
docker network prune 
```

- Conexão entre containers
    - Primeiro cria a network para conectar os containers
    - Build os containers e roda na porta e conectando na tal rede
- Conectando um container a uma rede

```bash
docker network connect rede container_id
```

- Desconectando um container

```bash
docker network disconnect rede container_id
```

- Inspecionando redes

```bash
docker network inspec nome
```

### YAML

- Fim da linha = fim da instrução
- Identação deve conter um ou mais espaços, não utilizar tab
- Cada linha define novo bloco
- Espaço é obrigatório após a declaração da chave
- Comentario ‘é o padrão #
- Dados numéricos
    - Normal com casa decimal = 3.14, etc
- String
    - Sem aspas ou com aspas
- Dados nulos
    - Usar ~ ou null
- Booleanos
    - On ou True e False ou Off
- Listas
    - Primeira forma: [1,2,3,4]
    - Segunda forma:
        - items:
        - - 1
        - - 2
        - - 3
- Dicionários
    - Obj:{a:1,b:2,c:4}
    - Também com nestig:
        - objeto:
            - chave: 1
            - chave: 2

### Docker Compose

- O que é docker compose?

Ferramenta para rodar múltiplos containers. 

- É necessário criar um arquivo chamado docker-compose.yml na raiz do projeto, e colocar informações como version, services e volumes.
- Rodando compose

```bash
docker-compose up 
#para parar é só aparer ctrl+c
```

- Rodando compose em background

```bash
docker-compose up -d
```

- Parando o compose

```bash
docker-compose down
```

- Variáveis de ambiente

Variáveis de ambiente para o docker compose. Passos: 

- Arquivo base env_file
- Sintaxe ${VARIAVEL}
- Técnica para quando o dado ‘é sensível ou não pode ser compartilhado como uma senha
- Rede no compose

O compose cria uma rede básica bridge entre os containers da aplicação, porém da pra isolar as redes com a chave network, dessa forma se conecta apenas os containers que se opta e também da pra definir drivers diferentes. 

- Verificando serviços do compose

```bash
docker-compose ps 
```

### Docker Swarm

- O que é orquestração de containers?

É conseguir gerenciar e escalar os containers da aplicação, um serviço que rege sobre os outros serviços. Exemplos: docker swarm, Kubernetes, apache mesos 

- O que é docker swarm?

→ conhecido como cluster

Pode escalar horizontalmente os projetos, comandos parecidos com docker. 

- Conceitos fundamentais
    - Nodes: ‘é uma instancia (maquina) que participa do Swarm
    - Manage Node: node que gerencia os demais nodes
    - Worker Node: nodes que trabalham em função do Manger
    - Service: um conjunto de tasks que o Manager Node manda o Work Node executar
    - Task: comandos que são executados nos Nodes
- Instalando o docker no AWS

```bash
sudo yum update -y 
sudo yum install docker 
sudo docker service start 
sudo docker ps 
sudo usermod -a -G docker ec2-user
sudo docker info 
sudo docker swarm info
sudo docker swarm leave -f
sudo docker swarm init 
```

- Inicializando docker no Docker labs

```bash
docker swarm init --advertise-addr IP
```

- Listando Nodes ativos

```bash
docker node ls
```

- Adicionando maquinas no swarm

```bash
docker swarm join --token <TOKEN> <IP>:<PORTA> #colar em quem vc quer que se junte
```

- Subindo serviço no swarm

```bash
docker service create --name <nome> <imagem> 
#container novo adicionado ao Manger
#será gerenciado pelo swarm
```

- Listar serviços

```bash
docker service ls 
```

- Removendo serviços

```bash
docker service rm <nome> 
```

- Replicando serviços

```bash
docker service --name <NOME> --replicas <numero> <IMAGEM>
# assim inicia de fato a orquestração
```

- Recuperando token do swarm

```bash
docker swarm join-token manager
```

- Mais informações sobre swarm

```bash
docker info
```

- Deixar o swarm em um node

```bash
docker swarm leave
```

- Remover um node

```bash
docker node rm <ID> 
```

- Inspecionando serviços

```bash
docker service inspect ID
```

- Verificar quais containers estão rodando

```bash
docker service ps <ID> 
```

- Compose no swarm

```bash
docker stack deploy -c <ARQUIVO.YAML> <NOME> 
```

- Escalando aplicação

```bash
docker service scale <NOME>=<REPLICAS>
```

- Parar de receber tasks em em um node

```bash
docker node update --availability drain ID
```

- Atualizando imagens swarm

```bash
docker service update --image <IMAGEM> <SERVICO>
```

- Criando rede para swarm

```bash
docker network create --name NOME --replicas NUMERO -p PORTA --network swarm IMAGEM
#docker service create --name nginxsnetwork --replicas 3 -p 8000:8000 --network swarm nginx
```

- Conectar serviços a uma rede

```bash
docker service update --network-add REDE NOME
#docker service update --network-add swarm rbn
```

### Kubernets

- O que ‘é Kubernets?

Ferramenta de orquestração de containers, permite a criação de múltiplos containers em diferentes maquinas (nodes). Escalam projetos formando clusters e gerenciam serviços garantindo que as aplicações sejam executadas sempre da mesma forma. 

- Conceitos fundamentais
    - Control plane: onde ‘é gerenciado o controle de processos dos nodes
    - Nodes: maquinas que são gerenciadas pelo control plane
    - Deployment: a execução de uma imagem ou projeto em um pod
    - Pod: um ou mais containers que estão em um node
    - Services: serviços que expõe os pods ao mundo externo
    - kubectl: cliente de linha de comando para kubernetes
- Inciando Minikube

```bash
minikube start --driver=DRIVER
minikube status
minikube start --network-plugin=cni --cni=calico --driver=docker --base-image "gcr.io/k8s-minikube/kicbase-builds:v0.0.29-1644344181-13531"

minikube start --base-image='private-registry/k8s-minikube/kicbase:v0.0.13@sha256:4d43acbd0050148d4bc399931f1b15253b5e73815b63a67b8ab4a5c9e523403f' --alsologtostderr
```

- Parando o Minikube

```bash
minikube stop 
```

- Acessando o dashboard do Kubernetes

O Minikube fornece um dashboard bem detalhado

```bash
minikube dashboard
minibuke dashboard --url # para obter a url
```

- Deployment na teoria

Roda nos Pods. Definimos uma imagem e um nome para posteriormente ser replicado entre os servidores. A partir da criação do deployment, teremos containers rodando. 

- Criar projeto
    - Criar o projeto
    - Buildar a imagem do mesmo
    - Enviar a imagem para o docker Hub
    - Testar e rodar em um container
    - Utilizar no Kubernetes
- Criando Deployment

```bash
kubectl create deployment <NOME> --image=<NOME> 
```

- Checando o Deployment

```bash
kubectl get deployments 
kubectl describe deployments #para mostrar mais detalhes
```

- Checando Pods

```bash
kubectl get pods
kubectl describe pods #para mostrar mais detalhes
```

- Configuração do Kubernetes

Para verificar as configurações do Kubernetes 

```bash
kubectl config view 
```

- Services

Possibilitam expor os pods para o mundo externo, e os expõe para uma rede. Os pods são criados para serem destruídos.

- Criando um Service

```bash
kubectl expose deployment <NOME> --type=<TIPO> --port=<PORT> 
#o tipo LoadBalancer é o mais comum 
```

- Gerando um IP para o Serviço

```bash
minikube service <NOME>
```

- Verificando os serviços

```bash
kubectl get services
kubectl describe services <NOME>
```

- Escalando aplicação

```bash
kubectl scale deployment/<NOME> --replicas=<numero> 
#sobre os pods
kubectl get pods
```

- Verificando numero de réplicas

```bash
kubectl get rs
```

- Diminuir numero de replicas (scale down)

```bash
kubectl scale deployment/<NOME> --replicas=<numero-menor> 
```

- Atualizando a imagem do projeto

Para atualizar ‘é preciso o nome do container, isso ‘é dado na dashboard dentro do pod, e também a nova imagem deve ser outra versão da atual, ‘é preciso subir uma nova tag no Hub. 

```bash
kubectl set image deployment/<NOME> <NOME_CONTAINER>=<NOVA_IMAGEM>
```

- Desfazer alteração no projeto

```bash
kubectl rollout status deployment/<NOME>
kubectl rollout undo deployment/<NOME> #volta a alteracao
```

- Deletando Services

```bash
kubeclt delete service <NOME>
```

- Deletando Deployments

```bash
kubectl delete deployment <NOME>
```

- **Modo Declarativo**

Até agora foi utilizado o modo imperativo. O modo declarativo ‘é guiado por um arquivo , semelhante ao docker compose, também escrito em YAML. 

- Chaves mais utilizadas
    - apiVersion: versão utilizada da ferramenta
    - kind: tipo do arquivo
    - metadata: descrever algum objeto, inserindo chave como name
    - replicas: numero de replicas de nodes/pods
    - containers: definir as especificações de containers como: nome e imagem
- Rodando o arquivo do projeto

```bash
kubectl apply -f <ARQUIVO>
```

- Parando o deployment

```bash
kubectl delete -f <ARQUIVO>
```

- Iniciando Service

```bash
kubectl apply -f <ARQUIVO> 

#é preciso gerar o IP de acesso com: 
minikube service <NOME>
```

- Parando o serviço

```bash
kubectl delete -f <ARQUIVO>
```

- Atualizando o projeto

Criar nova versão da imagem

Fazer push para o Hub 

Alterar no arquivo de Deployment a tag

Replicar o comando de apply 

- Unindo arquivos
    - Unir o deployment e o service em um arquivo s’ó
    - Separação de objetos para YAML ‘é com - - -
    - Boa prática: colocar service antes de deployment