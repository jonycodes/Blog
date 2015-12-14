# Blog+
Fully Functional!

Blog+ is a basic and fun web application I made to learn PHP, it's great for beginners to learn basic object oriented PHP concepts. You can go a step further and implement friends, comments, and profile features. 

Database setup:
	
	Database name: "first_db"
	
	table name: "list"
		columns: 
	 		"details" - text
	 		"time_posted" - time
			"date_posted" - varchar - 50
			"user" - varchar - 50
			"file_location" - varchar - 50
  	   		"id" - int - auto increment - primary key
			"status" - varchar - 50
	
	table name: "user"
		columns:
			"id" - auto increment - primary key
			"username" - varchar - 50
			"password" - varchar - 50
			"email" - varchar - 50

	optional table for comments: "list_details"
		columns:
			"user" - varchar - 50
			"details" - text
			"date_posted" - varchar 50
			"time_posted" - time
			"id" - int - auto increment - primary key
			"post_id" - int

This is the way I set up the data base, feel free to set it up however you like, however you must change the implementations in the php code

Main features:

	Post comments, images.
	Private and Public posts
	Registering


Main PHP classes:

add.php

	Uploads text and images to the server.
	Texts are stored in the data base
	Image posts are stored in the server and its location refernce in the database
	!!MAKE SURE TO CREATE "uploads" FILE FOR IMAGES ON ROOT DIRECTORY!! Ex: in Blog/uploads

add_post.php

	Loads text and image posts into the Home page

checklogin.php

	authenticaion 

connect.php

	connects to the database

delete_post.php

	deletes the post

home.php

	main home page of each user
	displays all post: private if they're from the user and all public post from other users	

index.php

	main page to register or login

init.php

	autoload classes

linklist.php

	originally set up to store comments from the database but comments feature is turned off

login.php

	login form

logout.php

	logs user out

register.php

	register form
	checks for same user name




