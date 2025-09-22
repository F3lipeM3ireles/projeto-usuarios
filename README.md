# Projeto: Sistema de Usuários e Autenticação em PHP

Disciplina: Design Patterns & Clean Code

## Aluno
- Nome: Felipe / RA: 2012841

## Estrutura
- src/User.php
- src/Validator.php
- src/UserManager.php
- index.php
- README.md

## Como Executar
1. Copie a pasta `projeto-usuarios-clean-code` para `C:\xampp\htdocs\`.
2. Inicie o Apache no XAMPP.
3. Abra no navegador: http://localhost/projeto-usuarios

## Funcionalidades
- Cadastro de usuário (valida e-mail, senha forte, evita duplicados)
- Login (usa password_verify)
- Reset de senha (senha forte + hash)
- Lista usuários sem expor hash

## Casos de Teste
1. Cadastro válido → sucesso
2. Cadastro com e-mail inválido → erro
3. Login com senha errada → erro
4. Reset de senha válido → sucesso
5. Cadastro com e-mail duplicado → erro

## Limitações
- Dados apenas em memória
- Sem formulários, apenas cenários fixos

## Boas Práticas
- PSR-12
- POO (User, Validator, UserManager)
- DRY e KISS
- Segurança: password_hash e password_verify
