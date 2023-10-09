<h1 align="center" id="title">Smart Shop <span>(E-commerce-project)</span></h1>
<p align="center" id="title">https://documenter.getpostman.com/view/27663911/2s9YC4Tsi5</p>

<p align="center"><img src="https://sevenblock.net/assets/images/projects/Smart%20Shop.png" alt="project-image" width="600"></p>


<h2>Introduction:</h2>
<p id="description">The e-commerce API project built with Laravel & Mysql offers a comprehensive set of features that cover user management, product management, cart management, order management, brand management, review management, coupon management, error handling, pagination, and more. These features collectively provide a robust and scalable foundation for building an advanced e-commerce platform.</p>

<h2>Project Screenshots:</h2>

<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/b939e53c-6cfc-43ef-b604-24ec7c5f2fa3" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/55006c8d-347e-48e8-be91-2db7c3858de2" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/9be9fea4-15cb-4ef0-bc9a-665b92f96413" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/977e205b-76ab-4797-8c76-3a07f7d2d2f8" width="200" height="150/">

<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/9d7fe391-4e84-4df8-bdf8-73344cbaac65" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/43680767-9f38-4ebd-a6fe-00fb47c3336e" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/297c5a11-560f-46ac-a7c9-ed2aac07d622" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/95c16ec5-b2a7-4723-97fa-c2f331af352f" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/9c6726ad-2442-4066-9841-9a34fdba0245" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/2eda0f81-b326-4838-8cf6-4aa3bd797a35" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/a5f4a7b8-92d6-4eee-870c-857e86f19807" width="200" height="150/">
<img src="https://github.com/yousifheikal/Smart-Shop-Api/assets/96316936/021eaa04-ef25-4ad0-8642-6a266702a813" width="200" height="150/">


<h2>🧐 Features</h2>

* Authentication: Authentication feature enables users to create an account, login, and manage their credentials securely. It includes functionalities such as user registration, login,logout, password reset,refreshToken,user-profile and authentication token management, all functionalities i used via JWT Auth. Users can access protected resources and perform actions based on their authorization level.

* User Management: The user management feature allows administrators to manage user accounts, roles, and permissions. It includes functionalities such as creating user profiles, updating user information, enabling or disabling user accounts, and assigning appropriate roles and permissions ex:(create category, product, etc....) .

* Categories : Category feature organizes products. It allows creating, retrieving, updating and deleting categories. Products can be associated with one or multiple categories, allowing users to browse and filter products based on their category preferences.

* Products : Product management feature enables administrators to manage the products available in the e-commerce platform. It includes functionalities such as adding new products, updating product details (e.g., name, description, price, images....etc),  associating products with categories ,enabling delete product,retrieve similar products and popular products, and sorting products price for desire user from lowest to highest vice versa.

* Reviews Management: The review management feature allows users to leave reviews and ratings for products they have purchased or used, but you must login in website before rating any product.

* Cart Management: The cart management feature allows users to add products to their shopping cart, update quantities, remove items, and calculate the total price. It provides save data every user when login, allowing users to resume their shopping experience at a later time.

* Wishlist Management: The wishlist management feature allows users to add products to their wishlist, display all product in wishlist, remove products, save this wislist  each user, allowing users to resume their shopping experience at a later time.

* Contact Us: The Contact Us management feature allows you to know any problems you have and let us know about them

* Validation: The validation feature ensures that user input and data received by the API are validated against predefined rules and constraints It includes input validation for various fields, such as checking for required fields, data types, length restrictions, and format validations. the e-commerce API project ensures data integrity, enhances security, and improves the overall reliability of the system by validating user input.

* Error Handling: The error handling feature ensures that the API handles errors gracefully by providing appropriate error messages and responses. It includes handling validation errors, authentication errors, database errors, and other exceptional scenarios. Meaningful error messages are returned to users, facilitating troubleshooting and improving the user experience.

* Pagination: The pagination feature allows users to retrieve a subset of data from large collections. It enables efficient data retrieval by dividing the results into pages and providing mechanisms to navigate through the pages. Pagination enhances performance and user experience, especially when dealing with a large number of products or search results.

* Trait: The trait feature, i created general-trait it allows retrieve response message (success msg, error msg, and return data), Which led to returning an appropriate response for each endpoint.

<h2> Documentation</h2>
[Postman doucments link](https://documenter.getpostman.com/view/27663911/2s9YC4Tsi5)

<h2>💻 Built with</h2>

Technologies and tools used in the project:

*   Laravel 
*   Mysql
*   JWT
*   Design Pattern(Repository Pattern)
*   Faker
*   Validation
*   Hash, bcrypt

<h2>🛠️ Installation Steps:</h2>

<p>1. connection with Database</p>

```
php artisan migrate
```

<p>2. Using fake data for testing</p>

```
php artisan db:seed
```

<p>3. Run Project</p>

```
php artisan ser
```
