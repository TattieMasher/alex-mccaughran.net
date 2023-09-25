<nav id="navbar">
    <img id="alex-pic" src="/images/Us.png">
    <h1 id="name">ALEX MᶜC<span id="end-name">AUGHRAN</span></h1>
    <button id="menu-toggle">&#9776;</button>
    <ul class="navbar-links">
        <?php
        $count = 0;
        // Iterate through the pages array (from config.php) to generate navigation links
        foreach ($pages as $pageName => $pageUrl) {
            $isActive = false;

            // Check if the current page matches the link, or if it's empty or if it is 'index.php' (needs this on my local dev environment)
            if (str_contains($current_page, basename($pageUrl, '.php')) || empty($current_page) || str_contains($current_page, 'index.php')) {
                $isActive = true;
            }

            // Set class to the current element depending on whether or not the current page is the one visited
            $class = ($isActive) ? 'active-link' : 'inactive-link';
            if ($count == 0) {
                echo '<li><a class="navbar-link ' . $class . '" href="/">' . $pageName . '</a></li>';
            } else {
                echo '<li><a class="navbar-link ' . $class . '" href="/' . $pageUrl . '">' . $pageName . '</a></li>';
            }
            $count++;
        }
        ?>
    </ul>
</nav>