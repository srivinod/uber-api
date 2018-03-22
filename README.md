# GETTING STARTED

Clone this app and launch them in servers of your choice this will launch your app

Navigate into the project root and run below command to launch the project

php -S localhost:8000


## UBER CLONE APP
 
This app works similar to cab service apps like UBER, LYFT etc., with minimal functions and features. 

Right now it only consists of REST API built using SLIM 3 framework using which you can extend your own front end.


## REST API ENDPOINTS

Below is the list of API endpoints of our app:

<br>


| Method | URL  | Description |
| ------------- | ------------- | ------------- |
| GET | /cabs  | Fetch the entire list of cabs irrespective of distance.  |
| GET | /cabs/nearby/{location_value}  | Fetch nearby cabs only, {location_value} parameter must be sent in integer format (see location assumptions below).|
| GET |/cabs/{number}| Fetches particular cab details, {number} property has to be sent which is cabs number in integer.
| POST | /cabs/book  |Books a ride in particular cab, send {cab_number} as a post parameter in integer format which is a cab's number.|
| POST | /calculate/fare |  Calculate the fare for the particular ride, See Fare calculations below| 
 
<br>

## FARE CALCULATIONS

Fare is calculated as 1 COINS per minute and 2 COINS per kilometer, sum gives the total fare for the ride.

## LOCATION ASSUMPTIONS

We have assumed location to be flat instead of LATITUDE and LONGITUDE just provide single numeric values and locate based on numbers
 
