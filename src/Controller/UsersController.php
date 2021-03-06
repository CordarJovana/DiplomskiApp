<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user= $this->Authentication->getIdentity();
        $ident = $this->Users->get($user->id, [
            'contain' => [],
        ]);

        $now = date('Y-m-d');
        $now = new \DateTime($now);
        
        if(strtotime($ident->vreme)<=strtotime("now") && $now>$ident->datum ){
            $ident->tokeni=$ident->tokeni+5;
            $ident->vreme=date("H:i:s");
            $ident->datum=$now;
            if ($this->Users->save($ident)) {
                $this->Flash->success(__('Dobili ste novih 5 tokena!'));
            }
            else{
                $this->Flash->error(__('Ne mogu vam se dodati tokeni!'));
            }
    }
        $users = $this->paginate($this->Users->find('all', array(
            'order' => array('poeni' => 'desc'))));

        $this->set(compact('users', 'ident'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->tokeni=15;
            $user->poeni=0;
            $user->vreme=date("H:i:s");
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
       
        if ($result->isValid()) {
            
            return $this->redirect(['action' => 'index']);
    
            
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Korisnik nije prona??en'));
        }
        }
    
        public function logout(){
            $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        }
    
        public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
       
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }
    
}

