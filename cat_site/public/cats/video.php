<?php require_once('../../private/start.php'); ?>
<?php $cat_count = cat_count(); ?>

<!-- PAGE CONTENT -->
<!-- Set Page Title -->
<?php $page_title = 'Random Video'; ?>

<!-- get header -->
<?php include SHARED_PATH . '/header.php'; ?>

<!-- PAGE INTRO SECTION -->
<div class="intro">
  <div class="content-wrap">
    <h2 id="test">CAT VIDEO PAGE!</h2>
    <h2>Enjoy your video!!</h2>
    <p>Cat Count: <?php echo $cat_count; ?></p>
  </div>
</div>

<!-- MAIN CONTENT SECTION -->
<div class="main-section">
  <div class="content-wrap">

    <!-- video link -->
    <p name="video" id="video"> </p>

    <!-- Back Link -->
    <div class="back-link">
      <a href="<?php echo url_for('/index.php');?>">&laquo; Back to List</a>
    </div>
  </div>
</div>

<!-- get footer -->
<?php include(SHARED_PATH . '/footer.php'); ?>

<!-- script for random video -->
<!-- https://stackoverflow.com/questions/10079870/trying-to-display-a-random-video-on-page-load -->
<script type="text/javascript">
//video array
var videos = [
  '0Bmhjf0rKe8', //Suprised Kitty
  'yzP3kyAukHw', //Marmalade
  'J---aiyznGQ', //Keyboard Cat
  'DLzxrzFCyOs', //RickRoll!
  'hPzNl6NKAG0', //Maru
  'INscMGmhmX4', //Grumpy Cat
  '5fGQLHKx-Y0', //Nora
  'ElzPZNSdd5w', //Oskar
  'z3U0udLH974', //talking cats
  'NBQ-IzyhiWs', //Sho Ko balloon
  'QH2-TGUlwu4', //Nyan Cat
  'fzzjgBAaWZw' //stalking cat
];
var index=Math.floor(Math.random() * videos.length);
var videolink='<iframe width="890" height="500" src="http://www.youtube.com/embed/' + videos[index] + '" frameborder="0" allowfullscreen></iframe></div>';
document.getElementById("video").innerHTML = videolink;
</script>
