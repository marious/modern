<?php
namespace App\controllers;

use duncan3dc\Laravel\BladeInstance;
use App\Libs\Session\Session;
use Kunststube\CSRFP\SignatureGenerator;

class BaseController
{
    protected $blade;
    protected $session;
    protected $signer;

    public function __construct()
    {
        // create blade instance
        $this->blade = new BladeInstance(getenv('Views_DIRECTORY'), getenv('CACHE_DIRECTORY'));

        $this->session = new Session();

        $this->signer = new SignatureGenerator(getenv('CSRF_SECRET'));
    }
}
