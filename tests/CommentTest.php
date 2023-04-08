<?php
include("includes/classes/Comment.php");

class CommentTest extends \PHPUnit\Framework\TestCase {
    public function testGetContent(){
        $comment = new Comment(1);
        $result = $comment -> getCommentContent();

        self::assertEquals("Commented by Kate!" ,$result);
    }
    public function testGetUserId(){
        $comment = new Comment(1);
        $result = $comment -> getUserId();

        self::assertEquals(3, $result);
    }
    public function testGetPostId(){
        
        $comment = new Comment(1);
        $result = $comment -> getPostId();

        self::assertEquals(1, $result);
    }
}

?>