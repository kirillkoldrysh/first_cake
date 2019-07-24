<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
// the Text class
use Cake\Utility\Text;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        // for association between Articles and Tags
        $this->belongsToMany('Tags', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'articles_tags'
        ]);
    }

    public function beforeSave($event, $entity, $options)
    {
        // simple variation of slug creating
        // when we can dublicate new slugs
        // need to repair it
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

    public function validationDefault(Validator $validator) {
        $validator
            ->allowEmpty('title', false)
            ->minLength('title', 10)
            ->maxLength('title', 255)
            
            ->allowEmptyString('body', false)
            ->minLength('body', 10);

        return $validator;
    }
}