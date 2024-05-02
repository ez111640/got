<?php

namespace App\Controller;

class HomesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    public function index()
    {
        $homes = $this->Homes->find();
        $this->set(compact('homes'));
    }

    public function view($slug = null)
    {
            $home = $this->Homes
                ->findBySlug($slug)
                ->contain('Tags')
                ->firstOrFail();
            $this->set(compact('home'));

        $similarHomes = $this->Homes
            ->find()
            ->where(['state' => $home->state]) // Filter by state
            ->where(['id !=' => $home->id]) // Exclude the current home
            ->limit(5) // Limit the number of similar homes
            ->all();

        $this->set(compact('home', 'similarHomes'));

    }

    public function add()
    {
        $home = $this->Homes->newEmptyEntity();
        if ($this->request->is('post')) {
            $home = $this->Homes->patchEntity($home, $this->request->getData());

            if ($this->Homes->save($home)) {
                $this->Flash->success(__('Your home has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your home.'));
        }
        $tags = $this->Homes->Tags->find('list')->all();

        // Set tags to the view context
        $this->set('tags', $tags);

        $this->set('home', home);
    }


    public function edit($slug)
    {
        $home = $this->Homes
            ->findBySlug($slug)
            ->contain('Tags')
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Homes->patchEntity($home, $this->request->getData());
            if ($this->Homes->save($home)) {
                $this->Flash->success(__('Your home has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your home.'));
        }

        $tags = $this->Homes->Tags->find('list')->all();

        $this->set('tags', $tags);
        $this->set('home', $home);
    }

    public function delete($slug)
    {
        $this->request->allowMethod(['post', 'delete']);

        $home = $this->Homes->findBySlug($slug)->firstOrFail();
        if ($this->Homes->delete($home)) {
            $this->Flash->success(__('The {0} home has been deleted.', $home->title));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function tags()
    {
        $tags = $this->request->getParam('pass');

        $homes = $this->Homes->find('tagged', [
            'tags' => $tags
        ])
            ->all();

        $this->set([
            'homes' => $homes,
            'tags' => $tags
        ]);
    }

    public function search()
    {
        $conditions = [];

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (!empty($data['beds'])) {
                $conditions['beds >'] = $data['beds'];
            }

            if (!empty($data['baths'])) {
                $conditions['baths >'] = $data['baths'];
            }

            if (!empty($data['sq_feet'])) {
                $conditions['sq_feet >'] = $data['sq_feet'];
            }

            if (!empty($data['address'])) {
                $conditions['address LIKE'] = '%' . $data['address'] . '%';
            }

            if (!empty($data['price'])) {
                $conditions['price <='] = $data['price'];
            }

        }

        if (!$this->request->is('post') || empty($data)) {
            // No search criteria provided, return all homes
            $homes = $this->Homes->find('all');
        } else {
            // Apply search criteria
            $homes = $this->Homes->find('all', [
                'conditions' => $conditions
            ]);
        }

        $this->set('homes', $homes);
    }
}
