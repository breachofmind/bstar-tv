<?php
namespace App;

class Controller
{
    protected $request;

    public $routes = [
        '/'     => 'index',
        '/json'  => 'get_json',
        '/slider-sm' => 'slider',
        '/slider-lg' => 'slider',

    ];

    public function __construct(Request $request)
    {
        $this->request = $request;

        if (! array_key_exists($request->path(), $this->routes)) {
            return null;
        }

        $method = $this->routes[$request->path()];

        $this->render( $this->$method() );
    }

    protected function render($out)
    {
        if (is_array($out)) {
            header('Content-Type: application/json');
            echo json_encode($out);
        } else {
            echo $out;
        }
    }

    protected function index()
    {
        return view('index');
    }

    protected function slider()
    {
        return view('slider', ['type' => $this->request->segment(0)]);
    }

    protected function get_json()
    {
        $rss = RSS::create("http://bsnm.s3.amazonaws.com/Brightstar/3a29b2e3f6ceb8b771dc8cb9efbf2acc");

        return $rss->fetch();
    }
}