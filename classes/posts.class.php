<?php

class Posts extends dbconn{
    public $post;
    public $result;

    function __construct(string $method, string $username){
        
        // Edit bio script
        if($method === 'get'){
            $conn = $this->connect();


            /**
             * This query takes the posts_detail view (which is an INNER JOIN of posts and users)
             * and gathers the existing friends of the user to which it will filter out
             * posts from the posts_detail view using only names of the friends or the original author of the post
             */
            $sql = "SELECT * FROM `posts_detail`
                    INNER JOIN(
                        SELECT username FROM `existingfriends` WHERE friends = '$username'
                        UNION
                        SELECT friends FROM `existingfriends` WHERE username = '$username'
                    )
                    AS simple_friends
                    ON posts_detail.username = '$username'
                    OR simple_friends.username = posts_detail.username
                    GROUP BY posts_detail.id
                    ORDER BY CAST(`posts_detail`.`post_date` AS int)
                    DESC";

            $query = mysqli_query($this->connect(), $sql);

            if(mysqli_num_rows($query) > 0){
                $rows = array();
                while($row = mysqli_fetch_assoc($query)) {
                    $rows[] = $row;
                }
                $this->result = $rows;
            }
        }
    }
}
