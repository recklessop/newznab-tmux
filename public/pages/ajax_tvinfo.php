<?php

use App\Models\User;
use App\Models\Video;
use nntmux\Releases;
use App\Models\Release;

if (! User::isLoggedIn()) {
    $page->show403();
}

if (! isset($_REQUEST['id'])) {
    $page->show404();
}

$r = new Releases();
$rel = Release::getByGuid($_REQUEST['id']);

if (! $rel) {
    echo 'No tv info';
} else {
    echo "<ul class=\"ui-tooltip-nntmux\">\n";
    echo '<li>'.htmlentities($rel['title'], ENT_QUOTES)."</li>\n";
    echo '<li>Aired on '.date('F j, Y', strtotime($rel['firstaired']))."</li>\n";
    echo '</ul>';

    if (isset($rel['videos_id']) && $rel['videos_id'] > 0) {
        $show = Video::getByVideoID($rel['videos_id']);
        if (count($show) > 0 && (int) $show['image'] !== 0) {
            echo '<img class="shadow" src="/covers/tvshows/'.$show['id'].'.jpg" width="180"/>';
        }
    }
}
