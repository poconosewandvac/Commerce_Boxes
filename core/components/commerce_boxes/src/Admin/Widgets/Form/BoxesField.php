<?php
namespace PoconoSewVac\Boxes\Admin\Widgets\Form;

use modmore\Commerce\Admin\Widgets\Form\SelectField;

class BoxesField extends SelectField
{
    public function getOptions()
    {
        if (count($this->options) > 0) {
            return $this->options;
        }
        $options = [];
        $boxes = $this->adapter->getCollection('Boxes');
        foreach ($boxes as $box) {
            $options[] = [
                'label' => $box->get('title'),
                'value' => $box->get('id')
            ];
        }

        $this->options = $options;
        return $options;
    }
}