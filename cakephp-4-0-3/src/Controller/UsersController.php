<?php
declare(strict_types=1);

namespace App\Controller;

use phpDocumentor\Reflection\Types\Null_;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function regist()
    {
        $new = $this->Users->newEmptyEntity();
        if($this->request->is('post'))
        {
            $new= $this->Users->newEntity($this->request->getData());
            if($this->Users->save($new))
            {
                $this->Flash->success(__("Register successfully"));
                return $this->redirect(["contrller"=>"Users","action"=>"login"]);
            }
            $this->Flash->error(__("Regist is not successfull.May be this name is USED"));

        }
        $this->set('new',$new);

    }
    public function login()
    {
        $ipEmail= $this->request->getData('email');
        $ipPass= $this->request->getData('password');
        
        
        if($this->request->is('post'))
        {
            $user = $this->Users->find('all', ['conditions' => ['Users.email'=>$ipEmail, 'Users.password'=>$ipPass]])->first();
            if($user != NULL)
            {
                // $infor = $user->toArray();
                // $infor['email'];
                // array_push($this->mySession,$infor['name']);
                // // debug($this->mySession);
                // // exit;
                 return $this->redirect(["controller"=>"Feeds","action"=>"feed"]);              
            }
            else 
            {
                $this->Flash->error(__('Incorrect email or password'));
                return $this->redirect(["controller"=>"Users","action"=>"login"]);
            }
        }
        $this->set(compact(['ipEmail','ipPass']));
    }
    public function logout()
    {
        return $this->redirect(["controller"=>"Users","action"=>"login"]);
    }
 
}
