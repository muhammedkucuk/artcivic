<?php

namespace App\Controllers\Frontend;

class BookCategoryController extends FrontendBaseController
{
    public function index()
    {
        return $this->view->render($this->response, 'book-categories/index.twig', []);
    }
}