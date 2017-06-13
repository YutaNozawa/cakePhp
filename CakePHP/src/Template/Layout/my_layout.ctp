<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('styles.css') ?>

</head>
<body>
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>
