<?php

namespace PoconoSewVac\Boxes\Admin\Boxes;

use modmore\Commerce\Admin\Sections\SimpleSection;
use modmore\Commerce\Admin\Page;

class Update extends Page
{
    public $key = 'boxes/update';
    public $title = 'commerce_boxes.edit';

    public function setUp()
    {
        $boxId = (int)$this->getOption('id', 0);
        if ($this->adapter->getCount('Boxes', ['id' => $boxId])) {
            $section = new SimpleSection($this->commerce, [
                'title' => $this->title
            ]);
            $section->addWidget((new Form($this->commerce, ['isUpdate' => true, 'id' => $boxId]))->setUp());
            $this->addSection($section);
            return $this;
        }

        return $this->returnError($this->adapter->lexicon('commerce_boxes.not_found'));
    }
}