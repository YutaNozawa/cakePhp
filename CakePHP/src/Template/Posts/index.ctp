<?php
    $this->assign('title', 'Blog Posts');
?>
<h1>Blog Posts</h1>

<?= $this->Html->link('Add New', ['action' => 'add']); ?>

<ul>
    <?php foreach($posts as $post): ?>
        <li>
        <?= $this->Html->link($post->title,
            ['controller' => 'posts', 'action' => 'view', $post->id]); ?>

        <?= $this->Html->link('[Edit]',
            ['controller' => 'posts', 'action' => 'edit', $post->id]); ?>

        <?= $this->Form->postLink(
            '[x]',
            ['action' => 'delete', $post->id],
            ['confirm' => 'Are you sure?', 'class' => 'fs12']
            );
        ?>
        </li>
    <?php endforeach; ?>
</ul>