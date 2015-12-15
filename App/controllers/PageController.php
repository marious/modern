<?php

namespace App\controllers;

use App\Models\Page;

class PageController extends BaseController
{
    /**
     * show home page.
     *
     * @return response
     */
    public function showHomePage()
    {
        echo $this->blade->render('home');
    }

    /**
     * show generic page.
     *
     * @return response
     */
    public function getShowPage()
    {
        $browser_title = '';
        $page_content = '';
        $page_id = 0;

        // extract page name from the url
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $target = $uri[1];

        // find matching page in the db
        $page = Page::where('slug', '=', $target)->get();

        // lookup page content
        foreach ($page as $item) {
            $browser_title = $item->browser_title;
            $page_content = $item->page_content;
            $page_id = $item->id;
        }

        if (strlen($browser_title) == 0) {
            header('Location: /page-not-found');
            exit;
        }

        // pass content to some blade template
        echo $this->blade->render('generic_page', compact('browser_title', 'page_content', 'page_id'));
    }

    public function getShow404()
    {
        header('HTTP/1.0 404 Not Found');
        echo $this->blade->render('page-not-found');
    }
}
