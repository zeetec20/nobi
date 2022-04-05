# Question 1

## Technology use on project
- Laravel : 8.83.6
- Composer : 2.1.6
- PHP : 8.0.12
- Operation System : Windows 10

## Build
- Create database mysql with name "nobi_question1"
- Restore mysql dump on databse "nobi_question1" with file nobi_question1.sql
- Run artisan command
```bash
php artisan serve
```

## Documentation API

### Login

* **URL**

  /api/login

* **Method:**

  `POST`
  
*  **URL Params**

   None

* **Data Params**

  **Required:**

   `email=[string]`
   `password=[string, min:8]`

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ success : bool, message : string?, data : array? }`

### Register

* **URL**

  /api/register

* **Method:**

  `POST`
  
*  **URL Params**

   None

* **Data Params**

  **Required:**

   `name=[string]`
   `email=[string]`
   `password=[string, min:8]`

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ success : bool, message : string?, data : array? }`
    
### Profile

* **URL**

  /api/profile

* **Method:**

  `GET`

* **Headers**
  
  `Authorization`
  
*  **URL Params**

   None

* **Data Params**

  **Required:**

   `name=[string]`
   `email=[string]`
   `password=[string, min:8]`

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ id : int, name : string, email : string, created_at : timestampt, updated_at : timestampt }`
