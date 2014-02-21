<ul class="nav nav-tabs">
  <?php $row = 0; ?>
  <?php foreach ($tabs as $tab => $title): ?>
    <li class="<?php print $row == 0 ? 'active' : ''; ?>"><a href="#<?php print $tab; ?>" data-toggle="tab"><?php print $title; ?></a></li>
    <?php $row++; ?>
  <?php endforeach; ?>
</ul>

<?php $row = 0; ?>
<div class="tab-content">
  <?php $row = 0; ?>
  <?php foreach ($content as $tab => $content): ?>
    <div class="tab-pane <?php print $row == 0 ? 'active' : ''; ?>" id="<?php print $tab; ?>"><?php print $content; ?></div>
    <?php $row++; ?>
  <?php endforeach; ?>
</div>