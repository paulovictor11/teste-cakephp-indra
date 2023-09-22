# Teste Indra

Este projeto foi criado utilizando o framework **'CakePHP'** em sua versão _'2.10.24'_ e **'Docker'** e o **'PHP'** em sua versão _'7.4'_.

### Instalando as dependências

Após a clonagem deste projeto, se faz necessário a execução do seguinte comando para as dependências do projeto possam ser instaladas:

```
composer install
```

### Inciando servidor

Para iniciar o servidor interno do projeto só executar os seguintes comandos:

```
docker-composer build
```

```
docker-composer up -d
```

Após isso, será disponibilizado o endereço `localhost:8080` para ser acessado pelos navegadores.

### Endopoints

O sistema contempla os seguintes endpoints:

- **_Usuários_**

  - [POST] /users/login.json -> para autenticação
  - [POST] /users.json -> para criar um novo usuário

- **_Produtos_**
  - [GET] /products.json -> para listar todos os produtos
  - [POST] /products.json -> para criar um novo produto
  - [GET] /products/{id}.json -> para visualizar um produto
  - [PUT] /products/{id}.json -> para editar um produto
  - [DELETE] /products/{id}.json -> para deletar um produto
