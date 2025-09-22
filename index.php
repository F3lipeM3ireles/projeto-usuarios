<?php

require_once './src/UserManager.php';


echo " Trabalho da Matéria de Clean Code <br>";

$manager = new UserManager();


echo "<br> Casos de Uso <br>";

$cadastroValido = $manager->cadastrar('Maria Oliveira', 'maria@email.com', 'Senha123');
echo "Resultado: $cadastroValido<br>";


$cadastroInvalido = $manager->cadastrar('Pedro', 'pedro@@email', 'Senha123');
echo "Resultado: $cadastroInvalido<br>";


$loginSenhaErrada = $manager->login('joao@email.com', 'Errada123');
echo "Resultado: $loginSenhaErrada<br>";


$loginCorreto = $manager->login('joao@email.com', 'SenhaForte1');
echo "Resultado: $loginCorreto<br>";


$resetValido = $manager->resetSenha(1, 'NovaSenha1');
echo "Resultado: $resetValido<br>";


$cadastroEmailDuplicado = $manager->cadastrar('Fulano', 'joao@email.com', 'Senha123');
echo "Resultado: $cadastroEmailDuplicado<br>";


$senhaFraca = $manager->cadastrar('Ana', 'ana@email.com', 'fraca');
echo "Resultado: $senhaFraca<br><br>";

foreach ($manager->listarUsuarios() as $usuario) {
    echo "ID: {$usuario['id']} | Nome: {$usuario['nome']} | Email: {$usuario['email']}<br>";
}