CREATE TABLE users
(user_id INT AUTO_INCREMENT,
 user_loginID VARCHAR(128) NOT NULL,
 user_password VARCHAR(128) NOT NULL,
 user_name VARCHAR(128) NOT NULL,
 user_course VARCHAR(128) NOT NULL,
 user_major VARCHAR(128),
 user_grade INT NOT NULL,
 user_classname VARCHAR(128),
 user_Fsubject VARCHAR(128),
 PRIMARY KEY(user_id)
);

CREATE TABLE evaluation
(evaluation_id INT AUTO_INCREMENT,
 user_id INT NOT NULL,
 evaluation_trp BIGINT NOT NULL,
 evaluation_receivednum INT NOT NULL,
 evaluation_receivedvalue INT NOT NULL,
 evaluation_sentnum INT NOT NULL,
 evaluation_sentvalue INT NOT NULL,
 PRIMARY KEY(evaluation_id),
 FOREIGN KEY (user_id)
	REFERENCES users(user_id)
);

CREATE TABLE posts
(post_id INT AUTO_INCREMENT,
 user_id INT NOT NULL,
 post_flag BOOLEAN NOT NULL,
 post_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 post_title VARCHAR(128) NOT NULL,
 post_subject VARCHAR(128) NOT NULL,
 post_text TEXT NOT NULL,
 PRIMARY KEY(post_id),
 FOREIGN KEY (user_id)
 	REFERENCES users(user_id)
);

CREATE TABLE replies
(reply_id INT AUTO_INCREMENT,
 post_id INT NOT NULL,
 user_id INT NOT NULL,
 reply_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 reply_text TEXT NOT NULL,
 PRIMARY KEY(reply_id),
 FOREIGN KEY (user_id)
 	REFERENCES users(user_id)
);

CREATE TABLE post_images
(post_image_id INT AUTO_INCREMENT,
 post_id INT NOT NULL,
 post_image_path VARCHAR(400) NOT NULL,
 PRIMARY KEY(post_image_id),
 FOREIGN KEY (post_id)
 	REFERENCES posts(post_id)
);

CREATE TABLE reply_images
(reply_image_id INT AUTO_INCREMENT,
 reply_id INT NOT NULL,
 reply_image_path VARCHAR(400) NOT NULL,
 PRIMARY KEY(reply_image_id),
 FOREIGN KEY (reply_id)
 	REFERENCES replies(reply_id)
);

CREATE TABLE post_files
(post_file_id INT AUTO_INCREMENT,
 post_id INT NOT NULL,
 post_file_path VARCHAR(400) NOT NULL,
 PRIMARY KEY(post_file_id),
 FOREIGN KEY (post_id)
 	REFERENCES posts(post_id)
);

CREATE TABLE reply_files
(reply_file_id INT AUTO_INCREMENT,
 reply_id INT NOT NULL,
 reply_file_path VARCHAR(400) NOT NULL,
 PRIMARY KEY(reply_file_id),
 FOREIGN KEY (reply_id)
 	REFERENCES replies(reply_id)
);

CREATE TABLE notices
(notice_id INT AUTO_INCREMENT,
 post_id INT NOT NULL,
 user_id INT NOT NULL,
 notice_readFlag BOOLEAN NOT NULL,
 notice_getRP INT NOT NULL,
 notice_beforeTrp INT NOT NULL,
 notice_evaluateNum INT NOT NULL,
 notice_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY(notice_id),
 FOREIGN KEY (post_id)
	REFERENCES posts(post_id),
 FOREIGN KEY (user_id)
	REFERENCES users(user_id)
);

CREATE TABLE events
(event_id INT AUTO_INCREMENT,
 event_start DATETIME,
 event_end DATETIME,
 event_title VARCHAR(128) NOT NULL,
 event_content TEXT NOT NULL,
 PRIMARY KEY(event_id)
);