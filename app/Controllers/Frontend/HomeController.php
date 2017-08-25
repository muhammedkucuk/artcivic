<?php

namespace App\Controllers\Frontend;

class HomeController extends FrontendBaseController
{
    public function index()
    {
        $hardcopies = $this->repo->hardcopy->getForHomePage();
        $ebooks = $this->repo->ebook->getForHomePage();
        $gardners = $this->repo->gardner->getForHomePage();
        $allegories = $this->repo->allegory->getForHomePage();

        return $this->view->render($this->response, 'index.twig', compact(
            'hardcopies',
            'ebooks',
            'gardners',
            'allegories'
        ));
    }
}