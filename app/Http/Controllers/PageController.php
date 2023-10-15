<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../README.md');
        $in = [
            'link' => [
                'github' => 'https://github.com/nyosru/test231012',
                'swager ( описание и тесты апи )' => 'https://test231012.php-cat.com/api/documentation#/'
        ],
            'readme' => nl2br($data)
        ];
        return view('welcome',$in);
    }

}
