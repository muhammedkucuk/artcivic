<?php

namespace App\Controllers\Frontend;

use Slim\Http\Request;

class HardcopyController extends FrontendBaseController
{
    public function index()
    {
        $hardcopies = $this->repo->hardcopy->getSalableWithPagination($this->getOffset(), $this->settings['per_page']);

        return $this->view->render($this->response, 'hardcopies/index.twig', [
            'total' => $this->repo->hardcopy->count(),
            'hardcopies' => $hardcopies,
        ]);
    }

    public function show(Request $request)
    {
        return $this->view->render($this->response, 'hardcopies/show.twig', [
            'hardcopy' => $this->repo->hardcopy->getByIsbn($request->getAttribute('isbn')),
        ]);
    }
}