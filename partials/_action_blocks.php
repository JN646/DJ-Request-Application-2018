<!-- Actions -->
<div class="card action_block">
  <div class="card">
    <div class="card-header text-center">
      <h5>Actions</h5>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/index.php"><i class="fas fa-list"></i> Requests</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/list_manager.php"><i class="fas fa-tachometer-alt"></i> Song Control</a></li>
    </ul>
  </div>
</div>

<!-- Views -->
<div class="card action_block">
  <div class="card">
    <div class="card-header text-center">
      <h5>Views</h5>
    </div>
    <ul class="nav flex-column">
      <li>
        <span><a class="nav-link-small font-button plus" style="cursor: pointer;">A+</a></span>
        <span><a class="nav-link-small font-button minus" style="cursor: pointer;">A-</a></span>
      </li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/index.php"><i class="fas fa-download"></i> Export Song List</a></li>
    </ul>
  </div>
</div>
