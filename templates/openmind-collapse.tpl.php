<?php $row = 0; ?>
<div class="panel-group" id="<?php print $id; ?>">
  <?php foreach ($elements as $key => $info): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#<?php print $id; ?>" href="#<?php print $key; ?>" class="collapsed">
            <?php print $info['title']; ?>
          </a>
        </h4>
      </div>
      <div id="<?php print $key; ?>" class="panel-collapse collapse <?php print $row == 0 ? 'in' : ''; ?>">
        <div class="panel-body">
          <?php print $info['content']; ?>
        </div>
      </div>
    </div>
  <?php $row++; ?>
  <?php endforeach; ?>
</div>