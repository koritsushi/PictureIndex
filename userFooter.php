<footer>
  <div class="footerInfo">
    <?php $baseUrl = 'http://localhost';
    $baseUrlFooter = 'http://localhost/PictureIndex/user_management'; ?>

    <div>
      <a class="navbar-brand" href="#" style="float: left;"><img src="<?= $baseUrl ?>/logo.png" alt="PictureIndex" style="width:250px;height:100px;"></a>
    </div>

    <div class="footerItem">
      <p>
        <a href="<?= $baseUrlFooter ?>/shows/CurrentSeasonShowsPage.php" style="text-decoration:none">SHOWS</a>
      </p>
    </div>

    <div class="footerItem">
      <p>
        <a href="<?=$baseUrlFooter?>/personal_watch_list/PersonalWatchListHomePage.php" style="text-decoration:none">PERSONAL SHOWS LIST</a>
      </p>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="http://localhost/PictureIndex/dist/sweetalert2.min.js"></script>
  
</footer>