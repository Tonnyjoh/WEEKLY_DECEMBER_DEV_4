<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="CSS/style2.css" />
    <link rel="stylesheet" href="CSS/style.css" />

    <title>Week-4</title>
  </head>
  <body>
    <div class="allpage">
      <div id="sidebar" class="sidebar">
        <h1 class="title">Week 4</h1>
      </div>

      <div id="short" class="page">
        <h2><i class="fa-solid fa-link"></i>Shorter url</h2>

        <div class="box url-box">
          <form id="form" action="PHP/shorten.php" method="post">
            <label for="longUrl">Enter Long URL :</label>
            <input id="longUrl" type="text" name="longUrl" required />
            <label for="customAlias">Custom (Optionnal) :</label>
            <input type="text" name="customAlias" />
            <button type="submit">Send</button>
          </form>
          <?php if (!empty($_SESSION['shortUrl'])) : ?>
          <div id="div-link">
            Your link:<a
              id="tylelien"
              href="<?php echo $_SESSION['longUrl']; ?>"
              ><?php echo $_SESSION['shortUrl']; ?></a
            >
          </div>
          <?php endif; ?>
          <i id="copy" class="fa-solid fa-clone">
            <span id="btnCopy">copy</span></i
          >
        </div>
      </div>

      <div id="qrcode" class="page container">
        <h2><i class="fa-solid fa-qrcode"></i> Qr Code Generator</h2>

        <div class="url-box">
          <p>Paste a url or enter text to create QR code</p>
          <input
            type="text"
            class="userInput"
            placeholder="Enter text or url" />
        </div>
        <button id="boutonGen" class="generate-btn">Generate QR Code</button>
        <div class="qr-box">
          <img src="" alt="" />
        </div>
      </div>

      <div id="share" class="page">
        <h2><i class="fa-solid fa-share-alt"></i> Share Options</h2>
        <div class="box share-box">
          <p>Share your shortened URL on different platforms:</p>
          <button class="accordion">Share</button>
          <div class="panel">
            <a href="https://twitter.com" target="_blank"
              ><i class="fa-brands fa-twitter"></i>Twitter</a
            >
            <a href="https://www.facebook.com" target="_blank"
              ><i class="fa-brands fa-facebook"></i>Facebook</a
            >
            <a href="https://github.com" target="_blank"
              ><i class="fa-brands fa-github"></i>GitHub</a
            >
            <a href="https://www.instagram.com" target="_blank"
              ><i class="fa-brands fa-instagram"></i>Instagram</a
            >
          </div>
        </div>
      </div>
    </div>

    <script src="JS/script2.js"></script>
    <script src="JS/script.js"></script>
  </body>
</html>
