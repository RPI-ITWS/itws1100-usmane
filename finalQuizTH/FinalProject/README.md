# Team 11 - Movies, Books and TV

## Description

MBT is a web application that serves as a place for media and book enthusiasts to share their thoughts on titles they've consumed and discover new ones based on their interests.

Users can browse the catalog of books and movies to find new titles that interest them.

After watching or reading a new title, enthusiasts can provide their review so that they can organize their thoughts about all the media they've consumed, and to help other users find new titles that match their interests.

On the platform, users can build their profile by writing reviews for all kinds of media, earning achievements in the process. Users can also find other users with similar interests and share their ideas through discovery (coming soon).


## Server Setup

* To begin, create a MySQL database
* Incrementally apply the SQL migrations in `Database/Migrations` in numeric order
* Copy the file `Components/Scripts/credentials.php.template` and name it `credentials.php`, stored in the same directory
* Update the fields in `credentials.php` with your database credentials
* Spawn a web server such as Apache or NginX to run the PHP

## Server Maintenance

* To make changes to the book or movie catalog, you can update their respective json files located in `Resources/Data`
* To add thumbnails for new titles, you can add the image to `Images/Covers`
