<!-- Actions -->
<div class="card action_block">
  <div class="card">
    <div class="card-header text-center">
      <h5 id='headerActions'>Actions</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li id='actionsLinkStats' class="list-group-item"><a class="" href="<?php echo $environment; ?>admin/stats.php"><i class="fas fa-trophy"></i> Stats</a></li>
    </ul>
  </div>
</div>

<!-- Songs -->
<div class="card action_block">
  <div class="card">
    <div class="card-header text-center">
      <h5 id='headerSongs'>Songs</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li id='magnifyRow' class='list-group-item'>
        <span><a id='linkMagnifyPlus' class="font-button plus" style="cursor: pointer;"><i class="fas fa-search-plus"></i></a></span>
        <span><a id='linkMagnifyNormal' class="font-button normal" style="cursor: pointer;"><i class="fas fa-search"></i></a></span>
        <span><a id='linkMagnifyMinus' class="font-button minus" style="cursor: pointer;"><i class="fas fa-search-minus"></i></a></span>
      </li>
      <li id='songLinkRequests' class="list-group-item"><a href="<?php echo $environment; ?>admin/index.php"><i class="fas fa-list"></i> Requests <span class="badge badge-secondary"><?php echo countRequestsActive($db); ?></span></a></li>
      <li id='songLinkListManager' class="list-group-item"><a href="<?php echo $environment; ?>admin/list_manager.php"><i class="fas fa-tachometer-alt"></i> Song Manager</a></li>
    </ul>
  </div>
</div>

<!-- Admin -->
<div class="card action_block">
  <div class="card">
    <div class="card-header text-center">
      <h5 id='headerActions'>Admin</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li id='actionsLinkStats' class="list-group-item"><a class="" href="<?php echo $environment; ?>admin/style.php"><i class="fas fa-paint-brush"></i> Style</a></li>
      <li id='songLinkExportList' class="list-group-item"><a href="<?php echo $environment; ?>functions/exportData.php"><i class="fas fa-download"></i> Export Song List</a></li>
      <li id='songLinkExportRequests' class="list-group-item"><a href="<?php echo $environment; ?>functions/exportRequests.php"><i class="fas fa-download"></i> Export Request List</a></li>
      <li id='songLinkDeleteRequests' class="list-group-item"><a class="text-danger" href="<?php echo $environment; ?>admin/index.php?deleterequests=true"><i class="fas fa-trash"></i> Delete All Requests</a></li>
    </ul>
  </div>
</div>

<!-- Drinks -->
<?php if($addon_drinks == TRUE) { ?>
<div class="card action_block">
  <div class="card">
    <div class="card-header text-center">
      <h5 id='headerDrinks'>Drinks</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li id='drinksLinkManager' class="list-group-item"><a class="" href="<?php echo $environment; ?>admin/drink_manager.php"><i class="fas fa-beer"></i> Drink Manager</a></li>
    </ul>
  </div>
</div>
<?php } ?>
