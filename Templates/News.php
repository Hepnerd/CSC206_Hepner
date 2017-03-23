<?php

class news
{
    /**
     * Pass in an array of stories to render
     *
     * @param $data
     */
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
        $sql = 'select convert(date, $startDate())';
        $title = $data['title'];
        $content = $data['content'];
        $startDate = $data['startDate'];
        $endDate = $data['endDate'];
        $id = $data['id'];
            //        $author = $data['firstname'] . ' ' . $data['lastname'];

        echo <<<story
        <div class="top10">
            <h2 class="blogdata">$title</h2>
            <p class="blogdata">$content</p>
            <h5>Start Date: $startDate</h5>
            <h5>End Date: $endDate</h5>
            <h4><a href="updatePost.php?id=$id">Edit</a> 
            <a href="deletePost.php?id=$id">Delete</a>
            <a href="viewPost.php?id=$id">View</a></h4>
            
        </div>        
story;
    }
}