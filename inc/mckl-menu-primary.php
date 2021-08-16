<?php


// bootstrap nav walker
function bootstrap4_custom_menu_class($theme_location)
{
    ob_start();
    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
        $menu = get_term($locations[$theme_location], 'nav_menu');
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        // $menu_list  = '<nav>' . "\n";
        echo '<ul class="navbar-nav">' . "\n";

        $count = 0;
        $submenu = false;
        foreach ($menu_items as $menu_item) {

            $link = $menu_item->url;
            $title = $menu_item->title;
            $next_count = ($count + 1 < count($menu_items)) ? $count + 1 : $count;

            if (!$menu_item->menu_item_parent) {
                $parent_id = $menu_item->ID;

                echo '<li class="nav-item dropdown">' . "\n";
                echo '<a href="' . $link . '" class="nav-link dropdown-toggle" id="nav-qwerty" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $title . '</a>' . "\n";
            }

            if ($parent_id == $menu_item->menu_item_parent) {

                if (!$submenu) {
                    $submenu = true;
                    echo '<ul class="dropdown-menu"  aria-labelledby="nav-qwerty">' . "\n";
                }

                //echo '<li class="item">' . "\n";
                echo '<a href="' . $link . '" class="dropdown-item">' . $title . '</a>' . "\n";
                //echo '</li>' . "\n";

                if ($menu_items[$next_count]->menu_item_parent != $parent_id && $submenu) {
                    echo '</ul>' . "\n";
                    $submenu = false;
                }
            }

            if ($menu_items[$next_count]->menu_item_parent != $parent_id) {
                echo '</li>' . "\n";
                $submenu = false;
            }

            $count++;
        }
        echo '</ul><!-- ul1 -->' . "\n";
        echo '</ul><!-- ul2 -->' . "\n";
        //echo '</nav>' . "\n";
    } else {
        echo '<!-- no menu defined in location "' . $theme_location . '" -->';
    }
    // echo $menu_list;
    return ob_get_clean();
}
