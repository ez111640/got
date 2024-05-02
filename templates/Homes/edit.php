<h1>Edit Home</h1>
<?php
echo $this->Form->create($home);
echo $this->Form->control('address');
echo $this->Form->control('price');
echo $this->Form->control('sq_feet');
echo $this->Form->control('beds');
echo $this->Form->control('baths');
echo $this->Form->control('lot_size');
echo $this->Form->control('tag_string', ['type' => 'text']);
echo $this->Form->button(__('Save Home'));
echo $this->Form->end();
?>
