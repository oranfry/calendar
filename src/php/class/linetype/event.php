<?php
namespace linetype;

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
                'fuse' => 't.date',
                'groupable' => true,
                'main' => true,
            ],
            (object) [
                'name' => 'title',
                'type' => 'text',
                'fuse' => 't.title',
            ],
            (object) [
                'name' => 'time',
                'type' => 'number',
                'fuse' => 't.time',
            ],
            (object) [
                'name' => 'description',
                'type' => 'text',
                'fuse' => 't.description',
            ],
        ];
        $this->unfuse_fields = [
            't.date' => ':date',
            't.title' => ':title',
            't.time' => ':time',
            't.description' => ':description',
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
