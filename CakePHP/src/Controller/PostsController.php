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
            //降順で並び替え
            ->order(['title' => 'DESC'])
            //件数の絞り込み
            ->limit(2)
            //条件を付けて件数の絞り込み絞り込み
            ->where(['title like' => '%3']);

        $this->set(compact('posts'));
    }
}