<?php

namespace PoconoSewVac\Boxes\Admin\Boxes;

use modmore\Commerce\Admin\Sections\SimpleSection;
use modmore\Commerce\Admin\Page;
use modmore\Commerce\Admin\Widgets\DeleteFormWidget;
use modmore\Commerce\Admin\Widgets\TextWidget;

class Delete extends Page
{
    public $key = 'boxes/delete';
    public $title = 'commerce_boxes.delete';

    public function setUp()
    {
        $boxId = (int)$this->getOption('id', 0);
        $box = $this->adapter->getObject('Boxes', ['id' => $boxId]);
        $section = new SimpleSection($this->commerce, [
            'title' => $this->title
        ]);
        if ($box) {
            $widget = new DeleteFormWidget($this->commerce, [
                'title' => 'commerce_boxes.delete'
            ]);
            $widget->setRecord($box);
            $widget->setClassKey('Boxes');
            $widget->setFormAction($this->adapter->makeAdminUrl('boxes/delete', ['id' => $box->get('id')]));
            $widget->setUp();
        } else {
            $widget = (new TextWidget($this->commerce, ['text' => 'Box not found.']))->setUp();
        }
        $section->addWidget($widget);
        $this->addSection($section);
        return $this;
    }
}