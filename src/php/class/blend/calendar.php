<?php
namespace blend;

class calendar extends \Blend
{
    public function __construct()
    {
        $this->label = 'Calendar';
        $this->linetypes = ['event'];
        $this->showass = ['list', 'calendar',];
        $this->groupby = 'date';
        $this->fields = [
            (object) [
                'name' => 'icon',
                'type' => 'icon',
            ],
            (object) [
                'name' => 'date',
                'type' => 'date',
                'main' => true,
            ],
            (object) [
                'name' => 'title',
                'type' => 'text',
            ],
        ];
    }
}
