<?php
namespace PoconoSewVac\Boxes\Admin\Boxes;

use modmore\Commerce\Admin\Section;
use modmore\Commerce\Admin\Widgets\HtmlWidget;

class BoxesSection extends Section
{
    public function setUp()
    {
        return $this;
    }
    public function getTitle()
    {
        return $this->adapter->lexicon('commerce_boxes');
    }
}