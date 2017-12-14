<?php
	// src/Controller/ArticlesController.php

	namespace App\Controller;

	class ArticlesController extends AppController
	{

		public function index()
		{
			$articles = $this->Articles->find('all');
			$this->set(compact('articles'));
		}
		public function view($id = null)
		{
			$article = $this->Articles->get($id);
			$this->set(compact('article'));
		}
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Votre article a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre article.'));
        }
        $this->set('article', $article);
    }
	}
?>
