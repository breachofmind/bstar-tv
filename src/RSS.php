<?php
namespace App;

use \SimplePie;
use \SimplePie_Item;

class RSS
{
    /**
     * SimplePie instance.
     * @var SimplePie
     */
    protected $sp;

    public static function create($url)
    {
        return new static($url);
    }

    public function __construct($url)
    {
        $this->url = $url;

        $this->sp = new SimplePie();
        $this->sp->enable_cache(false);
        $this->sp->set_feed_url($this->url);
    }

    /**
     * Return the parsed result of the RSS feed.
     * @return array
     */
    public function fetch()
    {
        $this->sp->init();
        return $this->parse($this->sp->get_items());
    }

    /**
     * Parse the RSS feed items.
     * @param $items array
     * @return array
     */
    protected function parse($items)
    {
        $out = array_map(function(SimplePie_Item $item) {

            return [
                'title' => $item->get_item_tags("",'Headline')[0]['data'],
                'image' => $item->get_link(),
                'content' => html_entity_decode($item->get_content())
            ];

        },$items);

        return $out;
    }
}