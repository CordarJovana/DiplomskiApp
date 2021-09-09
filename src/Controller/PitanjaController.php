<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pitanja Controller
 *
 * @property \App\Model\Table\PitanjaTable $Pitanja
 * @method \App\Model\Entity\Pitanja[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PitanjaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $pitanja = $this->paginate($this->Pitanja);

        $this->set(compact('pitanja'));
    }

    /**
     * View method
     *
     * @param string|null $id Pitanja id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pitanja = $this->Pitanja->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('pitanja'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pitanja = $this->Pitanja->newEmptyEntity();
        if ($this->request->is('post')) {
            $pitanja = $this->Pitanja->patchEntity($pitanja, $this->request->getData());
            if ($this->Pitanja->save($pitanja)) {
                $this->Flash->success(__('The pitanja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pitanja could not be saved. Please, try again.'));
        }
        $this->set(compact('pitanja'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pitanja id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pitanja = $this->Pitanja->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pitanja = $this->Pitanja->patchEntity($pitanja, $this->request->getData());
            if ($this->Pitanja->save($pitanja)) {
                $this->Flash->success(__('The pitanja has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pitanja could not be saved. Please, try again.'));
        }
        $this->set(compact('pitanja'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pitanja id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pitanja = $this->Pitanja->get($id);
        if ($this->Pitanja->delete($pitanja)) {
            $this->Flash->success(__('The pitanja has been deleted.'));
        } else {
            $this->Flash->error(__('The pitanja could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
