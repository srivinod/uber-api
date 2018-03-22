# GETTING STARTED

Clone this app and launch them in LAMP or WAMP servers this will launch your app

For example in WAMP, run below command to launch the server

php -S localhost:8000


# UBER LIKE APP
 
This app works similar to cab service apps like UBER, LYFT with minimal functions and features. 

Right now it only consists of REST API built using SLIM 3 framework using which you can extend your own front end.


### REST API ENDPOINTS

Below is the list of API endpoints of our app:


#### GET 


| First Header  | Second Header |
| ------------- | ------------- |
| /cabs  | Fetch the entire list of cabs irrespective of distance.  |
| /cabs/nearby/{location_value}  | Fetch nearby cabs only, {location_value} parameter must be sent in integer format (see location assumptions below).|
|/cabs/{number}| Fetches particular cab details, {number} property has to be sent which is cabs number in integer.

#### POST 


| First Header  | Second Header |
| ------------- | ------------- |
| /cabs/book  |Books a ride in particular cab, send {cab_number} as a post paramter in integer format which is a cabs number.|
| /calculate/fare |  Calculate tha fare for the particular ride, See Fare calculations below| 
 

### Fare Calculation

Fare is calculated as one COINS per minute and two COINS per kilometer, sum gives the total fare for the ride.

### Location Assumptions

We have assumed location to be flat instead of LATITUDE and LONGITUDE just provide single numeric values and locate based on numbers
 
