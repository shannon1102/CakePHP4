<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Feeds Controller
 *
 * @property \App\Model\Table\FeedsTable $Feeds
 */
class FeedsController extends AppController
{
    public function feed()
    {
         $feedData= $this->Feeds->newEmptyEntity();
        if ($this->request->is('post')) {
            $feedData = $this->Feeds->patchEntity($feedData, $this->request->getData());  
            if ($this->Feeds->save($feedData)) {
                $this->Flash->success(__('The message has been saved.'));

                return $this->redirect(['action' => 'feed']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        }
         
        $loadMess = $this->Feeds->find('all', [
            'order' => 'Feeds.id DESC'
        ]);
       
        $this->set(compact('loadMess','feedData'));//set() is the way to set values in your controller and get those values in your view file(multi)
    }
    public function test(){
        if($this->request->is("post"))
        {
            debug($this->request->getData());
            exit;
        }

    }
}
