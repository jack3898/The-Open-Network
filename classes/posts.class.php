<?php

class Posts extends dbconn{
    public $post;

    function __construct(string $method, string $username){
        
        // Edit bio script
        if($method === 'get'){
            $conn = $this->connect();

            $sql = "SELECT * FROM posts_detail WHERE username = '{$username}' ORDER BY posts_detail.post_date DESC";

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
