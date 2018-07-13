<?php

namespace PoconoSewVac\Boxes\Admin\Boxes;

use modmore\Commerce\Admin\Widgets\GridWidget;
use modmore\Commerce\Admin\Util\Action;

class Grid extends GridWidget
{
    public $key = 'boxes';
    public $defaultSort = 'name';

    public function getItems(array $options = array())
    {
        $items = [];

        $c = $this->adapter->newQuery('Boxes');

        if (array_key_exists('search_by_name', $options) && strlen($options['search_by_name']) > 0) {
            $c->where([
                'name:LIKE' => '%' . $options['search_by_name'] . '%'
            ]);
        }
        
        // Get the total count for pagination
        $count = $this->adapter->getCount('Boxes', $c);
        $this->setTotalCount($count);

        // Set the current page limit and load the object
        $c->limit($options['limit'], $options['start']);
        $collection = $this->adapter->getCollection('Boxes', $c);

        foreach ($collection as $object) {
            $items[] = $this->prepareItem($object);
        }

        return $items;
    }

    public function getColumns(array $options = array())
    {
        return [
            [
                'name' => 'name',
                'title' => $this->adapter->lexicon('commerce_boxes.name'),
                'sortable' => true,
            ],
            [
                'name' => 'length',
                'title' => $this->adapter->lexicon('commerce_boxes.length'),
                'sortable' => true,
            ],
            [
                'name' => 'width',
                'title' => $this->adapter->lexicon('commerce_boxes.width'),
                'sortable' => true,
            ],
            [
                'name' => 'height',
                'title' => $this->adapter->lexicon('commerce_boxes.height'),
                'sortable' => true,
            ],
            [
                'name' => 'min_items',
                'title' => $this->adapter->lexicon('commerce_boxes.min_items'),
                'sortable' => true,
            ],
            [
                'name' => 'max_items',
                'title' => $this->adapter->lexicon('commerce_boxes.max_items'),
                'sortable' => true,
            ],
            [
                'name' => 'min_weight',
                'title' => $this->adapter->lexicon('commerce_boxes.min_weight'),
                'sortable' => true,
            ],
            [
                'name' => 'max_weight',
                'title' => $this->adapter->lexicon('commerce_boxes.max_weight'),
                'sortable' => true,
            ],
        ];
    }

    public function getTopToolbar(array $options = array())
    {
        $toolbar = [];

        $toolbar[] = [
            'name' => 'add-todo',
            'title' => $this->adapter->lexicon('commerce_boxes.add'),
            'type' => 'button',
            'link' => $this->adapter->makeAdminUrl('boxes/create'),
            'button_class' => 'commerce-ajax-modal',
            'icon_class' => 'icon-plus',
            'modal_title' => 'Add Box',
            'position' => 'top'
        ];

        $toolbar[] = [
            'name' => 'search_by_name',
            'title' => $this->adapter->lexicon('commerce_boxes.search_by_name'),
            'type' => 'textfield',
            'value' => array_key_exists('search_by_name', $options) ? (int)$options['search_by_name'] : '',
            'position' => 'top',
            'width' => 'six wide'
        ];

        $toolbar[] = [
            'name' => 'limit',
            'title' => $this->adapter->lexicon('commerce.limit'),
            'type' => 'textfield',
            'value' => (int)$options['limit'],
            'position' => 'bottom',
            'width' => 'two wide',
        ];

        return $toolbar;
    }

    public function prepareItem($boxes)
    {
        $item = $boxes->toArray('', false, true);

        // Tack on dimension unit
        $item['length'] .= ' ' . $item['dimension_unit'] . '.';
        $item['width'] .= ' ' . $item['dimension_unit'] . '.';
        $item['height'] .= ' ' . $item['dimension_unit'] . '.';

        // Tack on weight unit
        $item['min_weight'] .= ' ' . $item['weight_unit'] . '.';
        $item['max_weight'] .= ' ' . $item['weight_unit'] . '.';

        $item['actions'] = [];

        $editUrl = $this->adapter->makeAdminUrl('boxes/update', ['id' => $item['id']]);
        $item['actions'][] = (new Action())
            ->setUrl($editUrl)
            ->setTitle($this->adapter->lexicon('commerce_boxes.edit'))
            ->setIcon('icon-edit');

        $deleteUrl = $this->adapter->makeAdminUrl('boxes/delete', ['id' => $item['id']]);
        $item['actions'][] = (new Action())
            ->setUrl($deleteUrl)
            ->setTitle($this->adapter->lexicon('commerce_boxes.delete'))
            ->setIcon('icon-trash');

        return $item;
    }
}