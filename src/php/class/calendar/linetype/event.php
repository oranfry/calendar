<?php
namespace calendar\linetype;

class event extends \Linetype
{
    public function __construct()
    {
        $this->table = 'event';
        $this->label = 'Event';
        $this->icon = 'calendar';
        $this->showass = ['list', 'calendar'];
        $this->fields = [
            (object) [
                'name' => 'icon',
                'type' => 'icon',
                'fuse' => "'calendar'",
                'derived' => true,
            ],
            (object) [
                'name' => 'date',
                'type' => 'date',
                'fuse' => '{t}.date',
                'groupable' => true,
                'main' => true,
            ],
            (object) [
                'name' => 'title',
                'type' => 'text',
                'fuse' => '{t}.title',
            ],
            (object) [
                'name' => 'time',
                'type' => 'number',
                'fuse' => '{t}.time',
            ],
            (object) [
                'name' => 'description',
                'type' => 'text',
                'fuse' => '{t}.description',
            ],
        ];
        $this->unfuse_fields = [
            '{t}.date' => (object) [
                'expression' => ':{t}_date',
                'type' => 'date',
            ],
            '{t}.title' => (object) [
                'expression' => ':{t}_title',
                'type' => 'varchar(255)',
            ],
            '{t}.time' => (object) [
                'expression' => ':{t}_time',
                'type' => 'int',
            ],
            '{t}.description' => (object) [
                'expression' => ':{t}_description',
                'type' => 'text',
            ],
        ];
    }

    public function validate($line)
    {
        $errors = [];

        if ($line->date == null) {
            $errors[] = 'no date';
        }

        if ($line->title == null) {
            $errors[] = 'no title';
        }

        return $errors;
    }
}
