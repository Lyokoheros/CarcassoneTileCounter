# Carcassone - Tile Counter
An simple web app, to help playing Carcassone (online or not) by keeping track on used tiles

## Table of content
* [General info and usage](#General-info-and-usage)
* [Technologies](#Technologies)
* [Setup](#Setup)
* [Choosing Language Version](Choosing-Language-Version)
* [App's Future](#App's-future)

## General info and usage
Carcassone is a simple board game which main element is adding tiles to constantly constructed board. To determine best possible moves it's good to know what tiles are left (and with that what possibilities could we have) - this app let to know that without need to remembering not only the whole list of avaible tiles (enlarging with every expansion set) but also how much were used (or counting it every time again). 

To use the app user simply needs to choose which expansion are used, and then on the next screen mark a tile everytime it is used to keep information of the game up to date.

## Technologies
- PHP
- MySQL
- XAMPP

## Setup
This app require's no installation, but requires XAMPP (or any program with such functions like XAMPP).
To use it just put the folder inside htdocs, launch XAMPP apache and MySQL server and go to http://localhost/CarcassoneTileCounter (if You put it directly into htdocs folder, in other cases customize the link accordingly). On first run app will create and pupulate the database if needed.

## Choosing Language Version
Currently default application language is Polish, but the app could also be used in English. To change language version go to render.php file in main folder and change $language variable accordingly (You shoul put there a valid languge shortcut, for now shortcuts that will work are: 'Pl' and 'Eng')

## App's Future
Currently app is at early development state and not all functions are ready.
After the base app is finished there will be added such features like:
- rebuilding translation system: handling translation throught database
- changing language in app
- storing game states
