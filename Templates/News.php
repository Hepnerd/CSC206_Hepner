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
        foreach ( $data as $story ) {
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
        $title = $data['title'];
        $content = $data['content'];
        $startDate = $data['startDate'];
        $endDate = $data['endDate'];
            //        $author = $data['firstname'] . ' ' . $data['lastname'];

        echo <<<story
        <div class="top10">
            <h2>$title</h2>
            <p>$content</p>
            <h5>Start Date: $startDate</h5>
            <h5>End Date: $endDate</h5>
        </div>        
story;
    }
}