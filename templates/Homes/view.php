<style>

</style>

<div style="margin-left: 40px;">
<div style="display: flex; margin-top: 40px; column-gap: 40px;">
    <div style="flex: 1;">
        <?= $this->Html->image($home->photo_url, ['style' => 'max-width: 100%; height: auto; border-radius: 20px']) ?>
    </div>
    <div style="flex: 1; font-size: 20px;">
        <h1><?= h($home->title) ?></h1>
        <p><strong>
            <?= h($home->address) ?>,
            <?= h($home->city) ?>,
            <?= h($home->state) ?>,
            <?= h($home->zip) ?>
            </strong>
        </p>
        <p><strong>Price:</strong> <?= '$' . number_format($home->price, 0, '.', ',') ?></p>
        <p><strong>Square Feet:</strong> <?= h($home->sq_feet) ?></p>
        <p><strong>Bedrooms:</strong> <?= h($home->beds) ?></p>
        <p><strong>Bathrooms:</strong> <?= h($home->baths) ?></p>
        <p><strong>Lot Size:</strong> <?= h($home->lot_size) ?></p>
        <div style="margin-top: 20px;">
        <a href="/homes/search" style="text-decoration: none; background-color: #007bff; color: #ffffff; padding: 10px 20px; border-radius: 5px; cursor: pointer;">New Search</a>
    </div>
    </div>
</div>

<?php if (!empty($similarHomes)): ?>
    <h2>More homes in this area: </h2>
    <div style="display: flex; flex-wrap: wrap; column-gap: 10px;">
        <?php foreach ($similarHomes as $similarHome): ?>
            <div style="flex: 0 0 20%; margin-bottom: 20px;">
                <?= $this->Html->image($similarHome->photo_url, ['style' => 'max-width: 100%; height: auto; border-radius: 10px']) ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</div>
