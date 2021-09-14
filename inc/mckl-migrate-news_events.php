<?php


if (!function_exists('post_exists')) {
    require_once(ABSPATH . 'wp-admin/includes/post.php');


    function filter_post_content($str)
    {
        $output = str_replace("../files", "https://mckl.edu.my/files", $str);
        $output = str_replace("&quot;", "\"", $output);
        $output = preg_replace("/width.+?height.+?;/", "", $output);
        $output = str_replace("font-size:14px;", "", $output);
        $output = str_replace("color: rgb(5, 5, 5); font-family: &amp;quot;Segoe UI Historic&amp;quot;, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif; font-size: 15px;", "", $output);
        $output = str_replace("font-family:trebuchet ms,helvetica,sans-serif;", "", $output);

        $output = wp_specialchars_decode($output);
        return $output;
    }

    function migrate_create_post()
    {

        /* $servername = "localhost";
        $username = "mckledum_unousr";
        $password = "p]H7aoKeeTTg";
        $dbname = "mckledum_unodbv2"; */


        /* $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mckledum_unodbv2"; */

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully<br>";

        $all_posts = [];
        $all_events = [];

        $sql = "SELECT Title, Description, DateCreated, DateModified, Status FROM uno_news";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            // print_r($result->fetch_assoc());
            while ($row = $result->fetch_assoc()) {
                // echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                $clean_row = [
                    'post_title'    => $row['Title'],
                    'post_content'  => filter_post_content($row['Description']),
                    'post_date' => date('Y-m-d H:i:s', $row['DateCreated']),
                    'post_modified' => date('Y-m-d H:i:s',  $row['DateModified']),
                    'post_status'   => $row['Status'] ? 'publish' : 'draft',
                    'post_author'   => 1,
                    'post_category' => array(15),
                ];

                print_r($clean_row);
                echo '<br><br>';

                array_push($all_posts, $clean_row);
            }
        } else {
            echo "0 results";
        }

        $sql = "SELECT Title, Description, DateCreated, DateModified, Status FROM uno_event";
        $result = $conn->query($sql);

        print_r($result);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clean_row = [
                    'post_title'    => $row['Title'],
                    'post_content'  => filter_post_content($row['Description']),
                    'post_date' => date('Y-m-d H:i:s', $row['DateCreated']),
                    'post_modified' => date('Y-m-d H:i:s',  $row['DateModified']),
                    'post_status'   => $row['Status'] ? 'publish' : 'draft',
                    'post_author'   => 1,
                    'post_category' => array(16),
                ];

                print_r($clean_row);
                echo '<br><br>';

                array_push($all_events, $clean_row);
            }
        } else {
            echo "0 results";
        }

        $conn->close();

        // foreach loop
        foreach ($all_posts as $post) {

            // $post_title = "<get post title>";

            $found_post = post_exists($post['post_title'], '', '', '');

            if ($found_post) {
                echo 'post found - ' . $post['post_title'] . ' - ' . $post['post_status'] . '<br>';
                continue;
            } else {
                echo 'post not found - ' . $post['post_title'] . ' - ' . $post['post_status'] . '<br>';
            }

            // Insert the post into the database.
            /* $new_post = wp_insert_post($post);
			print_r($new_post); */
        }


        echo '---events---<br>';
        foreach ($all_events as $post) {

            // $post_title = "<get post title>";

            $found_post = post_exists($post['post_title'], '', '', '');

            if ($found_post) {
                echo 'post found - ' . $post['post_title'] . ' - ' . $post['post_status'] . '<br>';
                continue;
            } else {
                echo 'post not found - ' . $post['post_title'] . ' - ' . $post['post_status'] . '<br>';
            }

            // Insert the post into the database.
            /* 	$new_post = wp_insert_post($post);
			print_r($new_post); */
        }
    }


    // migrate_create_post();
}
