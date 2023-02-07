
# 🔥 Blog Web Application - Laravel Framework 🦆

Blog is a full stack web application used to show posts , create posts and retreive a post also you can write comments on each post and delete it whenever you like you can show popup of the post and alot of other feature.



## 🔥 Used Technologies

💙 Larvel Framework 

💙 Livewire for the comments section

💙 Laravel Eloquent ORM

💙 Bootstrap

💙 Ajax Requests for view post details with Bootstrap Modal




## 🔥 Features

✔️ CRUD operation on Posts 

✔️ Implement Resource Controller methods like screenshots 
  (Index, Create, Store, Edit, Update, Destroy, Show)

✔️ blade layout to not duplicate navbar across view ﬁles 

✔️ When submitting a form  redirect back to /posts route 

✔️ Button blade component that accepts type parameter so that it can be called like this 

✔️ migrations & model for db posts table 

✔️ CRUD operation on Posts are stored in the DB

✔️ When Delete buttons are clicked it shows a warning before deleting and i choose between yes to conﬁrm Delete or no using Bootstrap Modal

✔️ the Created At column In Index & Show page is formated using carbon 

✔️ Edit and Create Post Creator Field must be drop down list of users 

✔️ PostSeeder & PostFactory  class to posts table and users tablewith 500 records

✔️ pagination to Index page

✔️ comments CURD inside show post page using polymorphic relation

✔️ Soft delete button on index page to restore deleted posts 

✔️ Accessor Method inside Post Model 
```
 $post->human_readable_date
```
   that returns human readable carbon used in posts/{id} 

✔️View Ajax Button to posts page , that opens Bootstrap Modal, showing post info (title , escription , username, useremail)  using ajax request 

✔️  livewire to make your comments doesn’t refresh the page when making CRUD

✔️  livewire to make your comments doesn’t refresh the page when making CRUD

✔️ Each post have slug

✔️ PruneOldPostsJob Queue Job when dispatched it deletes posts that are created from 2 years ago

✔️ Using Task Scheduling to schedule PruneOldPostsJob to run daily at midnight

✔️ Ability to upload image to post , and validated extensions are only (.jpg, .png) and using Storage to store and 
show images also when  updating post remove the old image, and when deleting post remove the old image


✔️ Make custom validation rule , that makes sure the user is only allowed to create 3 posts and if he exceeded this number we show a validation error message

✔️ Using spatie package to add Tags to post , the user will enter comma separated tags 


✔️  endpoints (api/posts GET , api/posts/{id} GET , api/posts POST) to get all posts and to get one post and to store a single post

✔️ Add Authentication middleware to the Api endpoints using Scantum

✔️ Eloquent Api Resource with pagination 

✔️ Eager Loading  when getting all posts to include the user relation to enhance performance

✔️Allow login with github & google and store user info for both providers

