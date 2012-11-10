Our App consists of various modules which are independent from each other. 

phpforecast(Trend forecasting system)

The forecast isdone taken into consideration a type of food and data over previous months.
The data.txt contains data for training the support vector machine trainer for regression purposes as our problem has too many non linear dependencies we use SVM for regression

Data format in data.txt 
actual data : 1:n-1 month actual data 2:n-1 market demand either high or low 3:n-1 actual supply last year goes on for 5 months 

Similarly we input vectors for forecast purposes in datatest.txt index.php calls forecast.php which displays input vectors and forecast amount in pounds the food bank will recieve this month of a type of food.


ehc(Inventory management system)

This is an inventory management system which allows a user to add and view transactions for donations for the warehouses. The information system provides quick information like displaying pallets(boxes) which are going to expire in the coming days and also food items which are short in supply so that appropriate action can be taken. To run the code the sql should be imported into the database and index.php should be run on a web server.

dsm(Automated navigation system)

This is an automated inventory navigation system for volunteers & workers of North Texas food Bank.
Typical use case scenario: A volunteer/worker registers with his SIP id using his mobile device running bowser. He selects his location and destination where to loacate the rack. The system records his SIP id and the location information & receives a call specifying the route to the destination.

Webrtc is a javascript based api communication between two browsers. We establish the location , destination and SIP Id into a log file which is read by a PERL daemon. The daemon polls the log file for navigation requests. When it finds a request , it launches an instance of Lief browser on the server side, which calls the database to retrieve the route.After the route is available in a text format, which is converted into an ogg file using text to speech api. The speech files are also cached on the server to avoid overloading the api. Now the javascript on the Lief browser on the server side, initiates automatic registration using the server SIP Id and calls the client. It also detects state changes in conversation and begins the playback of audio once the call is accepted at the client end.

 