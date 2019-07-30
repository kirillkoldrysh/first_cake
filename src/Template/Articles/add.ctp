<!-- File: src/Template/Articles/add.ctp -->

<h1>Add Article</h1>
<?php
    // Use FormHelper for create form
    // <form method="post" action="/articles/add">
    echo $this->Form->create($article);
    // Hard code the user for now
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('title');
    echo $this->Form->control('body');
    echo $this->Form->control('tags._ids', ['options' => $tags]);
    echo $this->Form->button(__('Save Article'));
    echo $this->Form->end();
?>
