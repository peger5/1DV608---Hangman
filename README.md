# 1DV608---Hangman
Project for course 1DV608 - Webprogramming with PHP

**Application requires a SQL database in order to function**

Author: Petko Gerdzhikov

# Requirements
* Application must represent a playable game of Hangman
* Application should be user-friendly
* Application should guide the user with messages 
* Application should avoid unnecessary input by validation
* Application should follow web standarts
* Application should support the possiblity for users to add their own words with the help of a data base

# Use cases
## Use case 1 - Main menu guiding
1. Application presents the main menu page
2. User selects an option
   * Play
   * New game
   * Rules
   * Submit word
3. Application provides the appropriate page

## Use case 2 - Playing the game
1. Application provides the game screen
2. Application presents the hidden word with "_" characters
3. User inputs a letter from the displayed alphabet
4. Application gives a response
   * Shows the letter in the hidden word, does not increment remaining guesses
   * Decrements the remaining guesses, modifies the ASCII animation
5. Application gives a message when the player has won or lost

## Use case 3 - Game over and new game
1. User has run out of guesses or has guessed the word correctly
2. User returns to main menu
3. User presses *Give me a new word!*
4. User presses *Play!*
5. Application provides a new hidden word

## Use case 4 - Displaying the rules
1. Application provides the rules page

## Use case 5 - User adds a word
1. Application provides the submit form
2. User inputs the word he/she wishes to add
3. Application validates the input
4. Application provides a responce
   * Success responce - word has been added to database
   * Error responce - word has **not** been added to database
   
# Test cases
## Test case 1 - Inputing same letter while playing
1. User clicks on 'A'
2. Application decrements guesses or shows the places of 'A' in word
3. User clicks on 'A'
4. Application gives a message "Already entered that letter!" No change in guesses is made.

## Test case 2 - Inputing a non letter character from the URL while playing
1. User manually modifies the URL with *letter=1*
2. Application gives a message "You are trying to enter a non-letter!" No change in guesses is made.

## Test case 3 - User tires to add a word with 3 characters to data base
1. User inputs *asd* in submit form and clicks **Submit**
2. Application gives a message "Word must be between 4 and 8 characters." Word is not added to data base.

## Test case 4 - User tires to add a word with 10 characters to data base
1. User inputs *thisistenn* in submit form and clicks **Submit**
2. Application gives a message "Word must be between 4 and 8 characters." Word is not added to data base.

## Test case 5 - User tires to add a blank word
1. User leaves the input field empty and clicks **Submit**
2. Application gives a message "Only english letters allowed!" Word is not added to data base.

## Test case 6 - User tries to add a word containing numbers
1. User inputs *test1* and clicks **Submit**
2. Application gives a message "Only english letters allowed!" Word is not added to data base.
   
# Installation and configuration 
* Upload files to web server
* Edit the information in *Settings.php* accourding to SQL database parameters
