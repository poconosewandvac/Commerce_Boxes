<?php
namespace PoconoSewVac\Boxes\Admin\Boxes;

use modmore\Commerce\Admin\Page;
use modmore\Commerce\Admin\Sections\SimpleSection;

class Overview extends Page
{
    public $key = 'boxes';
    public $title = 'Boxes';

    public function setUp()
    {
        $section = new SimpleSection($this->commerce, [
            'title' => $this->getTitle()
        ]);
        $section->addWidget(new Grid($this->commerce));
        $this->addSection($section);
        return $this;
    }
}