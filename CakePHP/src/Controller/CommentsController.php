<?php
/**
 * Created by PhpStorm.
 * User: hagez
 * Date: 2017/06/13
 * Time: 0:31
 */

namespace App\Controller;

use Cake\ORM\TableRegistry;


class CommentsController extends AppController
{
    public function add()
    {
        $comments = TableRegistry::get('Comments');

        if ($this->request->is('post')) {

            $comment = $comments->newEntity($this->request->getData());

            if ($comments->save($comment)) {
                $this->Flash->success('Comment Add Success');
                return $this->redirect(['controller' => 'Posts' , 'action' => 'view',$comment->post_id ]);
            } else {
                $this->Flash->error('Comment Add Error');
            }
        }

        $this->set(compact('comments'));
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $comments = TableRegistry::get('Comments');
        $comment = $comments->get($id);

        if ($comments->delete($comment)) {
            $this->Flash->success('Delete Comment Success');
        } else {
            $this->Flash->error('Delete Comment Error');
        }

        return $this->redirect(['controller' => 'Posts', 'action' => 'view', $comment->post_id]);

    }
}