## O que são containers? 
> maneira de criar ambientes isolados que podem executar código enquanto compartilham um único sistema operacional. </br>

## O que é docker? 
> é uma ferramenta que permite a tarefa de gerenciar containers. Gerencia os containers de forma automatizada. 

## Diferença entre container e máquina virtual? 
* maquina virtual -> hypervisor: instalações separadas, mais trapalhoso, cria-se cada máquina para cada coisa, para cada sistema operacional, e isso vai sobrecarregando o infraestrutura
* container -> toda a instalação do sistema operacional é retirado se tornando mais rápido e prático. 

### O que é preciso para usar o docker? 
* site docker, de acordo com o sistema operacional (docker engine)
* e visual studio code
* depois de instalar rodar no terminal: docker run hello-world

## Introdução YALM
> yet another markup language 
* linguagem de serialização de dados -> converte objetos em bytes e pode os enviar através de uma stream, via http, socket e etc 

## Docker Hub
> Lugar onde se encontam as imagens para baixar -> site

## Sistema de arquivos em camadas
* filesystem 
* sistema de arquivos docker é chamado de layered (sistema de arquivos em camadas)
* um sistema comum linux possui duas camadas basicas: 
  * bootfs: boot do sistema operacional e o kernel
  * rootfs: sistema de arquivos, arquitetura de diretorios, arquivos de configuiração e binários do sistema operacional
* No docker segue-se a mesma ideia, como uma pequena mudança, a camada de escrita que o processo/aplicação visualiza não é o mesmo rootfs base do sistema mas sim uma camada de abstração do rootfs
  * Isso faz com que um container se torne portável, pois as mudanças são aplicadas na camada a qual o sistema visualiza
  
## Comando importantes para docker: 
* docker --version : versão
* docker --help : lista de todos os comandos
* docker container ls : lista os containers 
* docker ps : lista os containers que estão em execução
* docker ps -a : lista todos os containers, até os parados
* docker container start id_container : starta o container por meio do id
* docker pull imagem : baixa a imagem
* docker image ls : lista as imagens no computador
* docker image rm id_imagem : deleta a imagem, para forçar -f
* docker pull imagem:versão : baixar a versão desejada
* docker image inspect id_image : inspeciona a imagem 
* docker image tag imagem:versao nome_que_quero_criar : criar uma tag para uma imagem


  