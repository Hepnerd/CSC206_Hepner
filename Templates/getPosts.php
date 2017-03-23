<?php

class getPosts
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
        $id = $data['id'];
        $title = $data['title'];
        $content = $data['content'];
        $startDate = $data['startDate'];
        $endDate = $data['endDate'];
        //        $author = $data['firstname'] . ' ' . $data['lastname'];

        echo <<<story
        <tr>
        <td>$id</td>
        <td class="viewPosts">$title</td>
        <td class="viewPosts">$content</td>
        <td>$startDate</td>
        <td>$endDate</td>
        <td><a href="viewPost.php?id=$id">View</a></h4></td>
</tr>
story;
    }
}