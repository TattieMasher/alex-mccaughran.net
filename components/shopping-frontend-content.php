<div class="code-block">
                    <pre><code class="language-js">if ($shadyUrl !== false) {
    $originalURL = urldecode($shadyUrl);

    // Display the redirect button within the center of the page
    echo '&ltdiv id="center-button">&lta id="shady-link" href="http://' . $originalURL . '">&ltbutton id="success">Claim Gift&lt/button>&lt/a>&lt/div>';
    } else {
    echo '&ltdiv id="center-button">&ltbutton id="failure">This link has expired!&lt/button>&lt/div>';
}</code></pre>
    <p>
        A button is displayed in the center of the viewport.
    <br><br>If the original URL could be found in the database, the button appears green and the original URL is added itno the href attribute of the anchor around the button.
    <br><br>If it can't be found, the button will display as red and say a generic "link has expired" message.
    </p>
</div>