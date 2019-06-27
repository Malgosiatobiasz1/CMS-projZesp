

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";





CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Websites'),
(8, 'Games'),
(9, 'Apps');





CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(11, 6, 'George Tourtsinakis', 'bee@yahoo.gr', 'You rock', 'unapproved', '2017-01-28'),
(12, 7, 'bee', 'bee@yahoo.gr', 'Your second post rocks', 'approved', '2017-02-01');

-- --------------------------------------------------------


CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(6, 2, 'Hearthstone rank 9', 'George Tourtsinakis', '2017-02-02', 'Hearthstone Screenshot 01-23-17 22.20.27.png', '<p><strong>hearthstone, rank 9, priest</strong></p>', 'hearthstone, rank 9, priest', 1, 'published'),
(7, 2, 'This is another post', 'George', '2017-02-02', '', '<p>Just another post</p>', 'second post', 1, 'draft'),
(8, 2, 'Draft post test', 'Bee', '2017-02-02', '', '<p>draft</p>', 'draft', 0, 'draft'),
(9, 2, 'frogpaw', 'bogo', '2017-02-02', 'frog.jpg', '<p><strong>Frogs are very good animals and you must not eat them!!!!</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', '', 0, 'published');



CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_first_name` varchar(20) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(1, 'Bogo', '1234', 'George', 'Tourtsinakis', 'caterpilarbogo@gmail.com', '', 'admin', ''),
(2, 'bobiras', '1234', 'Bobiras', 'Mpampouras', 'bobiras@yahoo.gr', '', 'admin', ''),
(3, 'Tweety', '1234', 'Tweety', 'Tweety', 'Tweety@gmail.com', '', 'subscriber', ''),
(4, 'tweeta', '123456', 'tweeta', 'tweeta', 'tweeta@gmail.com', '', 'subscriber', '');


ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);


ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);


ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

