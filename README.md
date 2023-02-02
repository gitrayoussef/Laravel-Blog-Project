
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
