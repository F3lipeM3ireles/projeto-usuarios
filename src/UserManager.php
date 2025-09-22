<?php

require_once 'Validator.php';
require_once 'User.php';



class UserManager
{
    private array $usuarios = [];

    public function __construct()
    {
        $this->usuarios = [
            ['id'=>1,'nome'=>'João Silva','email'=>'joao@email.com','senha'=>password_hash('SenhaForte1',PASSWORD_DEFAULT)],
            ['id'=>2,'nome'=>'Marcelo Dias','email'=>'mar_dias@email.com','senha'=>password_hash('SenhaForte2',PASSWORD_DEFAULT)],
            ['id'=>3,'nome'=>'Joana Mendes','email'=>'mendes2Joana@email.com','senha'=>password_hash('SenhaForte3',PASSWORD_DEFAULT)],
            ['id'=>4,'nome'=>'Walter Branco','email'=>'Heisenberg@email.com','senha'=>password_hash('SenhaForte4',PASSWORD_DEFAULT)],
        ];
    }

    public function cadastrar(string $nome,string $email,string $senha): string
    {

        if (!Validator::validarEmail($email)) 
        {
            return 'Email inválido';
        }

        if (!Validator::validarSenha($senha))
        {
            return 'Senha fraca';
        }
        
        foreach ($this->usuarios as $user)
        {
            if ($user['email'] == $email)
            {
                return 'Email já está em uso';
            }
        }

        $this->usuarios[] = ['id' => count($this->usuarios) + 1, 'nome' => $nome, 'email' => $email, 'senha' => password_hash($senha, PASSWORD_DEFAULT)];
        
        return 'Usuário cadastrado com sucesso';
    }


    public function login(string $email,string $senha): string
    {
        foreach ($this->usuarios as $user)
        {
            if ($user['email'] == $email)
            {
                return password_verify($senha, $user['senha'])? 'Logado com sucesso' : 'Informações incorretas';
            }
        }

        return 'Credenciais inválidas';
    }


    public function resetSenha(int $id,string $novaSenha): string
    {

        if (!Validator::validarSenha($novaSenha))
        {
            return 'Senha fraca';
        }

        foreach ($this->usuarios as $user) 
        {
            if ($user['id'] == $id)
            {
                $user['senha'] = password_hash($novaSenha, PASSWORD_DEFAULT);

                return 'Senha resetada';
            }
        }

        return 'Usuário não encontrado';
    }



     public function listarUsuarios(): array
    {
        return $this->usuarios;
    }

}
