<style>
    .home-image-link {
        display: inline-block;
        transition: transform 0.3s;
        border-radius: 10px;
        margin-bottom: 14px;
        margin-right: 10px;
    }

    .home-image-link:hover {
        transform: scale(1.1);
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
    }

    input[type="text"] {
        color: grey;
    }

    input[type="text"]:focus {
        color: black;
    }

    ul{
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        column-gap: 10px;
    }

    .button-div{
        display: flex;
        column-gap: 10px
    }

    .main-div{
    display: flex;
    width: 120%
    }
</style>

<h1>Search Homes</h1>

<div class='main-div'>
    <?php
    $home = null;
    echo $this->Form->create($home, ['style' => 'display: flex; column-gap: 5px', 'id' => 'searchForm']);
    ?>
    <?php echo $this->Form->control('city', ['label' => false, 'placeholder' => 'City']); ?>
    <?php echo $this->Form->control('state', ['label' => false, 'placeholder' => 'State']); ?>
    <?php echo $this->Form->control('price', ['label' => false, 'placeholder' => 'Max Price']); ?>
    <?php echo $this->Form->control('sq_feet', ['label' => false, 'placeholder' => 'Min Sq. Footage']); ?>
    <?php
    echo $this->Form->control('beds', [
        'label' => false,
        'options' => range(1, 10),
        'empty' => '-- Min. Bedrooms --'
    ]);
    ?>
    <?php
    echo $this->Form->control('baths', [
        'label' => false,
        'options' => range(1, 10),
        'empty' => '-- Min. Bathrooms --'
    ]);
    ?>
    <?php echo $this->Form->control('lot_size', ['label' => false, 'placeholder' => 'Min. Lot Size (acres)']); ?>


    <div class='button-div'>
        <?php echo $this->Form->button(__('Search'), ['class' => 'orange-button']); ?>

        <?php echo $this->Form->button(__('Start Over'), ['type' => 'button', 'onclick' => 'clearForm()', 'class' => 'orange-button']) ?>
    </div>

    <?php echo $this->Form->end(); ?>
</div>

<?php if (!empty($homes)): ?>
    <ul>
        <?php foreach ($homes as $home): ?>
            <td >
                <?= $this->Html->link(
                    $this->Html->image($home->photo_url, [ 'class' => 'home-image-link']),
                    ['action' => 'view', $home->slug],
                    ['escape' => false]
                ) ?>
            </td>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No homes found matching your search criteria.</p>
<?php endif; ?>

<script>
    function clearForm() {
        document.getElementById('searchForm').reset();
        window.location.href = window.location.href.split('?')[0];
    }
</script>
