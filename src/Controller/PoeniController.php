<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Poeni Controller
 *
 * @property \App\Model\Table\PoeniTable $Poeni
 * @method \App\Model\Entity\Poeni[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PoeniController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $poeni = $this->paginate($this->Poeni);

        $this->set(compact('poeni'));
    }

    /**
     * View method
     *
     * @param string|null $id Poeni id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poeni = $this->Poeni->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('poeni'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poeni = $this->Poeni->newEmptyEntity();
        if ($this->request->is('post')) {
            $poeni = $this->Poeni->patchEntity($poeni, $this->request->getData());
            if ($this->Poeni->save($poeni)) {
                $this->Flash->success(__('The poeni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poeni could not be saved. Please, try again.'));
        }
        $this->set(compact('poeni'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Poeni id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poeni = $this->Poeni->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poeni = $this->Poeni->patchEntity($poeni, $this->request->getData());
            if ($this->Poeni->save($poeni)) {
                $this->Flash->success(__('The poeni has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The poeni could not be saved. Please, try again.'));
        }
        $this->set(compact('poeni'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Poeni id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $poeni = $this->Poeni->get($id);
        if ($this->Poeni->delete($poeni)) {
            $this->Flash->success(__('The poeni has been deleted.'));
        } else {
            $this->Flash->error(__('The poeni could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
