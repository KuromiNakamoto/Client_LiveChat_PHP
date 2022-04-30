<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LIVE CHAT - CLIENT</title>
  <link rel="stylesheet" href="/source/css/design.css?<?= time(); ?>">
  <script src="/source/js/plugins/jquery.min.js"></script>
</head>
<body>
  <?php
  if (!isset($_SESSION['user'])) {
    echo "
    <script>
      var confirm_ = prompt('Vui lòng điền username của bạn :');
      if (confirm_ !== null) {
        $.ajax({
          type: 'POST',
          url: '/create_session.php',
          data: {
            username: confirm_
          },
          dataType: 'json',
          success: function (response) {
            if (response.status == 'thanhcong') {
              location.reload();
            } else {
              alert(response.msg);
              location.reload();
            }
          },
          error: function (error) {
            console.log(error);
            alert('Đã xảy ra lỗi !');
            location.reload();
          }
        })
      }
    </script>
    ";
  } else {
  ?>
  <input type="hidden" value="<?= $_SESSION['user']; ?>" id="user_session">
  <div class="content" style="--data-bg:url('../images/bg1.jpg');">
    <div class="flex-center">
      <div id="chatbox">
        <h1 id="chatbox-title">CHAT BOX</h1>
        <div id="msg-list"></div>
        <form method="POST" id="msg-send">
          <input type="text" id="msg-sendbox" placeholder="Tin nhắn muốn gửi..." oninput="checkMsg(this);">
          <button id="msg-sendbutton" type="submit" disabled>Gửi</button>
        </form>
      </div>
    </div>
  </div>
<script>
var load_timeout = 1200;
</script>
<script src="/source/js/script.js?<?= time(); ?>"></script>
<?php } ?>
</body>
</html>