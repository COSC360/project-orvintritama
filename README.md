# COSC 360 Project Proposal

## Team Members:
- Kate Naychuk
- Orvin Tritama

## Project Description:
We will be going to undertake the project *MyDiscussionForum Website*. In this project, we will be implementing a full-stack web application that mimics the functionalities of *Reddit* and (or) *HackerNews*. In general, with this web application, users will be able to engage in online discussions through posts of other users (or their own post). In practice, the users are divided into 3 categories: **Unregistered Users**, **Registered Users**, and **Administrator**. Some functionalities will be shared amongst all 3 categories; however, each category has some distinct functionalities that other categories may or may not be able to do. Below are the functionalities of the users: 

## Functionalities:
### 1. Shared Functionalities: These are functionalities that can be done by all 3 users
- Read or view discussions through the homepage
- Search for a post in the search box
- Sort based on most recent post (default) / popularity (upvote - downvote)

### 2. Registered Users:
- Login and Logout
*Note: Registered users can only register for a new profile once logged out* 
- Edit, update or delete own post
- Upvote and downvote on all posts
- Comments on all posts
- Edit own profile 

### 3. Unregistered Users:
- Register for a new profile

### 4. Administrator:
- Login and Logout ( as an Admin profile)
- Able to delete any user’s posts
- Delete any user’s comments
- Delete users profile
- Make announcement 
- Add comments 

### Note: 
- A user’s (or admin) profile would consist of profile name, profile picture (optional), birthday (optional), username, e-mail and password
- Users can only create or change username that is currently not used by other users
- Announcements and comments made by admin will have an **[ Admin ]** tag next to it for transparency
- Admin can delete any user profile, i.e: if user is making inappropriate comments or posts, the user will have their account deleted.
