<?php
/**
 * Created by PhpStorm.
 * User: hagez
 * Date: 2017/06/13
 * Time: 0:31
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;


class PostsController extends AppController
{
    public function index()
    {
        $posts = TableRegistry::get('Posts')->find('all')
            ->order(['title' => 'DESC'])
            ->limit(2)
            ->where(['title like' => '%3']);

        $this->set(compact('posts'));
    }
}