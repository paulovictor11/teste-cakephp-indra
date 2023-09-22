<?php

class ProductsController extends AppController
{
    public $components = array('RequestHandler');

    public function index()
    {
        try {
            $this->set([
                'data' => $this->Product->find('all'),
            ]);
        } catch (Exception $exception) {
            $this->set([
                'message' => 'Aconteceu um erro, tente novamente mais tarde',
                'error' => $exception->getMessage(),
                '_serialize' => ['message', 'error']
            ]);
        }
    }

    public function add()
    {
        try {
            $token = $this->request->query('_token');
            if (!$token) {
                throw new Exception('Usuário não autenticado.');
            }

            $data = $this->request->input('json_decode');
            $this->Product->save($data);

            $this->set([
                'message' => 'Produto criado com sucesso',
                '_serialize' => ['message'],
            ]);
        } catch (Exception $exception) {
            $this->set([
                'message' => 'Aconteceu um erro, tente novamente mais tarde',
                'error' => $exception->getMessage(),
                '_serialize' => ['message', 'error']
            ]);
        }
    }

    public function view($id)
    {
        try {
            $token = $this->request->query('_token');
            if (!$token) {
                throw new Exception('Usuário não autenticado.');
            }

            $this->set([
                'data' => $this->Product->findById($id),
            ]);
        } catch (Exception $exception) {
            $this->set([
                'message' => 'Aconteceu um erro, tente novamente mais tarde',
                'error' => $exception->getMessage(),
                '_serialize' => ['message', 'error']
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $token = $this->request->query('_token');
            if (!$token) {
                throw new Exception('Usuário não autenticado.');
            }

            $this->Product->id = $id;

            $data = $this->request->input('json_decode');
            $this->Product->save($data);

            $this->set([
                'message' => 'Produto editado com sucesso',
                '_serialize' => ['message'],
            ]);
        } catch (Exception $exception) {
            $this->set([
                'message' => 'Aconteceu um erro, tente novamente mais tarde',
                'error' => $exception->getMessage(),
                '_serialize' => ['message', 'error']
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $token = $this->request->query('_token');
            if (!$token) {
                throw new Exception('Usuário não autenticado.');
            }

            $this->Product->delete($id);
            $this->set([
                'message' => 'Produto deletado com sucesso',
                '_serialize' => ['message'],
            ]);
        } catch (Exception $exception) {
            $this->set([
                'message' => 'Aconteceu um erro, tente novamente mais tarde',
                'error' => $exception->getMessage(),
                '_serialize' => ['message', 'error']
            ]);
        }
    }
}