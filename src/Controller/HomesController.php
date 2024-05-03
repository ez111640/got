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
