<h1 align="center">
   <a href="#"> teste-importação </a>
</h1>

<h3 align="center">
    Importação de dados para Wordpress via Rest API.
</h3>

<!--p align="center">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/antoniomullerjm/README-ecoleta">

  <a href="https://www.twitter.com/antoniomullerjm/">
    <img alt="Siga no Twitter" src="https://img.shields.io/twitter/url?url=https%3A%2F%2Fgithub.com%2Fantoniomullerjm%2FREADME-ecoleta">
  </a>
  
  <a href="https://github.com/antoniomullerjm/README-ecoleta/commits/master">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/antoniomullerjm/README-ecoleta">
  </a>
    
   <img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen">
   <a href="https://github.com/antoniomullerjm/README-ecoleta/stargazers">
    <img alt="Stargazers" src="https://img.shields.io/github/stars/antoniomullerjm/README-ecoleta?style=social">
  </a>

</!--p-->


<h4 align="center"> 
	 Status: Concluído
</h4>

## Sobre

Este é o resultado do teste para a vaga de Full Stack Developer Pleno - Tinpix

De maneira bem simples e intuitiva, importamos todos o conteúdo do banco de dados e 
temos certeza de mante-los sempre atualizados.

Importante ressaltar que a primeira importação completa das fotos, leva bastante tempo, 
por conta do grande volume de imagens a serem processadas (10.000).

Mas pode ser executada simplesmente deixando uma janela aberta, rodando a importação.

---

## Features

- [x] Importação de Posts via API
- [x] Importação de Álbuns via API
- [x] Importação de Fotos via API
   - [x] Configuração de Imagens Destacadas

🛑 Não foi abordado neste projeto:
```Deprecated
-Performance
-Segurança
-Design
``` 

---

## Layout

Não foi abordado nenhum tipo de layout, ou estilo de folhas.

---

## Como Funciona

Basicamente foi desenvolvido, 
1. Um custom_post_type "album",
2. Uma Função que importa todos os posts e verifica a cada acesso se houve alguma alteração,
3. Uma Função que importa todos os albuns e verifica a cada acesso se houve alguma alteração,
4. Uma Função que importa todos as photos e verifica a cada acesso se houve alguma alteração
5. Uma Função que amarra as imagens como imagens destacadas dos albúns.

### Pré requisitos

Antes de começar, é preciso verificar se estamos em compatibilidade:
Para a solução do teste, foi utilizada uma versão "vanilla" do Wordpress.
[Wordpress] (https://wordpress.org/download/).
Após a instalação é importante checar se os links permanentes estão configurados
para o padão numérico, após, poderá verificar os albuns em forma de arquivo.

```bash

meu.site/wp-admin/options-permalink.php
meu.site/archives/album/

```

Após configurar para o padrão numérico, é preciso "desativar"
uma função do wordpress que gera thumbnais em diversos tamanhos.

```bash

meu.site/wp-admin/options-media.php

```

Basta colocar 0 em todos os campos de texto de desmarcar as caixas de opção.

#### Substituindo os arquivos

```bash

# Baixe os arquivos na pasta /public/ e substitua os originais do wordpress

```


#### Importando o Banco de Dados

A importação do Banco de Dados serve também para simular que já foram importadas todas as imagens.

```bash

Execute o arquivo /sql/local.sql no seu banco de dados MySQL.

```
#### Obs.

Para realizar a importação "manualmente", edite os endereços a seguir com seu domínio e cole
no navegador.

-   meu.site/wp-create-albums.php
-   meu.site/wp-create-posts.php
-   meu.site/wp-create-photos.php

---

## Tech Stack

As seguintes ferramentas foram utilizadas neste projeto:

#### **Ferramentas**  

-   **[Wordpress](https://wordpress.org/download/)**
-   **[Local](https://localwp.com/)**
-   **[Sequel Pro](https://sequelpro.com/download)**
-   **[GitHub](https://docs.github.com/pt)**
-   **[Insomnia](https://insomnia.rest/download)**   

#### **Tecnologias**  

-   **[PHP](https://www.php.net/docs.php)**
-   **[MySQL](https://dev.mysql.com/doc/)**
-   **[GitHub](https://docs.github.com/en/)**


#### **Endpoints**  

-   **[Posts](https://jsonplaceholder.typicode.com/posts)**
-   **[Álbuns](https://jsonplaceholder.typicode.com/albums)**
-   **[Fotos](https://jsonplaceholder.typicode.com/photos/)**


---


## Autor

<a href="https://antoniomuller.com/">
 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/8568528?s=460&u=b0827cca531e0083fb4a2a4fc54b8907084e0b24&v=4" width="100px;" alt="Antonio Müller"/>
 <br />
 <sub><b>Antonio Müller</b></sub></a> <a href="https://antoniomuller.com/" title="Antonio Müller"></a>
 <br />

[![Twitter Badge](https://img.shields.io/badge/-@antoniomullerjm-1ca0f1?style=flat-square&labelColor=1ca0f1&logo=twitter&logoColor=white&link=https://twitter.com/antoniomullerjm)](https://twitter.com/antoniomullerjm) [![Linkedin Badge](https://img.shields.io/badge/-Antonio-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/antoniomuller/)](https://www.linkedin.com/in/antoniomuller/) 
[![Gmail Badge](https://img.shields.io/badge/-contato@antoniomuller.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:contato@antoniomuller.com)](mailto:contato@antoniomuller.com)

---

## Licença

Esto projeto está sob licença [GPLv3](./LICENSE).

Feito por Antonio Müller 👋🏽 [Get in Touch!](Https://www.antoniomuller.com/)

---

##  Versões do README

[Portugues](./README.md) 
