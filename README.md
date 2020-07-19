# BitcubeEval
This is a responsive web application for a registration form that will allow the end user to use a website.
It also allows the user to login using an email and a password.
Upon successful login, the user accesses my profile or friends list page.

## Criteria and Deliverables:
-Allows only a unique email address to be registered</br>
-User must supply atleast their first name and last name</br>
-Password entered by user must have atleast 1 uppercase character, 1 lowercase character, 1 special character and 1 numeric character.
-When entering login details,  user can choose if they want the password to be remembered each time they want to login

## Instructions for user:
-Can access it from any device as it is responsive (mobile screen, tablet screen, desktop screen)</br>
-Access it through a search engine.</br>
-Enter the required information into the form and click the 'Register' or 'Login'button.</br>
-E-mail address must be unique.</br>
-The first and last name is required.</br>
-Password must contain atleast 1 uppercase character, 1 lowercase character, 1 special character and 1 numeric character.
-If user doesn't exist, they will be required to register by clicking the 'register' button.

## Input
-User enters data in the form input fields and clicks the 'Register' or 'Login' button.
-User clicks on profile button to view profile page
-user clicks on friends button to view friend list page.

## Process
-Input is validated using regular expressions.</br>
-Password is encrypted.</br>
-The user input (data) gets stored in the website database.

If logging in:
-Application checks if the email address entered exists in the database. If not it generates a 'no user' error

## Output
-Error messages are displayed on the screen if user input was invalid.</br>
-Success message is displayed on the screen if data was stored successfully
-Profile is displayed upon successful login.
-User can click on the friends button to view list of friends.

## Technologies used
-HTML5, CSS3, PHP, MySQLi, Apache</br>
-Git and GitHub</br>
-Visual Studio Code</br>
-XAMPP (phpMyAdmin)


