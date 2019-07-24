<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
}
