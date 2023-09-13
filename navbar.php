<nav id="navbar">
    <img id="alex-pic" src="images/Us.png">
    <h1 id="name">ALEX MᶜC<span id="end-name">AUGHRAN</span></h1>
    <button id="menu-toggle">&#9776;</button>
    <ul class="navbar-links">
        <?php
        // Iterate through the pages array (from config.php) to generate navigation links
        foreach ($pages as $pageName => $pageUrl) {
            $isActive = false;

            // Check if the current page matches the link, or if it's empty or if it is 'index.php' (needs this on my local dev environment)
            if (str_contains($current_page, basename($pageUrl, '.php')) || empty($current_page) || str_contains($current_page, 'index.php')) {
                $isActive = true;
            }

            // Set class to current element dependng on whether or not current it is the one visited
            $class = ($isActive) ? 'active-link' : 'inactive-link';
            echo '<li><a class="navbar-link ' . $class . '" href="' . $pageUrl . '">' . $pageName . '</a></li>';
        }
        ?>
    </ul>
</nav>