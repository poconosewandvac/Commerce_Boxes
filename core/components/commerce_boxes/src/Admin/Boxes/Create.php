<?php

namespace PoconoSewVac\Boxes\Admin\Boxes;

use modmore\Commerce\Admin\Sections\SimpleSection;
use modmore\Commerce\Admin\Page;

class Create extends Page
{
    public $key = 'boxes/create';
    public $title = 'commerce_boxes.add';
    
    public function setUp()
    {
        $section = new SimpleSection($this->commerce, [
            'title' => $this->title
        ]);
        $section->addWidget((new Form($this->commerce, ['id' => 0]))->setUp());
        $this->addSection($section);
        return $this;
    }
}