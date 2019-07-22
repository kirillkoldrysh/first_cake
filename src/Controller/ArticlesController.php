<?php
// src/Controller/ArticlesController.php
namespace App\Controller;

class ArticlesController extends AppController
{
    // localhost/articles/index
    public function index() {
        $this->loadComponent('Paginator');
        // fetch paginate set of articles
        // from the database, using Article Model
        // that is automatically loaded via naming conventions
        $articles = $this->Paginator->paginate($this->Articles->find());
        // pass the articles to the Template
        $this->set(compact('articles'));
    }
}
