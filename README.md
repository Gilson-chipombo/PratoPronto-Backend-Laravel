# 🍽️ API do Sistema de Pedidos de Reestaurante

API REST desenvolvida em **Laravel 12** para gestão de usuários, menus, categorias e pedidos, com autenticação JWT, controle de acesso por roles e upload de imagens.

Este projeto é complemento de sistema de pedidos para **Restaurante**, focado em boas práticas de API, segurança e escalabilidade.

# FrontEnd da aplicação Web
- Pode accessar o projecto neste link: https://pratopronto.vercel.app/
---

## Funcionalidades

### 🔐 Autenticação & Autorização
- Login com **JWT**
- Middleware de autenticação (`auth:api`)
- Controle de acesso por **roles**
  - **Admin**
  - **Cozinheiro**

### Usuários
- CRUD completo de usuários
- Atribuição de roles
- Proteção de rotas por perfil

### Menu
- CRUD de itens do menu
- Upload de imagem
- Controle de disponibilidade (`available: true | false`)
- Associação com categorias

### Categorias
- CRUD de categorias
- Campo `icon`
- Relacionamento com Menu (1:N)

### Pedidos (Orders)
- Criação de pedidos
- Listagem de pedidos
- Associação com usuários e itens do menu

### Segurança
- **JWT Authentication**
- **Rate Limiting**
- **CORS configurado**
- Validação de dados com Form Requests

---

##  Tecnologias

- **PHP 8.3**
- **Laravel 12**
- **MySQL / PostgreSQL**
- **JWT Auth**
- **Eloquent ORM**
- **Laravel Middleware**
- **Laravel Storage (Upload de imagens)**

---

## 📦 Instalação

### 1️ Clonar o repositório
```bash
git clone https://github.com/seu-usuario/restaurant-api.git
cd restaurant-api
