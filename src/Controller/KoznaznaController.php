<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Koznazna Controller
 *
 * @property \App\Model\Table\KoznaznaTable $Koznazna
 * @method \App\Model\Entity\Koznazna[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KoznaznaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        
        $randomNum = rand(1,$this->Koznazna->find('all')->count());
        $ident= $this->Authentication->getIdentity();
        $user= $this->loadModel('Users')->get($ident->id);
        if($user->tokeni==0){
            $this->Flash->error(__('Nemate dovoljno tokena za igru!'));
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
        $user->tokeni=$user->tokeni-1;
        if (!$this->loadModel('Users')->save($user)) {
            $this->Flash->error(__('The user could not be saved. Please, try again.'));}
        $poeni=$this->loadModel('Poeni')->newEmptyEntity();
        $poeni->userid=$ident->id;
        $poeni->koznaznaid=$randomNum;
        $pitanja = $this->paginate($this->loadModel('Pitanja')->find('all')->where(['koznaznaid' => $randomNum]));

        $this->set(compact('pitanja'));
    }

    public function kraj($poeni){
        
        $ident= $this->Authentication->getIdentity();
        $user= $this->loadModel('Users')->get($ident->id);
        $user->poeni=($user->poeni)+$poeni;
        if ($this->loadModel('Users')->save($user)) {
            $this->Flash->success(__('Vaši poeni su uspešno upisani.'));

            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
        else{
        $this->Flash->error(__('The user could not be saved. Please, try again.'));

            return $this->redirect(['controller' => 'Users', 'action' => 'index']);}
        
    }

    /**
     * View method
     *
     * @param string|null $id Koznazna id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $koznazna = $this->Koznazna->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('koznazna'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $koznazna = $this->Koznazna->newEmptyEntity();
        if ($this->request->is('post')) {
            $koznazna = $this->Koznazna->patchEntity($koznazna, $this->request->getData());
            if ($this->Koznazna->save($koznazna)) {
                $this->Flash->success(__('The koznazna has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The koznazna could not be saved. Please, try again.'));
        }
        $this->set(compact('koznazna'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Koznazna id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $koznazna = $this->Koznazna->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $koznazna = $this->Koznazna->patchEntity($koznazna, $this->request->getData());
            if ($this->Koznazna->save($koznazna)) {
                $this->Flash->success(__('The koznazna has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The koznazna could not be saved. Please, try again.'));
        }
        $this->set(compact('koznazna'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Koznazna id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $koznazna = $this->Koznazna->get($id);
        if ($this->Koznazna->delete($koznazna)) {
            $this->Flash->success(__('The koznazna has been deleted.'));
        } else {
            $this->Flash->error(__('The koznazna could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
