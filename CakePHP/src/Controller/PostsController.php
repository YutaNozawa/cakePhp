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
            ->order(['title' => 'DESC']);
            //件数の絞り込み
            //->limit(2)
            //条件を付けて件数の絞り込み絞り込み
            //->where(['title like' => '%3']);

        $this->set(compact('posts'));
    }
    public function view($id = null)
    {
        $post = TableRegistry::get('Posts')->get($id, [
            'contain' => 'Comments'
        ]);

        $this->set(compact('post'));
    }
    public function add()
    {
        $posts = TableRegistry::get('Posts');

        if ($this->request->is('post')) {

            $post = $posts->newEntity($this->request->getData());

            if ($posts->save($post)) {
                $this->Flash->success('Add Success');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Add Error');
            }


        }

        $this->set(compact('posts'));
    }
    public function edit($id = null)
    {
        $posts = TableRegistry::get('Posts');
        $post = $posts->get($id);

        if ($this->request->is(['post', 'patch', 'put'])) {

            $posts->patchEntity($post, $this->request->getData());

            if ($posts->save($post)) {
                $this->Flash->success('Edit Success');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Edit Error');
            }


        }

        $this->set(compact('posts'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $posts = TableRegistry::get('Posts');
        $post = $posts->get($id);

        if ($posts->delete($post)) {
            $this->Flash->success('Delete Success');
        } else {
            $this->Flash->error('Delete Error');
        }

        return $this->redirect(['action' => 'index']);

    }
}