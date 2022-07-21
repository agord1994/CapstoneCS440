

#For the capstone project I plan on creating a website that would be used to assist someone in the construction industry with takeoffs. Before we go any further, we should address what a takeoff is in the first place and its importance. In construction, a takeoff is referred to a document that has all of the quantities of a product needed for a construction project. Think of General Contractors or estimators who have the duty of having to plan out(typically in blueprints and specifications) all the materials that will be needed for a apartment complex. The more you think, the more you realize that there are massive amounts of materials that need to be ordered before a construction project is even started. Takeoffs are not just limited to one manufacturer or supplier in certain industries, takeoffs are typically needed for all materials on a jobsite. For instance, carpet, appliances, flooring, cabinetry, windows,  are examples of materials that would require some form of takeoffs that need to be completed for large multi-family apartment complexes.  

For this project I want to create a web application that will assist in the development of takeoffs for GE Appliances, an appliance manufacturer. Right now, GE Appliances has been developing takeoffs in spreadsheet form. Significant amount of time is wasted in formatting multiple spreadsheets on a daily basis. This program will give the ability to create appliance takeoffs in a more efficient way. Below is a snapshot of a simple example of a takeoff.  
 

This program will export data in a csv file format that will resemble the information above.  A sketch of what the webpage and user interface is below. All the data from the filling out the questions in the program the data for each project will be then saved to a database using php and connecting to MySQL relational database. Then there will be a next button that triggers a python web scraper script that scraps a website of different appliance model numbers,dimensions, and details. A good website for this would be Lowes or Home Depot. Ultimately the user will need to be able to choose different appliance model numbers that have been scraped from these websites. Some appliances that will be scraped are the stacked laundry unit, refrigerator, range, microwave, and  24” dishwasher. After these appliances model numbers are scraped the user will be able to choose what appliance package he or she wants. After the appliance package is picked another button that says “export” will export the takeoff data in a comma separated form. 
 

Technology Required
This project will require HTML, CSS, Javascript, and php knowledge. The data that will be scraped from webpages like lowes or home depot from a python script and will be stored in the database in a table called Product. All of the data that is filled out by the user will be stored in the project table. The ERD for the database is shown below.  
The process flow chart is shown below. Since this is a prototype if “yes” is checked then the application will continue to picking the project model numbers, if the the check is “no” there must be a display to user to tell the user to fill out “yes”. This prototype is just to display the base functionality.
 
Resources that will likely be needed

Python Web Scraping Tutorial - GeeksforGeeks
tutorial on web scraping
How to learn to stop worrying and love the bot (linkedin.com)
Php will likely be needed to store data entered by user on the webpage
PHP Tutorial (w3schools.com)
If basic python syntax is needed
Python Tutorial (w3schools.com)
If a JavaScript refresher is needed
JavaScript Tutorial (w3schools.com)
Exporting to CSV files in javascript
Javascript Export Array To CSV File (Simple Examples) (code-boxx.com)

Project Schedule
7/15-decide on project and Design documents complete and project planning complete
7/22- Initial User interface and HTML/CSS is complete
7/29-Javascript event listener functions completed
8/8-Python web scraper and storing data in MYSQL database
