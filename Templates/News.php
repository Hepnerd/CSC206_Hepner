<?php

class news
{
    /**
     * Pass in an array of stories to render
     *
     * @param $data
     */

    public static function LoggedIn($id)
    {

        // $user = $_SESSION['user'];
        return $x = '
            <h4><a href="updatePost.php?id=' . $id . '">Edit</a> 
            <a href="deletePost.php?id=' . $id . '">Delete</a>
            <a href="viewPost.php?id=' . $id . '">View</a></h4>';
    }


    public static function stories($data)
    {
        foreach ($data as $story) {
            Self::story($story);
        }
    }

    /**
     * Render a single story
     *
     * @param $data
     */
    public static function story($data)
    {
        $menu = '';
        $image = '';

        $sql = 'select convert(date, $startDate())';
        $title = $data['title'];
        $content = $data['content'];
        $startDate = $data['startDate'];
        $endDate = $data['endDate'];
        $pic = $_SERVER['DOCUMENT_ROOT'] . '/Assets/images/' . $data['image'];

        if (is_file($pic)) {
            $image = '<img src = "/Assets/images/' . $data['image'] . '" width="500">';
        } else {
            $image = '';
        }

        $id = $data['id'];
        //        $author = $data['firstname'] . ' ' . $data['lastname'];

        if (isset($_SESSION['user'])) {
            $menu = static::LoggedIn($id);
        }
        echo <<<story
        <div class="top10">
            <h2 class="blogData">$title</h2>
            $image
            <p class="blogData">$content</p>
            <h5>Start Date: $startDate</h5>
            <h5>End Date: $endDate</h5>  
            
            $menu
        </div>        
story;
    }
}