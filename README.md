# Restaurant POS with Inventory System

### Notes given

* **Admin:** Taga gawa ng account ni Cashier, Custodian or Customer/Client. Update product, update stock (mismong may ari)

* **Cashier** – approve ng order ni client, view products (taga check kung may stock)


* **Property Custodian**: Nag a-add ng Products, Add Product – Name – Quantity – Explanation, Need history kung ilan na yung na benta – pero printable.
    * **status** - finished

* Customer: Buyer, pag nag add to cart mawawala siya sa cart after 12mn kapag hindi chineckout. Need history ng binili for this month. 
    * **status** - finished

### Task finished

* **Menu / products** 
    * list all menus
    * searching
    * add
    * view details
    * update
    * delete
    * invoice summary in browser and printable pdf

* **Category** 
    * list all categories
    * list menus in specific category
    * add
    * view details
    * update
    * delete
    
* **Cart** 
    * list products in cart
    * delete unCheckout products everyday on midnight
    * add
    * view details
    * update
    * delete
    
* **list orders** 
    * list orders / can be filtered by day/week/month/year
    * add
    * view details
    * update
    * delete

* **FallBack Routes** 
    * If page doesnt Exist return an error landing page
    * Customized the default route showing error
    * Guide admin if mistype link navigation that the page does not exist

* **Authentication**   
    * Creates account for Admin
    * Uses laravel Bootstrap
    * Register Form
    * Login Form

* **Email Verification** 
    * modified env file to create an account 
      that will act as verifier of sending email of the system
    * the token for email verification expires with in 1 hour

* **Forgot Password** 
    * added feature if user want to change or 
      forgets the password for login credentials

* **Fixed Activity lapses** 
    * If user registered is not verified cannot access the 
      navigations contents

* **Repilcate the Navigation Bar of Proposed Frontend** 
    * Copied the layout of navigation bar regards to 
      the proposed layout.

* **Implemented Auth User Token Authentication** 
    * Added navigation details for a logged in user will be
      shown if only has verified and knows the credentials.
      Therefore no one can access the account with knowing 
      the details.
      