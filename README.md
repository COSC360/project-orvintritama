# COSC 360 Project Proposal

## Team Members:
- Kate Naychuk
- Orvin Tritama

## Project Description:
We will be going to undertake the project *MyDiscussionForum Website*. In this project, we will be implementing a full-stack web application that mimics the functionalities of *Reddit* and (or) *HackerNews*. In general, with this web application, users will be able to engage in online discussions through posts of other users (or their own post). In practice, the users are divided into 3 categories: **Unregistered Users**, **Registered Users**, and **Administrator**. Some functionalities will be shared amongst all 3 categories; however, each category has some distinct functionalities that other categories may or may not be able to do. Below are the functionalities of the users: 

## Functionalities by Users:
### 1. Shared Functionalities: These are functionalities that can be done by all 3 users
- Read or view discussions through the homepage
- Search for a post in the search box
- Sort based on most recent post (default) / popularity (upvote - downvote)

*In addition to the shared functionalities, here are some general features/functionalities that can be performed by each user group*

### 2. Registered Users:
- Login and Logout
*Note: Registered users can only register for a new profile once logged out* 
- Edit, update or delete own post
- Upvote and downvote on all posts
- Comments on all posts
- Edit own profile 
- Recover forgotten password

### 3. Unregistered Users:
- Register for a new profile

### 4. Administrator:
- Login and Logout ( as an Admin profile)
- Able to delete any user’s posts
- Delete any user’s comments
- Delete users profile
- Add comments 
- Search for users

### Note: 
- A user’s (or admin) profile would consist of profile name, profile picture (optional), birthday (optional), username, e-mail and password
- Users can only create or change username that is currently not used by other users
- Announcements and comments made by admin will have an **[ Admin ]** tag next to it for transparency
- Admin can delete any user profile, i.e: if user is making inappropriate comments or posts, the user will have their account deleted.

## General Website Features and Details:
Some other additional features in terms of the functional, design and responsiveness of general website will be implemented. In addition to posting the website on cosc360.ok.ubc.ca, our website will have the following features and design:

### Client Side:
- Use of HTML and CSS (with Bootstrap) for page design and styling, along with JavaScript
- Responsive Design
- Navigation bar for users
- Asynchronous Updates with AJAX
- Error handling in bad redirection / failure in response
- All input forms will have validation (Cannot be empty and must adhere to the rules such as no symbol in username, password must consists of at least a number and a symbol)
- Client Side Security

### Server Side:
- Server side scripting with PHP
- Database Storage with MySQL
- Server Side security
- All inputs such as user account and its profile details, discussion in posts, comments, etc.. will be stored in database
- Asynchronous Updates with database
