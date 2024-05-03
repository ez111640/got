<style>

    .home-view-image{
    max-width: 100%;
    height: auto;
        border-radius: 20px
    }

    .view-home-container{
        display: flex;
        margin-top: 40px;
        column-gap: 40px;
    }

    .detail-container{
        flex: 1;
        font-size: 20px;
    }

    .orange-button {
        background-color: orange;
        color: white;
        border: none;
        padding: 8px 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .orange-button:hover {
        background-color: darkorange;
        text-decoration: none;
    }

</style>

<div style='margin-left: 40px;'>
<div class="view-home-container">
    <div style="flex: 1;">
        <?= $this->Html->image($home->photo_url, ['class' => 'home-view-image']) ?>
    </div>
    <div class='detail-container'>
        <h1 style="margin-bottom: 30px">Home Details</h1>
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
        <p style='margin-bottom: 20px'><strong>Lot Size:</strong> <?= h($home->lot_size) ?></p>
        <div style='display: flex;'>
            <div style="margin-right: 20px;">
                <a href="/homes/search" class='orange-button'>New Search</a>
            </div>
            <div>
                <a href="/" class='orange-button'>All Homes</a>
            </div>
        </div>
    </div>
</div>

<?php if (!empty($similarHomes)): ?>
    <h2>More homes in this area: </h2>
    <div style="display: flex; flex-wrap: wrap; column-gap: 10px;">
        <?php foreach ($similarHomes as $similarHome): ?>
           <div style="flex: 0 0 20%; margin-bottom: 20px;">
                <a href="/homes/view/<?= $similarHome->slug ?>" style="text-decoration: none;">
                    <?= $this->Html->image($similarHome->photo_url, ['style' => 'max-width: 100%; height: auto; border-radius: 10px']) ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</div>
