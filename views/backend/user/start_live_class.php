<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://meet.jit.si/external_api.js'></script>
    <style>html, body, #jaas-container { height: 100%; }</style>
    <script type="text/javascript">
      Object.defineProperty(navigator, 'userAgent', {
        get: function () { return 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36'; }
      });
      window.onload = () => {
        const api = new JitsiMeetExternalAPI("meet.jit.si", {
          enableClosePage: true,
          roomName: 'vpaas-magic-cookie-335c4d203e284e58853448d95dedda2d/<?php echo $_GET['id'] ?>',
          parentNode: document.querySelector('#jaas-container'),
        });

        api.addEventListener('readyToClose', function(){
          window.close();
        });
      }
    </script>
  </head>
  <body><div id="jaas-container" style="height: 100vh" /></body>
</html>

