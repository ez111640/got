

<div style="display: flex; margin-top: 40px; column-gap: 40px;">
    <div style="flex: 1;">
        <?= $this->Html->image($home->photo_url, ['style' => 'max-width: 100%; height: auto;']) ?>
    </div>
    <div style="flex: 1; font-size: 20px;">
        <h1><?= h($home->title) ?></h1>
        <p><strong>Address:</strong>
            <?= h($home->address) ?>,
            <?= h($home->city) ?>,
            <?= h($home->state) ?>,
            <?= h($home->zip) ?>
        </p>
        <p><strong>Price:</strong> <?= '$' . number_format($home->price, 0, '.', ',') ?></p>
        <p><strong>Square Feet:</strong> <?= h($home->sq_feet) ?></p>
        <p><strong>Bedrooms:</strong> <?= h($home->beds) ?></p>
        <p><strong>Bathrooms:</strong> <?= h($home->baths) ?></p>
        <p><strong>Lot Size:</strong> <?= h($home->lot_size) ?></p>
    </div>
</div>

<?php if (!empty($similarHomes)): ?>
    <h2>More homes in this area: </h2>
    <div style="display: flex; flex-wrap: wrap; column-gap: 10px;">
        <?php foreach ($similarHomes as $similarHome): ?>
            <div style="flex: 0 0 20%; margin-bottom: 20px;">
                <?= $this->Html->image($similarHome->photo_url, ['style' => 'max-width: 100%; height: auto;']) ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
