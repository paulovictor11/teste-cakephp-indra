<?php

class UsersController extends AppController
{
    public $components = array('RequestHandler');

    public function add()
    {
        try {
            $data = $this->request->input('json_decode');
            $data->password = password_hash($data->password, PASSWORD_BCRYPT);

            $this->User->save($data);
            $this->set([
                'message' => 'Usuário criado com sucesso',
                '_serialize' => ['message'],
            ]);
        } catch (Exception $exception) {
            $this->set([
                'message' => 'Aconteceu um erro, tente novamente mais tarde.',
                'error' => $exception->getMessage(),
                '_serialize' => ['message', 'error'],
            ]);
        }
    }

    public function login()
    {
        try {
            $data = $this->request->input('json_decode');
            $user = $this->User->findByEmail($data->email);

            if (!$user) {
                throw new Exception('E-mail e/ou senha inválidos.');
            }

            if (!password_verify($data->password, $user['User']['password'])) {
                throw new Exception('E-mail e/ou senha inválidos.');
            }

            $token = $this->tokenGenerator($user['User']);

            $this->set([
                'token' => $token,
                '_serialize' => ['token'],
            ]);
        } catch (Exception $exception) {
            $this->set([
                'message' => 'Aconteceu um erro, tente novamente mais tarde.',
                'error' => $exception->getMessage(),
                '_serialize' => ['message', 'error'],
            ]);
        }
    }
}