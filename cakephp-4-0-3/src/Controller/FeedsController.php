<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Feeds Controller
 *
 * @property \App\Model\Table\FeedsTable $Feeds
 *
 * @method \App\Model\Entity\Feed[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeedsController extends AppController
{
    public function feed()
    {
         $feed= $this->Feeds->newEmptyEntity();
        if ($this->request->is('post')) {
          
            $feed = $this->Feeds->patchEntity($feed, $this->request->getData());
            // debug($feed);
            // exit;
            if ($this->Feeds->save($feed)) {
                $this->Flash->success(__('The feed has been saved.'));

                return $this->redirect(['action' => 'feed']);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $this->set(compact('feed'));//set() is the way to set values in your controller and get those values in your view file
        
        
        $loadMess = $this->Feeds->find('all', [
            'order' => 'Feeds.id DESC'
        ]);
       
        $this->set(compact('loadMess'));
    }
}
