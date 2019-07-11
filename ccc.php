<?php
$sitekey = '6LcO-50UAAAAAIEgcSyMx2Cq5w5P0hz7mUKSfeS6';
$secretkey = '6LcO-50UAAAAAAT2lZz52H0qQzAt8tjf9lZgAzXR';


?>




<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <script type="text/javascript">
  var onloadCallback = function() {
    alert("grecaptcha is ready!");
  };
</script>
  </head>
  <body>
    <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6LcO-50UAAAAAIEgcSyMx2Cq5w5P0hz7mUKSfeS6"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>