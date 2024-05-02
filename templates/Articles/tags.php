
<h1>
    Homes tagged with
    <?= $this->Text->toList(h($tags), 'or') ?>
</h1>

<section>
    <?php foreach ($homes as $home): ?>
        <article>
            <h4><?= $this->Html->link(
                    $home->title,
                    ['controller' => 'Homes', 'action' => 'view', $home->slug]
                ) ?></h4>
            <span><?= h($home->created) ?></span>
        </article>
    <?php endforeach; ?>
</section>
