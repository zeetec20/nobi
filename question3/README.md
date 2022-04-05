# Question 3

## Technology use on project
- Laravel : 8.83.6
- Composer : 2.1.6
- PHP : 8.0.12
- Operation System : Windows 10

## Build
- Create database mysql with name "nobi_question3"
- Restore mysql dump on databse "nobi_question3" with file nobi_question3.sql
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
    
### Get balance

* **URL**

  /api/balance

* **Method:**

  `GET`

* **Headers**
  
  `Authorization`
  
*  **URL Params**

   None

* **Data Params**

  None

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ id : int, user_id : int, email : string, amount_available: int, created_at : timestampt, updated_at : timestampt }`
    
### Top Up balance

* **URL**

  /api/balance

* **Method:**

  `POST`

* **Headers**
  
  `Authorization`
  
*  **URL Params**

   None

* **Data Params**

  **Required:**

   `amount_available=[int]`

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ success : bool }`

### Transaction

* **URL**

  /api/transaction

* **Method:**

  `POST`

* **Headers**
  
  `Authorization`
  
*  **URL Params**

   None

* **Data Params**

  **Required:**

   `trx_id=[int]`
   `amount=[int]`

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ success : bool, message: string?, transaction: array? }`

