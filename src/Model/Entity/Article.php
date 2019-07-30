<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

// entities represent a single record of our data
// in database, and provide row level behavior 
class Article extends Entity
{
    // property which controls how properties can be modified
    // by Mass Assigment
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
        'tags' => true
    ];

    protected function _getTagString()
    {
        if (isset($this->_properties['tag_string'])) {
            return $this->_properties['tag_string'];
        }
        if (empty($this->tags)) {
            return '';
        }
        $tags = new Collection($this->tags);
        $str = $tags->reduce(function ($string, $tag) {
            return $string . $tag->title . ', ';
        }, '');
        return trim($str, ', ');
    }
}
