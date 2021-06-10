<?php

namespace app\core;

class View
{

    public function generate($contentView, $data = null)
    {
        if (is_array($data)) {
            extract($data);
        }

        include 'app/views/'.$contentView;
    }
}