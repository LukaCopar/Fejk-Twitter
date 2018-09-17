/*
Created		4. 09. 2018
Modified		4. 09. 2018
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


Create table users (
	id Serial NOT NULL,
	country_id Bigint UNSIGNED NOT NULL,
	name Text NOT NULL,
	surname Text NOT NULL,
	password Text NOT NULL,
	username Text NOT NULL,
	profile_pic_URL Text NOT NULL,
	birthday Date,
	authentication_token Text,
 Primary Key (id)) ENGINE = MyISAM;

Create table tweets (
	id Serial NOT NULL,
	user_id Bigint UNSIGNED NOT NULL,
	content Text NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table comments (
	id Serial NOT NULL,
	content Text NOT NULL,
	user_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table likes (
	id Serial NOT NULL,
	user_id Bigint UNSIGNED NOT NULL,
	tweet_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table retweets (
	id Serial NOT NULL,
	user_id Bigint UNSIGNED NOT NULL,
	tweet_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table hashtags (
	id Serial NOT NULL,
	hashtag Text NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table messages (
	id Serial NOT NULL,
	recieved_id Bigint UNSIGNED NOT NULL,
	sent_id Bigint UNSIGNED NOT NULL,
	content Text NOT NULL,
	time Datetime NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table notifications (
	id Serial NOT NULL,
	conten Text,
	user_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table comments_tweets (
	id Serial NOT NULL,
	comment_id Bigint UNSIGNED NOT NULL,
	tweet_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table hashtags_tweets (
	id Serial NOT NULL,
	tweet_id Bigint UNSIGNED NOT NULL,
	hashtag_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table follows (
	id Serial NOT NULL,
	user_id Bigint UNSIGNED NOT NULL,
	follower_id Bigint UNSIGNED NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;

Create table countries (
	id Serial NOT NULL,
	name Text NOT NULL,
	acronym Text NOT NULL,
 Primary Key (id)) ENGINE = MyISAM;


Alter table tweets add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table comments add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table likes add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table follows add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table follows add Foreign Key (follower_id) references users (id) on delete  restrict on update  restrict;
Alter table messages add Foreign Key (recieved_id) references users (id) on delete  restrict on update  restrict;
Alter table messages add Foreign Key (sent_id) references users (id) on delete  restrict on update  restrict;
Alter table notifications add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table retweets add Foreign Key (user_id) references users (id) on delete  restrict on update  restrict;
Alter table comments_tweets add Foreign Key (tweet_id) references tweets (id) on delete  restrict on update  restrict;
Alter table hashtags_tweets add Foreign Key (tweet_id) references tweets (id) on delete  restrict on update  restrict;
Alter table likes add Foreign Key (tweet_id) references tweets (id) on delete  restrict on update  restrict;
Alter table retweets add Foreign Key (tweet_id) references tweets (id) on delete  restrict on update  restrict;
Alter table comments_tweets add Foreign Key (comment_id) references comments (id) on delete  restrict on update  restrict;
Alter table hashtags_tweets add Foreign Key (hashtag_id) references hashtags (id) on delete  restrict on update  restrict;
Alter table users add Foreign Key (country_id) references countries (id) on delete  restrict on update  restrict;


