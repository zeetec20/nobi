# Question 2

## Technology use on project
- Laravel : 9.6.0
- Composer : 2.1.6
- PHP : 8.0.12
- Operation System : Windows 10

## Build
- Run artisan command
```bash
php artisan serve
```

## Documentation API

### Random Fact

* **URL**

  /api/random

* **Method:**

  `POST`
  
* **URL Params**
    
  **Not Required:**

  `category=[string]`

* **Data Params**

  None

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ source : string, fact : string, length : int }`

* **Error Response:**

  * **Code:** 200 <br />
    **Content:** `{ error : string}`
    
### Categories

* **URL**

  /api/categories

* **Method:**

  `GET`
  
* **URL Params**
    
  None

* **Data Params**

  None

* **Response:**

  * **Code:** 200 <br />
    **Content:** `{ categories : array }`
