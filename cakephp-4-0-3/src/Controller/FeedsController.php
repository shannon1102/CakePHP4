<?php
declare(strict_types=1);

namespace App\Controller;

use function PHPSTORM_META\type;

/**
 * Feeds Controller
 *
 * @property \App\Model\Table\FeedsTable $Feeds
 *
 * @method \App\Model\Entity\Feed[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FeedsController extends AppController
{

    public function delete($id =null)
    {
        $feed = $this->Feeds->get($id);
        if ($this->Feeds->delete($feed)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'feed']);
    }
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
    public function edit($id = null)
    {
        $currentDateTime = date('Y-m-d H:i:s');
     
        $feed = $this->Feeds->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
           $feed = $this->Feeds->patchEntity($feed, $this->request->getData());
           $feed->update_at  =  $currentDateTime;
            if ($this->Feeds->save($feed)) {
                $this->Flash->success(__('The feed has been saved.'));

                return $this->redirect(['action' => 'feed']);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $this->set(compact('feed'));
    }
    public function index1()
    {
        $van= $this->Feeds->find('all',['conditions'=>['id'=>20]]);
        //$feeds = $this->paginate('Feeds',['limit'=> 5,'order'=>['id'=>'desc']]);
        $this->set('van',$van); // <=> set(compact('van'))
    }
    public function testindex3()
    {
      $feedData =    null; // $this->Feeds->newEmptyEntity();
        if ($this->request->is('post')) {
        $feedData= $this->Feeds->newEntity($this->request->getData());
            
        //$feedData = $this->Feeds->patchEntity($feedData, $this->request->getData());     
            if ($this->Feeds->save($feedData)) {
                //// If the instance no id ->. save make itThe $article entity contains the id now
                $this->Flash->success(__('The feed has been saved.'));

                return $this->redirect(['action' => 'feed']);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $loadMess = $this->Feeds->find('all', [
            'order' => 'Feeds.id DESC'
        ]);
       
        $this->set(compact('loadMess','feedData'));
    }


    
}
