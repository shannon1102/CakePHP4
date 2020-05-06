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
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $feeds = $this->paginate($this->Feeds);

        $this->set(compact('feeds'));
    }

    /**
     * View method
     *
     * @param string|null $id Feed id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $feed = $this->Feeds->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('feed', $feed);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $feed = $this->Feeds->newEmptyEntity();
        if ($this->request->is('post')) {
            $feed = $this->Feeds->patchEntity($feed, $this->request->getData());
            if ($this->Feeds->save($feed)) {
                $this->Flash->success(__('The feed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $users = $this->Feeds->Users->find('list', ['limit' => 200]);
        $this->set(compact('feed', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Feed id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $feed = $this->Feeds->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feed = $this->Feeds->patchEntity($feed, $this->request->getData());
            if ($this->Feeds->save($feed)) {
                $this->Flash->success(__('The feed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $users = $this->Feeds->Users->find('list', ['limit' => 200]);
        $this->set(compact('feed', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Feed id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feed = $this->Feeds->get($id);
        if ($this->Feeds->delete($feed)) {
            $this->Flash->success(__('The feed has been deleted.'));
        } else {
            $this->Flash->error(__('The feed could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
