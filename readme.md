# CRUD-o REST API

This is a simple REST API that works as a backend for CRUDO's app.
Frontend Deploy: https://crud-o.vercel.app/
Backend Deploy: https://api-crudo.herokuapp.com/

## Installation
- Clone this project inside your server
- Run your server and your MySQL server
- Set your database credentials in the config.php file
<hr>

    git clone https://github.com/iElectro13/api-CRUDo.git

## Endpoints

BASE URL: https://api-crudo.herokuapp.com/api
 
 ### Date:
GET: ***/date.php***
Get the whole date list

POST: ***/date.php***
Saves a new date. You have to send this body:

    {
    	"name": "Enter your name",
    	"topic": "Enter your topic",
    	"date": "Enter your appointment date as YYYY-MM-DD HH:MM:SS"
    }


PUT: ***/date.php?id=***
Updates a registry. You have to pass an id from the url and send this body:

    {
    	"name": "Enter your name",
    	"topic": "Enter your topic",
    	"date": "Enter your appointment date as YYYY-MM-DD HH:MM:SS"
    }

DELETE: ***/date.php?id=***
Deletes a registry. Yo have to pass an id from the url.


## Developers
Developed by:
[iElectro13](https://github.com/iElectro13)
[ElCabal](https://github.com/ElCabal)