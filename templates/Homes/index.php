<h1>Home Search</h1>
<div style="display: flex; width: 100%">
    <?php
    $home = null;
    echo $this->Form->create($home, ['style' => 'display: flex; margin-right: 10px; column-gap: 10px']);
    ?>
    <?php echo $this->Form->control('address', ['label' => false, 'placeholder' => 'Address']); ?>

    <?php echo $this->Form->control('price', ['label' => false, 'placeholder' => 'Max Price']); ?>

    <?php echo $this->Form->control('sq_feet', ['label' => false, 'placeholder' => 'Min Sq. Footage']); ?>

    <?php echo $this->Form->control('beds', ['label' => false, 'placeholder' => 'Min Bedrooms']); ?>

    <?php echo $this->Form->control('baths', ['label' => false, 'placeholder' => 'Min Bathrooms']); ?>

    <?php echo $this->Form->control('lot_size', ['label' => false, 'placeholder' => 'Min Lot Size']); ?>

    <?php echo $this->Form->control('tag_string', ['type' => 'text', 'label' => false, 'placeholder' => 'Tags']); ?>

    <?php echo $this->Form->button(__('Search')); ?>
    <?php echo $this->Form->end(); ?>
</div>

<h2>Search Results:</h2>
<?php if (!empty($homes)): ?>
    <ul>
        <?php foreach ($homes as $home): ?>
            <td>
                <?php echo $this->Html->image($home->photo_url, ['style' => 'max-width: 200px; max-height: 200px;']); ?>
            </td>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No homes found matching your search criteria.</p>
<?php endif; ?>
