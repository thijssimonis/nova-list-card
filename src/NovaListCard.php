<?php

namespace ThijsSimonis\NovaListCard;

use Laravel\Nova\Card;
use Laravel\Nova\Nova;
use Illuminate\Support\Collection;

class NovaListCard extends Card
{
    public $width = '1/3';

    public function __construct()
    {
        $this->withMeta([
            'title' => __(Nova::humanize($this)),
            'heads' => [],
            'rows' => [],
        ]);
    }

    public function title($title): self
    {
        $this->withMeta(['title' => $title]);

        return $this;
    }

    public function heads(array $heads): self
    {
        $this->withMeta(['heads' => $heads]);

        return $this;
    }

    public function rows(Collection $rows): self
    {
        $this->withMeta(['rows' => $rows->toArray()]);

        return $this;
    }

    public function component(): string
    {
        return 'nova-list-card';
    }
}
