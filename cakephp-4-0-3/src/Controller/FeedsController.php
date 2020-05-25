<?php
declare(strict_types=1);

namespace App\Controller;

use phpDocumentor\Reflection\Types\Boolean;

use function PHPSTORM_META\type;
class FeedsController extends AppController
{
 
    private $IS_NO_INPUT_FILE=4;
    public function delete($id =null)
    {
        $feed = $this->Feeds->get($id);
        if($this->Feeds->delete($feed)){
            $this->Flash->success(__('The message has been deleted.'));
        }else{
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'feed']);
    }
    public function feed()
    {  
        $session=$this->getRequest()->getSession();
        $email=$session->read('email');
        $username=$session->read('username');
        $userID=$session->read('userID');
        if($session->check('email')){
        $this->set(compact('email','username'));
        $feedData=$this->Feeds->newEmptyEntity();
        if ($this->request->is('post')) {
            $fileName=($this->request->getData('filename'));
            if($fileName->getError()==$this->IS_NO_INPUT_FILE){
               $allInput=$this->request->getData();
               unset($allInput['filename']);
               $feedData = $this->Feeds->patchEntity($feedData, $allInput);
            }else $feedData = $this->Feeds->patchEntity($feedData,$this->request->getData());
            $feedData->user_id= $userID;
        if(!$feedData->getErrors)
        {
            $image=$this->request->getData('filename');
            $imgName =$image->getClientFilename();
            if ($fileName->getClientMediaType()=='image/jpeg' || $fileName->getClientMediaType()=='image/jpg' || $fileName->getClientMediaType()=='image/png'){
                $imgPath= WWW_ROOT.'img'.DS.$imgName;
            }else{
                $imgPath= WWW_ROOT.'files'.DS.$imgName;
            }
            if($imgName){
                $image->moveTo($imgPath);
                $feedData->filename=$imgName;
            }
        }          
            if ($this->Feeds->save($feedData)) {
                $this->Flash->success(__('The message has been saved.'));
                return $this->redirect(['action'=>'feed']);
            }
            $this->Flash->error(__('The message could not be saved. Please, try again.'));
        } 
        $loadMess = $this->Feeds->find('all',['order' => 'Feeds.id DESC']);      
        $this->set(compact('loadMess','feedData'));
        }
        else return $this->redirect(['action'=>'feed']);
    }
    public function edit($id = null)
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $feed = $this->Feeds->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
           $feed = $this->Feeds->patchEntity($feed, $this->request->getData());
           $feed->update_at = $currentDateTime;
           if(!$feed->getErrors){   
               $image=$this->request->getData('change_file');
               $imgName = $image->getClientFilename();
               $imgPath = WWW_ROOT.'img'.DS.$imgName;
               if($imgName)
               {
                   $image->moveTo($imgPath);
                   $feed->filename=$imgName;
               }
           }         
            if ($this->Feeds->save($feed)) {
                $this->Flash->success(__('The message has been saved.'));
                return $this->redirect(['action' => 'feed']);
            }
            $this->Flash->error(__('The messagege could not be saved. Please, try again.'));
        }
        $this->set(compact('feed'));
    }
    public function index1()
    {
        $van= $this->Feeds->find('all',['conditions'=>['id'=>20]]);
        $this->set('van',$van);
    }
    public function testindex3()
    {
      $feedData=null; 
        if ($this->request->is('post')) {
        $feedData= $this->Feeds->newEntity($this->request->getData());
            if ($this->Feeds->save($feedData)) {
                $this->Flash->success(__('The feed has been saved.'));
                return $this->redirect(['action' => 'feed']);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $loadMess = $this->Feeds->find('all',['order' => 'Feeds.id DESC']);    
        $this->set(compact('loadMess','feedData'));
    } 
}
