<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;

class FrontendBaseController extends BaseController
{
    public function init()
    {
        parent::init();

        $this->view['sidebar_videos'] = $this->repo->video->getForSidebar();
        $this->view['sidebar_posts'] = $this->repo->post->getForSidebar();
        $this->view['sidebar_categories'] = $this->repo->bookCategory->getActiveMainCategories();
    }
}