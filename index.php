<?php
// Server-side redirect to CMS to avoid relying on client-side JS
http_response_code(302);
header('Location: CMS/');
exit;
?>
<noscript>
	<meta http-equiv="refresh" content="0; url=CMS/">
	<p>If you are not redirected, <a href="CMS/">click here</a>.</p>
  
</noscript>